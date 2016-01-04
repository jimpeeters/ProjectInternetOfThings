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
	return View::make('home');
});

Route::get('/gebieden', function()
{
	return View::make('areas');
});

Route::get('/tafels', function()
{
	return View::make('tables');
});

Route::get('/obers', function()
{
	return View::make('waiters');
});

Route::get('/klanten', function()
{
	return View::make('clients');
});

Route::get('/statistieken', function()
{
	return View::make('statistic');
});



Route::get('/order/open/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@newOrder']);
Route::get('/order/close/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@closeOrder']);

Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'MainController@dashboard']);


Route::resource('table', 'TableController');
Route::resource('waiter', 'WaiterController');
Route::resource('client', 'ClientController');
Route::resource('clientstatus', 'ClientStatusController');
Route::resource('area', 'AreaController');

Route::resource('order', 'OrderController');
Route::resource('waiterarea', 'WaiterAreaController');


Route::resource('waiterarea', 'WaiterAreaController');
