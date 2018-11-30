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

Route::get('/', 'HomeController@index');

Route::get('/user', 'UserController@index');

Route::get('/admin', 'AdminController@index');

Route::get('/calendar', 'CalendarController@index');

Route::get('/shift', 'ShiftController@index');

Route::get('/shift/all', 'ShiftController@all');
