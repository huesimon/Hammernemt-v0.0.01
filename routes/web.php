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

Route::get('/admin', 'AdminController@index');
Route::get('/admin/tradelist', ['uses' =>'AdminController@tradeList', 'as'=>'adminTradeList']);
Route::get('/admin/accept/{id}', ['uses' =>'AdminController@acceptTrade', 'as'=>'adminAcceptTrade']);

Route::get('/calendar', ['uses' =>'CalendarController@index', 'as'=>'calendar']);

Route::get('/calendar/mine/{userid}', ['uses' =>'CalendarController@myCalendar', 'as'=>'myCalendar']);

Route::get('/shift', 'ShiftController@index');

Route::get('/shift/all', ['uses' =>'ShiftController@all', 'as'=>'allShifts']);


Route::get('/shift/{id}', ['uses' =>'ShiftController@show', 'as'=>'showShift']);


Route::get('/shift/release/{id}', 'ShiftController@releaseInfo');

Route::post('/shift/release/', 'ShiftController@releaseShift');

Route::get('/tradelist', ['uses' =>'ShiftController@tradeList', 'as'=>'tradeList']);

Route::get('/accept/{id}', ['uses' =>'ShiftController@acceptTrade', 'as'=>'acceptTrade']);

Route::get('user/mystamps/{id}', 'UserController@myStamps');


