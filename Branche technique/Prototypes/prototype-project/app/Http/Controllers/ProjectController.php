<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\ProjectRepository;

class ProjectController extends Controller
{
    protected $ProjectRepository;

    public function __construct(ProjectRepository $ProjectRepository){
        $this->ProjectRepository = $ProjectRepository;
    }

    public function index(){
        $projects = $this->ProjectRepository->getData();
        return view('project.index', compact('projects'));
    }
    
    public function create(){
        return view('project.create');
    }

    public function store(Request $request){

        $data = $request->validate([
            'name'=>'required',
            'description' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);

        $projects = $this->ProjectRepository->create($data);

        return redirect()->route('project.index')->with('success','Project added successfully.');

    }

    public function edit($id){
        $project = $this->ProjectRepository->find($id);

        return view('project.edit',compact('project'));

    }

    public function update(Request $request,$id){
        $data = $request->validate([
            'name'=>'required',
            'description' => 'nullable',
            'start_date' => 'nullable',
            'end_date' => 'nullable',
        ]);

        $projects = $this->ProjectRepository->update($data,$id);

        return back()->with('success','Project updated successfully.');

    }

    public function destroy($id){
        $result = $this->ProjectRepository->destroy($id);
    
        if ($result) {
            return redirect()->route('project.index')->with('success', 'Project has been removed successfully.');
        } else {
            return back()->with('error', 'Failed to remove project. Please try again.');
        }
    }
    
}
