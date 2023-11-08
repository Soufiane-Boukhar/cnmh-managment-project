<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{

    protected $UserRepository;

    public function __construct(UserRepository $UserRepository){
        $this->UserRepository = $UserRepository;
    }

    public function create(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|unique:users', 
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        $user = $this->UserRepository->create($data);
        
        return view('auth.connexion')->with('succes','Votre compte a été créé avec réussir');
    }

    public function show($id){
        $profile = $this->UserRepository->find($id);
        Gate::authorize('view',$profile);
        return view('Project.profile', compact('profile'));
    }

    public function update(Request $request ,$id){
        $profile = $this->UserRepository->find($id);
        Gate::authorize('update',$profile);

        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required'
        ]);

        $data = $request->all();

        $user = $this->UserRepository->update($data,$id);

        if ($user) {
            return redirect()->route('profile', ['id' => $id])->with('success', 'Profile a été modifiée avec succès.');
        } else {
            return redirect()->back()->with('error', 'Échec de la modification de la profile. Veuillez réessayer.');
        }

    }


    
}