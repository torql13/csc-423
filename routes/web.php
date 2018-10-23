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

Route::get('/vendor/addVendor', 'VendorsController@addVendorPage');

Route::post('/vendor/addVendor', array('as' => 'insert', 'uses' => 'VendorsController@insertNewVendor'));