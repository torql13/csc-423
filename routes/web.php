<?php

Route::get('/',function(){
    return view('index');
});

Route::get('/vendor/', 'VendorsController@index');

Route::get('/vendor/view/{id}', ['uses' => 'VendorsController@viewVendor', 'as' => 'viewVendor']);

Route::get('/vendor/addVendor',function(){
    return view('Vendor.addVendor');
});

Route::get('/vendor/deleteVendor/{id}', ['uses' => 'VendorsController@deleteVendor', 'as' => 'deleteVendor']);

Route::post('/vendor/addVendor', array('as' => 'insert', 'uses' => 'VendorsController@insertNewVendor'));

Route::get('/vendor/editVendor/{id}', ['uses' => 'VendorsController@editVendor', 'as' => 'editVendor']);

Route::post('/vendor/updateVendor', array('as' => 'update', 'uses' => 'VendorsController@updateVendor'));