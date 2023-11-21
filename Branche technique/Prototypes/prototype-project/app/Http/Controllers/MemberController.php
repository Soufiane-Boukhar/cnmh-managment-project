<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repository\MemberRepository;
use Illuminate\Support\Facades\Hash;


class MemberController extends Controller
{
    protected $MemberRepository;

    public function __construct(MemberRepository $MemberRepository){
        $this->MemberRepository = $MemberRepository;
    }

    public function index(){
        $allMembers  = $this->MemberRepository->getData();
        
        $members = $allMembers->filter(function ($member) {
            return $member->role === 'member';
        });
        return view('member.index', compact('members'));
    }

    public function create(){
        return view('member.create');
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users', 
            'role' => 'required',
            'password' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        $member = $this->MemberRepository->create($data);

        return back()->with('success', "{$data['name']} added successfully.");
        
    }

    public function edit($id){
        $member = $this->MemberRepository->find($id);
        return view('member.edit',compact('member'));
    }

    public function update(Request $request,$id){

        $member = $this->MemberRepository->find($id);

        $data = $request->validate([
            'name'=>'required',
            'email' => 'required|unique:users',
            'role' => 'required'
        ]);

        $this->MemberRepository->update($data,$id);

        return back()->with('success','Member updated successfully.');

    }

    public function destroy($id){
        $result = $this->MemberRepository->destroy($id);
    
        if ($result) {
            return redirect()->route('member.index')->with('success', 'Member has been removed successfully.');
        } else {
            return back()->with('error', 'Failed to remove member. Please try again.');
        }
    }
}
