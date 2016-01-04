<?php 

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('dashboard');
});


Route::resource('table', 'TableController');
Route::resource('waiter', 'WaiterController');
Route::resource('client', 'ClientController');
Route::resource('clientstatus', 'ClientStatusController');
Route::resource('area', 'AreaController');
Route::resource('order', 'OrderController');
Route::resource('waiterarea', 'WaiterAreaController');
