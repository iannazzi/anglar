<?php

namespace App\Http\Controllers\Register;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Tenant\User;
use Session, Cookie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Classes\TenantSystem\TenantSystemBuilder;
use App\Models\Main\System;


class RegisterController extends Controller
{
    //https://laracasts.com/series/object-oriented-bootcamp-in-php/episodes/10

    public function getIndex()
    {
        return view('register.register');
    }

    public function getRegister()
    {
        return view('register.register');
    }

    public function getPending()
    {
        return view('register.pending');
    }

    public function getComplete()
    {
        return view('register.complete');
    }

    public function postRegister(Request $request)
    {
        $data =  $this->validate($request, $this->validationRules());
        return $this->response->array($data);

//        $data = $request->only([
//            'name',
//            'company',
//            'phone',
//            'email',
//            'address',
//            'password',
//            'password_confirmation' ]);

        $system = System::create($data);
        $auto_approve = true;
        if ($auto_approve)
        {
            $tenantSystemBuilder = new TenantSystemBuilder($system);
            //$tenantSystemBuilder->deleteSystem();
            $tenantSystemBuilder->setupTenantSystem();
            $system->createTenantConnection();


            //$user = User::where('username', 'admin')->first();
            //$custom_claims = ['system' => $system->id];
            //$token = JWTAuth::fromUser($user, $custom_claims);
           // return response()->json(compact('token'));
            //return response()->success(['token' => $token]);
            return response()->success('registered');

        }
        return response()->success();
        //return response()->json(['error' => 'Pending'], Response::HTTP_UNAUTHORIZED);



    }
    protected function validationRules()
    {
        return [
            'company' => 'required|max:255|unique:main.systems',
            'name' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'max:255',
            'email' => 'required|email|max:255|unique:main.systems',
            'password' => 'required|confirmed|min:8',
        ];
    }
    protected function registrationValidator(array $data)
    {
        return Validator::make($data, $this->validationRules());
    }

    protected function getPostData($data)
    {
        $keys = ['name', 'phone', 'address'];
        foreach ($keys as $key)
        {
            $data[ $key ] = $this->keyCheck($data, $key);
        }
        return $data;

    }

    public function keyCheck($data, $key)
    {
        if (isset($data[ $key ]))
        {
            return $data[ $key ];
        }

        return '';
    }

}
