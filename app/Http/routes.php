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
//	<a href="{{route('routeName')}}"> </a>
//We can use the route name instead of the route path
Route::get('/', 'HomeController@index');


Route::get('/', ['uses' =>'HomeController@index', 'as'=>'home']);

Route::get('/user', 'UserController@index');

Route::get('/admin', 'AdminController@index');
Route::get('/admin/tradelist', ['uses' =>'AdminController@tradeList', 'as'=>'adminTradeList']);
Route::get('/admin/accept/{id}', ['uses' =>'AdminController@acceptTrade', 'as'=>'adminAcceptTrade']);



Route::get('/calendar', ['uses' =>'CalendarController@index', 'as'=>'calendar']);

Route::get('/calendar/mine/{userid}', ['uses' =>'CalendarController@myCalendar', 'as'=>'myCalendar']);

Route::get('/shift', 'ShiftController@index');

Route::get('/shift/all', 'ShiftController@all');

Route::get('/shift/{id}', ['uses' =>'ShiftController@show', 'as'=>'showShift']);


Route::get('/shift/release/{id}', 'ShiftController@releaseInfo');

Route::post('/shift/release/', 'ShiftController@releaseShift');

Route::get('/tradelist', ['uses' =>'ShiftController@tradeList', 'as'=>'tradeList']);

Route::get('/accept/{id}', ['uses' =>'ShiftController@acceptTrade', 'as'=>'acceptTrade']);



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
Route::auth();
Route::get('/home', 'HomeController@index');


Route::get('user/mystamps/{id}', 'UserController@myStamps');

