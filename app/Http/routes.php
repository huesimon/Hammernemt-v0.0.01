<?php
use App\Shift;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// Route formatting
//Route::get('/test/{squirrel}', ['uses' =>'SomeController@doSomething', 'as'=>'routeName']);
Route::get('/', 'HomeController@index');

Route::get('/user', 'UserController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/calendar', ['uses' =>'CalendarController@index', 'as'=>'calendar']);

Route::get('/calendar/mine/{userid}', ['uses' =>'CalendarController@myCalendar', 'as'=>'calendar']);

Route::get('/shift', 'ShiftController@index');

Route::get('/shift/all', 'ShiftController@all');

Route::get('/shift/{id}', 'ShiftController@show');

Route::get('/shift/release/{id}', 'ShiftController@release');


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::auth();

Route::get('/home', 'HomeController@index');
