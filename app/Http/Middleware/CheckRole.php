<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $role = auth()->user()->level;
        if (!in_array($role, $roles)) {
            return redirect('/')->with('error_message', 'Anda Tidak Memiliki Akses!');
        }
        return $next($request);
    }
}
