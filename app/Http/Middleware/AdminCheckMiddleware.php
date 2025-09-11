<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. User -> neko podatak da li je admin ili ne (tabela, polje)
        // 2. User -> da li je korisniku upisano da li je admin ili ne (if)
        $role = Auth::user()->role;
        if ($role != 'admin') { // ako nisi admin
            return redirect('/'); // vrati ga na home page.
        }
        return $next($request); // nastavi dalje do kontrolera
    }
}
