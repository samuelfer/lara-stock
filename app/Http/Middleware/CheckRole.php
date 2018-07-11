<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()){
            return 'Erro';
        }

        $roles = is_array($role) ? $role : explode('|', $role);
dd(Auth::user());
        if (Auth::user()->hasAnyRole($roles)){
            return redirect()->route('error');
        }

        return $next($request);
    }
//        if($request->user() === null){
//            return response("Permissão negada", 401);
//        }
//        //$actions = $request->route()->getAction();
//
//        //dd($actions);
//
//        $roles = isset($actions['roles']) ? $actions['roles'] : null;
//        //dd($roles);
//        if ($request->user()->hasAnyRole($roles) || !$roles) {
//            return $next($request);
//        }
//        return response("Permissão negada", 401);
//    }
}
