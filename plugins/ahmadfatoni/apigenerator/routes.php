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

Route::post('api/v1/sms/store', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\SmsServiceController@send']);
Route::post('api/v1/sms/check', ['uses' => 'AhmadFatoni\ApiGenerator\Controllers\API\SmsServiceController@check']);
