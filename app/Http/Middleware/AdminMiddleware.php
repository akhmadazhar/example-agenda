<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->id === 0) {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman lain, misalnya halaman login
        return redirect('/login');
    }
}
