<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class User
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        // Agar user login hai aur role "user" hai
        if ($user && $user->role === 'user') {
            return $next($request); // ✅ request allow
        }

        // Agar admin hai to admin dashboard par redirect karo
        if ($user && $user->role === 'admin') {
            return redirect()->route('dashboard');
        }

        // Agar receptionist hai to receptionist dashboard par redirect karo
        if ($user && $user->role === 'receptionist') {
            return redirect()->route('receptionist.dashboard');
        }

        // Agar login hi nahi hai
        return redirect()->route('login');
    }
}
