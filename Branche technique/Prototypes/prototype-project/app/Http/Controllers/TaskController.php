<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\TaskRepository;
use App\Repository\ProjectRepository;



class TaskController extends Controller
{
    protected $TaskRepository;

    public function __construct(TaskRepository $TaskRepository, ProjectRepository $ProjectRepository){
        $this->TaskRepository = $TaskRepository;
        $this->ProjectRepository = $ProjectRepository;

    }

    public function index($id){
        $tasks = $this->TaskRepository->getData();
        $projects = $this->ProjectRepository->getData();
        $project = $this->ProjectRepository->find($id);
        return view('project.task.index', compact('tasks', 'project', 'projects'));
    }
    

    public function create($id){
        $project = $this->ProjectRepository->find($id);
        return view('project.task.create',compact('project'));
    }

    public function store(Request $request){

        $data = $request->all();

        $tasks = $this->TaskRepository->create($data);
    
        return back()->with('success','Task added successfully.');
    }
    

    public function edit($id){
        $task = $this->TaskRepository->find($id);
        $project = $this->ProjectRepository->find($id);


        return view('project.task.edit',compact('task','project'));

    }

    public function update(Request $request,$id){
        $data = $request->all();
        $tasks = $this->TaskRepository->update($data,$id);

        return back()->with('success','Task updated successfully.');

    }

    public function destroy($id){
        $result = $this->TaskRepository->destroy($id);
    
        if ($result) {
            return redirect()->route('project.task.index')->with('success', 'Task has been removed successfully.');
        } else {
            return back()->with('error', 'Failed to remove project. Please try again.');
        }
    }
    
}
