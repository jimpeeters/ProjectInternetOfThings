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
Route::get('/klanten/checkout/{tableId}', array('as' => 'checkoutClient', 'uses' => 'ClientController@checkout'));




Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'MainController@dashboard']);
Route::resource('table', 'TableController');
// Route::post('/ober/{id}', ['as' => 'ober.update', 'uses' => 'WaiterController@update']);
Route::resource('ober', 'WaiterController');
Route::resource('klanten', 'ClientController');
Route::resource('clientstatus', 'ClientStatusController');
Route::resource('area', 'AreaController');

Route::resource('order', 'OrderController');
Route::resource('/ober/toekennen', 'WaiterAreaController',
				['names' => ['show' => 'waiterarea.show', 'create' => 'waiterarea.create', 'store' => 'waiterarea.store', 'update' => 'waiterarea.update']]);


// Route::resource('waiterarea', 'WaiterAreaController');
// Route::resource('ober/planning', 'PlanningController', ['names' =>
// 		['index' => 'planning.index', 'show' => 'planning.show', 'create' => 'planning.create', 'store' => 'planning.store']	]);
Route::get('ober/planning/index', ['as' => 'planning.index', 'uses' => 'PlanningController@index']);
Route::get('ober/planning/show/{id}', ['as' => 'planning.show', 'uses' => 'PlanningController@show']);


Route::get('ober/planning/{planning_id}/index/', ['as' => 'planning.waiter.index', 'uses' => 'PlanningWaiterController@index']);
Route::post('ober/planning/add', ['as' => 'planning.add', 'uses' => 'PlanningWaiterController@store']);
Route::get('ober/planning/verwijder/{id}', ['as' => 'planning.delete', 'uses' => 'PlanningWaiterController@destroy']);
Route::post('ober/planning/aanpassen/{id}', ['as' => 'planning.aanpassen', 'uses' => 'PlanningWaiterController@update']);
Route::get('ober/planning/{id}/mail', ['as' => 'planning.mail', 'uses' => 'PlanningController@mailPlanning']);


}); 
