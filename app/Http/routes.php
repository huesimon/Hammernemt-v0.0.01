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

Route::get('/user', 'UserController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/calendar', ['uses' =>'CalendarController@index', 'as'=>'calendar']);

Route::get('/calendar/mine/{userid}', ['uses' =>'CalendarController@myCalendar', 'as'=>'myCalendar']);

Route::get('/shift', 'ShiftController@index');

Route::get('/shift/all', 'ShiftController@all');

Route::get('/shift/{id}', ['uses' =>'ShiftController@show', 'as'=>'showShift']);

Route::get('/shift/release/{id}', 'ShiftController@releaseInfo');

Route::post('/shift/release/', 'ShiftController@releaseShift');

Route::get('/tradelist', ['uses' =>'ShiftController@tradeList', 'as'=>'tradeList']);

Route::get('/accept/{id}', ['uses' =>'ShiftController@acceptTrade', 'as'=>'acceptTrade']);
