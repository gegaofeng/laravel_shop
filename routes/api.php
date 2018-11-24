<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['namespace'=>'admin'],function(){

Route::group(['namespace'=>'PC'],function (){
   Route::get('ajaxgetgoodslist','GoodsController@ajaxGetGoodsList');
    //goods
    Route::group(['prefix'=>'admin/goods'],function(){
        Route::any('ajaxgoodslist','GoodsController@ajaxGoodsList');

    });
});
Route::group(['namespace'=>'Common'],function(){
    //goodscat
    Route::get('getsoncategory','GoodsCategoryController@ajaxGetSonCategory');
    Route::get('getcatbrandlist','GoodsBrandController@ajaxGetCatBrandList');
    Route::any('changetableval','CommonController@changeTabVal');
});

