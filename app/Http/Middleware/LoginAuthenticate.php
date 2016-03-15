<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\Classes\Database\MainDatabaseConnector;
use App\Classes\Auth\myAuth;


class LoginAuthenticate
{
    protected $auth;
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        //basically we will go to the dashboard if
        //we are already logged in and hit
        // login
        
        $myAuth = new myAuth($this->auth);
        if(session()->has('system_id') )
        {
            $system_id = session('system_id');
            if($myAuth->myCheck($system_id))
            {
                //looks like the user is already logged in
                //probably mistakingly went here...
                return redirect()->route('dashboard');
            }
        }
        return $next($request);
    }
}
