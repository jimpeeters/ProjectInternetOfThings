<?php 


Route::group(['middleware' => ['api']], function() {
	Route::get('/order/open/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@newOrder']);
	Route::get('/order/close/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@closeOrder']);

	Route::get('/dashboard/tableStatus', 'MainController@getTableStatus');

});

Route::group(['middleware' => ['web']], function () {
    // Add your routes here

Route::get('/gebieden', function()
{
	return View::make('areas');
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

/* Order functies (poppetje) */

Route::get('/order/open/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@newOrder']);
Route::get('/order/close/{tableId}', ['as' => 'newOrder', 'uses' => 'OrderController@closeOrder']);

/* Tafel verwijderen */

Route::get('/table/delete/{id}', 'TableController@destroy');

/* Decoratie verwijderen */

Route::get('/decoration/delete/{id}', 'DecorationController@destroy');

/* Decoration */

Route::resource('decoration', 'DecorationController');

/* Klanten aan tafel toevoegen in dashboard */

Route::post('klanten/add',  array('as' => 'addClients','uses' => 'ClientController@addClients'));




Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'MainController@dashboard']);
Route::resource('table', 'TableController');
// Route::post('/ober/{id}', ['as' => 'ober.update', 'uses' => 'WaiterController@update']);
Route::resource('ober', 'WaiterController');
Route::resource('klanten', 'ClientController');
Route::resource('clientstatus', 'ClientStatusController');
Route::resource('area', 'AreaController');

Route::resource('order', 'OrderController');
Route::resource('waiterarea', 'WaiterAreaController');


Route::resource('waiterarea', 'WaiterAreaController');
Route::resource('planning', 'PlanningController');
Route::get('planning/{planning_id}/index/', ['as' => 'planning.waiter.index', 'uses' => 'PlanningWaiterController@index']);
Route::post('planning/add', ['as' => 'planning.add', 'uses' => 'PlanningWaiterController@store']);
Route::get('planning/verwijder/{id}', ['as' => 'planning.delete', 'uses' => 'PlanningWaiterController@destroy']);
Route::post('planning/aanpassen/{id}', ['as' => 'planning.aanpassen', 'uses' => 'PlanningWaiterController@update']);
Route::get('planning/{id}/mail', ['as' => 'planning.mail', 'uses' => 'PlanningController@mailPlanning']);


}); 
