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
Route::group(['middleware' => ['api']], function() {
	Route::get('/order/open/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@newOrder']);
	Route::get('/order/close/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@closeOrder']);

});

Route::group(['middleware' => ['web']], function () {
    // Add your routes here


Route::get('/gebieden', function()
{
	return View::make('areas');
});

Route::get('/tafels', function()
{
	return View::make('tables');
});

Route::get('/obers/create', function()
{
	return View::make('waiters');
});

Route::get('/klanten', function()
{
	return View::make('clients');
});

Route::get('/statistieken/{date?}', ['as' => 'statistics', 'uses' => 'MainController@statistics']);


/* Overview */ 

Route::get('/overzicht', array('as' => 'overview','uses' => 'OverviewController@index'));

/* Home */ 
Route::get('/', array('as' => 'dashboard','uses' => 'MainController@dashboard'));



Route::get('/order/open/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@newOrder']);
Route::get('/order/close/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@closeOrder']);

Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'MainController@dashboard']);


Route::resource('table', 'TableController');
// Route::post('/ober/{id}', ['as' => 'ober.update', 'uses' => 'WaiterController@update']);
Route::resource('ober', 'WaiterController');
Route::resource('client', 'ClientController');
Route::resource('clientstatus', 'ClientStatusController');
Route::resource('area', 'AreaController');

Route::resource('order', 'OrderController');
Route::resource('waiterarea', 'WaiterAreaController');


Route::resource('waiterarea', 'WaiterAreaController');

}); 
