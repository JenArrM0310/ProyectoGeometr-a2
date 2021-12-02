<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class accesoAdministrador
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
        if(session()->get('rol') == "usuario"){
            return redirect('vistaUsuario');
        }
        return $next($request);
    }
}
