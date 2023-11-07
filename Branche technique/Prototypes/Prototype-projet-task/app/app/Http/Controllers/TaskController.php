<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TaskRepository;
use App\Repository\ProjetRepository;
use App\Models\Task;
use App\Models\Projet;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TaskExport;
use App\Imports\ImportTask;


use Illuminate\Support\Facades\Gate;


class TaskController extends Controller
{
    protected $TaskRepository;


    public function __construct(TaskRepository $TaskRepository,ProjetRepository $ProjetRepository){
        $this->TaskRepository = $TaskRepository;
        $this->ProjetRepository = $ProjetRepository;

    }
 
    public function create(Request $request, $id)
    {
        $projet = $this->ProjetRepository->find($id);
    
        Gate::authorize('create', $projet);
    
        $request->validate([
            'titre' => 'required',
            'description' => 'nullable|string|max:255',
            'id_projet' => 'required',
        ]);
    
        $data = $request->all();
    
        $createdTask = $this->TaskRepository->create($data);
    
        return back()->with('success', 'Tâche créée avec succès');
    }
    
    

    public function show($id) {
        $tasks = $this->TaskRepository->findTask($id, 5);
        return view('Project.index', ['tasks' => $tasks, 'id' => $id]);
    }
    
    

    public function edit($id) {
    
        $tasks = $this->TaskRepository->find($id);
        
    
        return view('Project.taskEdit', compact('tasks'));
    }
    
    
    
    public function update(Request $request, $id) {

        $task = $this->TaskRepository->find($id);


        Gate::authorize('update',$task);

        $request->validate([
            'titre' => 'required',
            'description' => 'nullable|string|max:255',
            'id_projet' => 'required',
        ]);
    
        $data = $request->all();
    
        $task = $this->TaskRepository->update($data, $id);
    
        if ($task) {
            return redirect()->route('edit.task', ['id' => $id])->with('success', 'La tâche a été mise à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Échec de la mise à jour de la tâche. Veuillez réessayer.');
        }
    }

    public function delete(Request $request ,$id){

        $id_projet = $request->input('id_projet');

        $projetFind = $this->ProjetRepository->find($id_projet);
        Gate::authorize('delete', $projetFind);


        $task = $this->TaskRepository->delete($id);
        if ($task) {
            return redirect()->route('show.task', ['id' => $id_projet])->with('success', 'La tâche a été supprimée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Échec de la suppression de la tâche. Veuillez réessayer.');
        }
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $results = $this->TaskRepository->searchTask($searchTerm);

        return response()->json($results);
    }

    public function export()
    {
        return Excel::download(new TaskExport, 'Task.xlsx');
    }

    public function import(Request $request ,$id)
    {
        $projet = $this->ProjetRepository->find($id);
        Gate::authorize('create', $projet);

        $file = $request->file('file');
        
        if ($file) {
            $path = $file->store('files');
            Excel::import(new ImportTask, $path);
        }
        
        return redirect()->back();
    }
    
}