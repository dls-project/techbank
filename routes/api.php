<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['api']], function(){
    Route::resource('m_employee', 'Api\MEmployeeController', ['except' => ['create', 'edit']]);
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('auth/me', 'Api\AuthController@local');
    Route::get('oauth/me', 'Api\AuthController@oauth');
});