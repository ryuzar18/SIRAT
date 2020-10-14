<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Pegawai
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role == 0) {
            return redirect()->route('users.index')->with('warning', 'Anda tidak diperbolehkan mengakses halaman ini karena anda bukan Pegawai');
        }

        else{
            return $next($request);
        }
    }
}
