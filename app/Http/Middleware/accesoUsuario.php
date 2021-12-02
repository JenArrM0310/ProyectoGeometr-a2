<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class accesoUsuario
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
        if(session()->get('rol') == "administrador"){
            return redirect('vistaUsuario');
        }
        return $next($request);
    }

}
