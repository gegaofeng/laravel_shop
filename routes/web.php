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


Route::namespace('PC')->group(function (){
    Route::get('/','IndexController@index');
    Route::get('login','Auth\LoginController@index');
    Route::get('register','Auth\RegisterController@index');
    Route::get('goodsList/id/{id}','GoodsController@goodsList');




});
Route::group(array('namespace'=>'Admin','prefix'=>'admin'),function(){
    Route::get('/','AuthController@login');
});
Route::group(array('namespace'=>'Admin','prefix'=>'admin/home',),function(){
    Route::get('/','HomeController@index');
    Route::get('/welcome','HomeController@welcome');
});
Route::group(array('namespace'=>'Admin','prefix'=>'admin/system',),function(){
    Route::get('/','SystemController@index');
    Route::get('index','SystemController@index');
});
Route::group(array('namespace'=>'Admin','prefix'=>'admin/tools',),function(){
    Route::get('/','ToolsController@index');
    Route::get('region','ToolsController@region');
});


Route::get('test','TestController@Test');