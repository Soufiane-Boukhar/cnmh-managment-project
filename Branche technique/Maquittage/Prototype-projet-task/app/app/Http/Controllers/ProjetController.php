<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProjetRepository;
use Illuminate\Support\Facades\Gate;
use App\Models\Projet;
use App\Exports\ProjetsExport;
use App\Imports\ImportProjet;

use Maatwebsite\Excel\Facades\Excel;



class ProjetController extends Controller
{

    public function __construct(ProjetRepository $ProjetRepository){
       $this->ProjetRepository = $ProjetRepository;
    }

    public function create(Request $request){

        $request->validate([
            'nom' => 'required',
            'description' => 'nullable|string|max:255',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'id_user' => 'required'
        ]);
    
        $data = $request->all();
        $projet = $this->ProjetRepository->create($data);
        return redirect()->route('show.home')->with('success','Le projet a été ajouter avec succès.');
    }

    public function show(Projet $projet){
        Gate::authorize('view', $projet);
        return view('Project.create');
    }

    public function getAll(){
        $projets = $this->ProjetRepository->getAllWithUser(5);
        return view('home',compact('projets'));
    }

    public function update(Request $request, $id) {

        $projet = $this->ProjetRepository->find($id);

        
        Gate::authorize('update',$projet);

        $request->validate([
            'nom' => 'required',
            'description' => 'nullable|string|max:255',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'id_user' => 'required',
        ]);
    
        $data = $request->all();
    
        $projet = $this->ProjetRepository->update($data, $id);
    
        if ($projet) {
            return redirect()->route('edit.projet', ['id' => $id])->with('success', 'Le projet a été mis à jour avec succès.');
        } else {
            return redirect()->back()->with('error', 'Échec de la mise à jour du projet. Veuillez réessayer.');
        }
    }

    public function edit($id){
        $projet = $this->ProjetRepository->find($id);
        Gate::authorize('edit',$projet);
        return view('Project.edit',compact('projet'));
    }


    public function delete($id){
        $projetFind = $this->ProjetRepository->find($id);
        Gate::authorize('delete', $projetFind);
        $projet = $this->ProjetRepository->delete($id);
        if ($projet) {
            return redirect()->route('show.home');
        } else {
            return redirect()->back()->with('error', 'Échec de la suppression du projet. Veuillez réessayer.');
        }
    }


    public function search(Request $request)
    {
        $searchTerm = $request->input('search');
        $results = $this->ProjetRepository->search($searchTerm);

        return response()->json($results);
    }

    


    public function export()
    {
        return Excel::download(new ProjetsExport, 'Projet.xlsx');
    }


    public function import(Request $request)
    {
        $file = $request->file('file');
        
        if ($file) {
            $path = $file->store('files');
            Excel::import(new ImportProjet, $path);
        }
        
        return redirect()->back();
    }
    
    
}
