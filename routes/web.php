<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {

    Route::any('providers/search', 'ProviderController@search')->name('providers.search');
    Route::resource('providers', 'ProviderController');

    Route::any('ncms/search', 'NcmController@search')->name('ncms.search');
    Route::resource('ncms', 'NcmController');

    Route::any('cfops/search', 'CfopController@search')->name('cfops.search');
    Route::resource('cfops', 'CfopController');

    Route::any('products/search', 'ProductController@search')->name('products.search');
    Route::resource('products', 'ProductController');

    Route::any('clients/search', 'ClientController@search')->name('clients.search');
    Route::resource('clients', 'ClientController');

    Route::any('states/search', 'StateController@search')->name('states.search');
    Route::resource('states', 'StateController');

    Route::any('cities/search', 'CityController@search')->name('cities.search');
    Route::resource('cities', 'CityController');

    Route::any('addresses/search', 'AddressController@search')->name('addresses.search');
    Route::resource('addresses', 'AddressController');

    Route::any('formapgtos/search', 'FormaPgtoController@search')->name('formapgtos.search');
    Route::resource('formapgtos', 'FormaPgtoController');

    Route::any('icmss/search', 'ICMSController@search')->name('icmss.search');
    Route::resource('icmss', 'ICMSController');

    Route::any('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');

    Route::any('brands/search', 'BrandController@search')->name('brands.search');
    Route::resource('brands', 'BrandController');

    Route::any('users/search', 'UserController@search')->name('users.search');
    Route::resource('users', 'UserController');

    Route::get('/', 'DashboardController@index')->name('admin');

});

Auth::routes(['register' => false]);

Route::get('/', function() {
    return view('welcome');
});

