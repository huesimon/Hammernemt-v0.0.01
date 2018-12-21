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
Route::get('/', ['uses' =>'HomeController@index', 'as'=>'home']);

Auth::routes();

Route::get('/admin', 'AdminController@index');
//Shift trading routes
Route::get('/admin/tradelist', ['uses' =>'AdminController@tradeList', 'as'=>'adminTradeList']);
Route::get('/admin/accept/{id}', ['uses' =>'AdminController@acceptTrade', 'as'=>'adminAcceptTrade']);
Route::get('/admin/decline/{id}', ['uses' =>'AdminController@declineTrade', 'as'=>'adminDeclineTrade']);

//Userstamp approval routes
Route::get('/admin/userstamps', ['uses' =>'AdminController@userStampsList', 'as'=>'adminUserStampsList']);
Route::get('/admin/userstamps/accept/{id}', ['uses' =>'AdminController@approveUserStamps', 'as'=>'adminApproveUserStamp']);
Route::get('/admin/userstamps/decline/{id}', ['uses' =>'AdminController@rejectUserStamp', 'as'=>'adminRejectUserStamp']);

Route::get('/admin/shift/create', ['uses' =>'AdminController@createShiftView', 'as'=>'adminCreateShiftView']);
Route::post('/admin/shift/create', ['uses' =>'AdminController@createShift', 'as'=>'adminCreateShift']);

Route::get('/calendar', ['uses' =>'CalendarController@index', 'as'=>'calendar']);

Route::get('/calendar/mine/{userid}', ['uses' =>'CalendarController@myCalendar', 'as'=>'myCalendar']);

Route::get('/shift', 'ShiftController@index');

Route::get('/shift/all', ['uses' =>'ShiftController@all', 'as'=>'allShifts']);

Route::get('/shift/{id}', ['uses' =>'ShiftController@show', 'as'=>'showShift']);

Route::get('/shift/release/{id}', 'ShiftController@releaseInfo');

Route::post('/shift/release/{id}', 'ShiftController@releaseShift');

Route::get('/tradelist', ['uses' =>'ShiftController@tradeList', 'as'=>'tradeList']);

Route::get('/accept/{id}', ['uses' =>'ShiftController@acceptTrade', 'as'=>'acceptTrade']);

Route::get('user/stamp/{id}', ['uses' =>'UserStampController@index', 'as'=>'stampIndex']);

Route::post('user/stamp/{id}', ['uses' =>'UserStampController@create', 'as'=>'stampCreate']);

Route::get('user/mystamps/{id}/{month}', ['uses' =>'UserController@selectMonth', 'as'=>'myStamps']);