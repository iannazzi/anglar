<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Models\Main\System;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\System\CISystemManager;

class TestController extends Controller
{
    public function test(Request $request) {

        dd('hello again');
        //$session = session()->all();
        //dd($session);  
        session_unset();
        /*
        dd('flush2');

        \Session::flush();
        dd('flushed');
       // \Cookie::queue(\Cookie::forever('company', 'test'));
        $company = $request->cookie('company');
        dd($request);
        if($company)
        {
            //echo 'Company: ' . $company;
        }
        else
        {
            echo 'company not set';
        }
        //dd($_COOKIE);
        //dd(session()->all());
        */
    }
}
