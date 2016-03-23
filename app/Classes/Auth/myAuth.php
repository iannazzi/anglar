<?php 

namespace App\Classes\Auth;

use App\Classes\Database\TenantDatabaseConnector;
use  App\Models\Main\System;
use Illuminate\Contracts\Auth\Guard;
use Redirect, Session, Log;

class myAuth
{
    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function myCheck($system_id)
    {
        $system = System::find($system_id);
        if ( ! $system)
        {
            Log::error('no system');
            Session::flush();

            return false;
        }
        //here we can go to billing if there is an issue....
        //maybe some other issue with the account
        //upgrade notes?

        if ( !  $system->createTenantConnection())
        {
            //an issue occured conneting....
            Log::error('myAuth.php: failed to connect to system database');
            Session::flush();

            return false;
        }

        return $this->auth->check();
    }
}