<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class sesionUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session()->has('usuario')){
            return redirect('Login');
        }

        return $next($request);
    }
}
