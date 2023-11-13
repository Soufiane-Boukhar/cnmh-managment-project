<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

class UserPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $user = auth()->user();

        if ($user->isUser()) {
            return $next($request);
        }

        Auth::logout();
        return redirect()->route('login')->with('error', 'Vous n\'etes pas autorisé à accéder à ce tableau de bord.');
    }

    
}
