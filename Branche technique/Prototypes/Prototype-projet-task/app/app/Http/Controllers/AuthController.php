<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
       if(Auth::check()){
          return redirect('/');
       }
       
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (!Auth::attempt($request->only('email', 'password'))) {
            return redirect('/login')->with('error', 'Le mot de passe ou l\'e-mail est erroné');
        }
    
        return redirect('/');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    
}