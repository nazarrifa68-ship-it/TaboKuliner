<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsCustomer
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('loginpage')
                ->with('error', 'Silakan login terlebih dahulu');
        }

        // Langsung cek role tanpa method
        if (Auth::user()->role !== 'customer') {
            return redirect()->route('admin.dashboard')
                ->with('error', 'Akses ditolak');
        }

        return $next($request);
    }
}