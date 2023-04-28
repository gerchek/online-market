<?php

Route::post('fatoni/generate/api', array('as' => 'fatoni.generate.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@generateApi'));
Route::post('fatoni/update/api/{id}', array('as' => 'fatoni.update.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@updateApi'));
Route::get('fatoni/delete/api/{id}', array('as' => 'fatoni.delete.api', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\ApiGeneratorController@deleteApi'));

Route::resource('api/v1/categories', 'AhmadFatoni\ApiGenerator\Controllers\API\CategoriesController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/categories/{id}/delete', ['as' => 'api/v1/categories.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\CategoriesController@destroy']);
Route::resource('api/v1/products', 'AhmadFatoni\ApiGenerator\Controllers\API\ProductsController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/products/{id}/delete', ['as' => 'api/v1/products.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\ProductsController@destroy']);
Route::resource('api/v1/farmers', 'AhmadFatoni\ApiGenerator\Controllers\API\FarmersController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/farmers/{id}/delete', ['as' => 'api/v1/farmers.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\FarmersController@destroy']);
Route::resource('api/v1/addresses', 'AhmadFatoni\ApiGenerator\Controllers\API\AddressesController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/addresses/{id}/delete', ['as' => 'api/v1/addresses.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\AddressesController@destroy']);
Route::resource('api/v1/orders', 'AhmadFatoni\ApiGenerator\Controllers\API\OrdersController', ['except' => ['destroy', 'create', 'edit']]);
Route::get('api/v1/orders/{id}/delete', ['as' => 'api/v1/orders.delete', 'uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\OrdersController@destroy']);

Route::post('api/v1/sms/store', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\SmsServiceController@send']);
Route::post('api/v1/sms/check', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\SmsServiceController@check']);

Route::get('api/v1/orderservice', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\OrderServiceController@getData']);
Route::get('api/v1/orderdetail', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\OrderServiceController@orderDetail']);
Route::post('api/v1/listProducts', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\ProductsHelperController@listProducts']);