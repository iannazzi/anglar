<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'AngularController@serveApp');


Route::get('/unsupported-browser', 'AngularController@unsupported');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/



Route::group(['middleware' => ['web']], function () {
    //
});

//$api comes from dingo api

$api->group([], function ($api) {

    //$api->get('test', 'Test\TestController@test');
    $api->post('auth/login', 'Auth\LoginController@login');
    //$api->post('users/login', 'Auth\LoginController@login');
    $api->post('register', ['as' => 'register.store', 'uses' => 'Register\RegisterController@postRegister']);


});

//protected routes with JWT (must be logged in to access any of these routes)
$api->group(['middleware' => 'api.auth'], function ($api) {

    $api->get('sample/protected', 'LoginController@protectedData');
    $api->post('todos', 'TodosController@create');



});
