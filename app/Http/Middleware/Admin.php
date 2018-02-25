<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class Admin
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
        $userId = \Auth::id();
        $user = User::find($userId);

            if($user->type == 'admin'){
                return $next($request);
                //Echo "Hola $user->name eres Administrador";
            }
            else
            {
                abort(403);
            }
        
        
    }
}
