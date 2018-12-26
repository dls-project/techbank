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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// テスト
// Route::post('login', 'AuthController@test');

// Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');
Route::post('logout', 'AuthController@logout');

Route::middleware('auth:api')->group(function () {
    Route::get('user', 'AuthController@details');
    // Route::resource('m_employee', 'api\MEmployeeController', ['except' => ['create', 'edit']]);
});

Route::middleware('api')->group(function () {
    Route::post('login', 'AuthController@login');
    Route::resource('m_employee', 'api\MEmployeeController', ['except' => ['create', 'edit']]);
});



// Route::group(['middleware' => 'auth:api'], function() {
//     Route::get('auth/me', 'Api\AuthController@local');
//     Route::get('oauth/me', 'Api\AuthController@oauth');
// });