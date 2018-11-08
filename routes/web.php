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
    Route::get('goodsinfo/{id}','GoodsController@goodsInfo');
    Route::post('goods/activity','GoodsController@activity');




});
Route::group(['namespace'=>'PC','prefix'=>'cart'],function (){
    Route::get('/','CartController@index');
    Route::get('index','CartController@index');
    Route::post('ajaxaddcart','CartController@ajaxAddCart');
    Route::get('openaddcart','CartController@openAddCart');
    Route::get('ajaxgetcartlist','CartController@ajaxGetCartList');

});


Route::get('test','TestController@Test');
Route::get('tt',function (){
    return view('pc.particals.head');
});