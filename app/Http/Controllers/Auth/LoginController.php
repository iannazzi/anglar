<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Models\Main\System;
use App\Models\Tenant\User;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use JWTAuth;
use Auth;
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
        //return response()->success(['data' => 'hello']);
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
            return response()->error('Invalid Company', Response::HTTP_UNAUTHORIZED);
        }

        $system->createTenantConnection();
        $custom_claims = ['system' => $system->id, 'company' => $credentials['company']];


        try {
            // verify the credentials and create a token for the user
            $auth['username'] = $credentials['username'];
            $auth['password'] = $credentials['password'];
            if (! $token = JWTAuth::attempt($auth, $custom_claims)) {
                return response()->error('Invalid credentials', 401);

            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->error('Could not create token', 500);
        }

        $user = Auth::user();
        $binders = DashboardController::getBinders();
        return response()->success(compact('user', 'token', 'binders'));
        //return response()->success(['token' => $token]);
    }

    public function protectedData()
    {
        return response()->success(['sample', 'of', 'jwt', 'protected', 'data', '[', 'response', 'from', 'API', ']']);
    }
}
