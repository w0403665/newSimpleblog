<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;

class RoleCheck
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
        $roles=$request->user()->roles;

        foreach($roles as $role){
            if($role->id!=1 ||$role->id=null){


                session()->flash('foo', 'bar');

                return redirect::back()->with('message','Denied-You do not have permissions to access User Management');

            }

        }



        return $next($request);
    }
}
