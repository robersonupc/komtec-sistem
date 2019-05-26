<?php

Route::any('admin/ncms/search', 'Admin\NcmController@search')->name('ncms.search');
Route::resource('admin/ncms', 'Admin\NcmController');

Route::any('admin/cfops/search', 'Admin\CfopController@search')->name('cfops.search');
Route::resource('admin/cfops', 'Admin\CfopController');

//$this->any('admin/products/search', 'Admin\ProductController@search')->name('products.search');
//$this->resource('admin/products', 'Admin\ProductController');
Route::any('admin/products/search', 'Admin\ProductController@search')->name('products.search');
Route::resource('admin/products', 'Admin\ProductController');

Route::any('admin/clients/search', 'Admin\ClientController@search')->name('clients.search');
Route::resource('admin/clients', 'Admin\ClientController');

Route::any('admin/states/search', 'Admin\StateController@search')->name('states.search');
Route::resource('admin/states', 'Admin\StateController');

Route::any('admin/cities/search', 'Admin\CityController@search')->name('cities.search');
Route::resource('admin/cities', 'Admin\CityController');

Route::any('admin/addresses/search', 'Admin\AddressController@search')->name('addresses.search');
Route::resource('admin/addresses', 'Admin\AddressController');

Route::get('admin', function() {

})->name('admin');

Route::any('admin/formapgtos/search', 'Admin\FomaPgtoController@search')->name('formapgtos.search');
Route::resource('admin/formapgtos', 'Admin\FomaPgtoController');

Route::any('admin/icmss/search', 'Admin\ICMSController@search')->name('icmss.search');
Route::resource('admin/icmss', 'Admin\ICMSController');

Route::any('admin/categories/search', 'Admin\CategoryController@search')->name('categories.search');
Route::resource('admin/categories', 'Admin\CategoryController');

Route::any('admin/brands/search', 'Admin\BrandController@search')->name('brands.search');
Route::resource('admin/brands', 'Admin\BrandController');

Route::any('admin/users/search', 'Admin\UserController@search')->name('users.search');
Route::resource('admin/users', 'Admin\UserController');

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
