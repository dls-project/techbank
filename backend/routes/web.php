<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('m_employee', 'MEmployeeController');
// Route::resource('m_service', 'MServiceController');
// Route::resource('m_skill', 'MSkillController');
// Route::resource('t_emp_skill', 'TEmpSkillController');