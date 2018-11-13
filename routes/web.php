<?php

Route::get('/',function(){
    return view('index');
});

Route::get('/vendor/', 'VendorsController@index');

Route::get('/vendor/index', 'VendorsController@index');

Route::get('/vendor/inactiveIndex', 'VendorsController@inactiveIndex');

Route::get('/vendor/view/{id}', ['uses' => 'VendorsController@viewVendor', 'as' => 'viewVendor']);

Route::get('/vendor/addVendor',function(){
    return view('Vendor.addVendor');
});

Route::get('/vendor/deleteVendor/{id}', ['uses' => 'VendorsController@deleteVendor', 'as' => 'deleteVendor']);

Route::get('/vendor/restoreVendor/{id}', ['uses' => 'VendorsController@restoreVendor', 'as' => 'restoreVendor']);

Route::post('/vendor/addVendor', array('as' => 'insert', 'uses' => 'VendorsController@insertNewVendor'));

Route::get('/vendor/editVendor/{id}', ['uses' => 'VendorsController@editVendor', 'as' => 'editVendor']);

Route::post('/vendor/updateVendor', array('as' => 'update', 'uses' => 'VendorsController@updateVendor'));

Route::get('/vendor/searchActive', 'VendorsController@searchActive');

Route::get('/vendor/searchInactive', 'VendorsController@searchInactive');
Route::post('/vendor/updatePassword', array('as' => 'update', 'uses' => 'VendorsController@changePassword'));

Route::get('/vendor/changePassword/{id}', function($vendorId){
    return view('Vendor.changePassword', compact('vendorId'));
});

Route::get('/item/', 'InventoryItemsController@index');

Route::get('/item/index', 'InventoryItemsController@index');

Route::get('/item/inactiveIndex', 'InventoryItemsController@inactiveIndex');

Route::get('/item/addItem', 'InventoryItemsController@getExtraDetails');

Route::post('/item/addItem', array('as' => 'insert', 'uses' => 'InventoryItemsController@insertNewItem'));

Route::get('/item/editItem/{id}', 'InventoryItemsController@editItem');

Route::post('/item/updateItem', array('as' => 'update', 'uses' => 'InventoryItemsController@updateItem'));

Route::get('/item/deleteItem/{id}', ['uses' => 'InventoryItemsController@deleteItem', 'as' => 'deleteItem']);

Route::get('/item/restoreItem/{id}', ['uses' => 'InventoryItemsController@restoreItem', 'as' => 'restoreItem']);

Route::get('/item/viewItem/{id}', ['uses' => 'InventoryItemsController@viewItem', 'as' => 'viewItem']);

Route::get('/item/searchActive', 'InventoryItemsController@searchActive');

Route::get('/item/searchInactive', 'InventoryItemsController@searchInactive');

Route::get('/storeLocations/view/{id}', ['uses' => 'StoresController@viewLocation', 'as' => 'viewLocation']);
Route::get('/order', 'OrdersController@index');

Route::get('/order/newOrder', 'OrdersController@getVendorsAndStores');

Route::post('/order/newOrder', array('as' => 'insert', 'uses' => 'OrdersController@createNewOrder'));

Route::post('/order/orderDetails/addOrderDetails', array('as' => 'insert', 'uses' => 'OrderDetailsController@insertOrderAndDetails'));

Route::get('/order/addDetailsExistingOrder/{id}', 'OrderDetailsController@addDetailsExistingOrder');

Route::post('/order/updateDetailsExistingOrder', array('as' => 'update', 'uses' => 'OrderDetailsController@updateDetailsExistingOrder'));

Route::get('/storeLocations/', 'StoresController@storeIndex');

Route::get('/storeLocations/addLocation', function(){
    return view('StoreLocation.addLocation');
});

Route::post('/storeLocation/addLocation', array('uses' => 'StoresController@insertNewLocation', 'as' => 'addLocation'));

Route::get('/storeLocations/editLocation/{id}', 'StoresController@editLocation');

Route::post('/storeLocation/updateLocation', array('uses' => 'StoresController@updateLocation', 'as' => 'updateLocation'));

Route::get('/storeLocations/deleteLocation/{id}', ['uses' => 'StoresController@deleteLocation', 'as' => 'deleteLocation']);

Route::get('/storeLocations/search', 'StoresController@search');
Route::get('/login', function(){
    return view('login');
});

Route::post('/login', array('as' => 'login', 'uses' => 'VendorsController@login'));

Route::get('logout', function(){
    session()->flush();
    return redirect("/");
});

Route::get('/order/viewVendorOrders', 'OrdersController@viewVendorOrders');

Route::get('/order/viewOrder/{id}', 'OrdersController@viewOrder');
