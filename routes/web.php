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

Route::get('/', 'VendorsController@index');

Route::get('/vendor/allVendors', 'VendorsController@allVendors');

Route::get('/vendor/view/{id}', ['uses' => 'VendorsController@viewVendor', 'as' => 'viewVendor']);

Route::get('/vendor/addVendor', 'VendorsController@addVendorPage');

Route::post('/vendor/addVendor', array('as' => 'insert', 'uses' => 'VendorsController@insertNewVendor'));

Route::get('/vendor/deleteVendor/{id}', ['uses' => 'VendorsController@deleteVendor', 'as' => 'deleteVendor']);

Route::get('/storeLocations/view/{id}', ['uses' => 'StoresController@viewLocation', 'as' => 'viewLocation']);

Route::get('/storeLocations/allLocations', 'StoresController@allLocations');

Route::get('/storeLocations/addLocation', function(){
    return view('StoreLocation.addLocation');
});

Route::post('/storeLocation/addLocation', array('uses' => 'StoresController@insertNewLocation', 'as' => 'addLocation'));

Route::get('/storeLocations/editLocation', function(){
    return view('StoreLocation.editLocation');
});

Route::post('/storeLocation/updateLocation', array('uses' => 'StoresController@updateLocation', 'as' => 'updateLocation'));

Route::get('/storeLocations/deleteLocation/{id}', ['uses' => 'StoresController@deleteLocation', 'as' => 'deleteLocation']);