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

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');
Route::get('/user', 'AuthController@user');
// Route::post('/logout', 'AuthController@logout');

// Route::middleware('auth:api')->group(function () {
//     Route::get('user', 'AuthController@user');
// });

// Route::middleware('api', 'prefix')->group(function () {
//     // Route::post('login', 'AuthController@login');
//     Route::resource('employees', 'EmployeeController', ['except' => ['create', 'edit']]);
// });

Route::group(['middleware' => 'api'], function () {
    Route::resource('employees', 'EmployeeController', ['except' => ['create', 'edit']]);
});
