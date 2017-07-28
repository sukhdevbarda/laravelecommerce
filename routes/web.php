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

Route::get('/', "HomeController@index");
Route::get('admin/register', "Admin\Auth\RegisterController@index");
Route::post('admin/register', "Admin\Auth\RegisterController@postRegister");
Route::get('admin/login', "Admin\Auth\LoginController@index");
Route::post('admin/login', "Admin\Auth\LoginController@postLogin");
Route::get('admin/logout', "Admin\Auth\LoginController@logOut");

Route::group(["prefix"=>"admin","middleware"=>'role'],function(){
Route::get('dashboard', "Admin\IndexController@index");
Route::get('products/create', "Admin\ProductsController@index");
Route::post('products/create', "Admin\ProductsController@create");
Route::post('products/subcategories', "Admin\ProductsController@subcategories");
Route::get('products/list', "Admin\ProductsController@allProducts");
Route::get('products/edit/{id}', "Admin\ProductsController@edit");
});