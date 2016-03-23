<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Main\System;
use App\Models\Tenant\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use JWTAuth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginController extends Controller
{
    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    public function login(Request $request)
    {
        $credentials = $this->validate($request, [
            'company' => 'required', 'username' => 'required', 'password' => 'required',
        ]);
        $throttles = $this->isUsingThrottlesLoginsTrait();

        if ($throttles && $this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        $system = System::where('company', '=', $credentials['company'])->first();

        if(!$system)
        {
            if ($throttles) {
                $this->incrementLoginAttempts($request);
            }
            return response()->json(['error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
        }

        $system->createTenantConnection();
        $custom_claims = ['system' => $system->id, 'company' => $credentials['company']];


        try {
            // verify the credentials and create a token for the user
            $auth['username'] = $credentials['username'];
            $auth['password'] = $credentials['password'];
            if (! $token = JWTAuth::attempt($auth, $custom_claims)) {
                return response()->json(['error' => 'Invalid credentials'], Response::HTTP_UNAUTHORIZED);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'Could not create token'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

        return response()->success(['token' => $token]);
    }

    public function protectedData()
    {
        return response()->success(['sample', 'of', 'jwt', 'protected', 'data', '[', 'response', 'from', 'API', ']']);
    }
}
