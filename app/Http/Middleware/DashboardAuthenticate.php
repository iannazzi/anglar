<?php

namespace App\Http\Middleware;

use App\Classes\Auth\myAuth;


use Closure;
use Illuminate\Contracts\Auth\Guard;

class DashboardAuthenticate
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!(session()->has('system')))
        {
            return \Redirect::to('login');
            //return redirect('/login');
        }

        $myAuth = new myAuth($this->auth);
        $system_id = session('system');
       
        if(!$myAuth->myCheck($system_id))
        {
            return \Redirect::to('login');
        }
        return $next($request);
    }
}
