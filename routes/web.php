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


Route::group(['namespace'=>'PC'],function ()
{
    Route::get('/', 'IndexController@index');
    Route::get('login', 'Auth\LoginController@index');
    Route::post('login','Auth\LoginController@login');
    Route::get('poplogin','Auth\LoginController@popLogin');
    Route::get('register', 'Auth\RegisterController@index');
    Route::get('goodslist/id/{id}', 'GoodsController@goodsList');
    Route::get('goodsinfo/{id}', 'GoodsController@goodsInfo');
    Route::post('goods/activity', 'GoodsController@activity');


}
);
Route::group(['namespace' => 'PC', 'prefix' => 'cart'], function ()
{
    Route::get('/', 'CartController@index');
    Route::get('index', 'CartController@index');
    Route::any('ajaxaddcart', 'CartController@ajaxAddCart');
    Route::get('openaddcart', 'CartController@openAddCart');
    Route::get('ajaxgetcartlist', 'CartController@ajaxGetCartList');
    Route::post('asyncupdatecart', 'CartController@asyncUpdateCart');
    Route::post('delete','CartController@delete');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function ()
{
    Route::get('/', 'AuthController@login');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/home',), function ()
{
    Route::get('/', 'HomeController@index');
    Route::get('/welcome', 'HomeController@welcome');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/system',), function ()
{
    Route::get('/', 'SystemController@index');
    Route::get('index', 'SystemController@index');
    Route::get('navigationlist', 'SystemController@navigationlist');
    Route::get('cleancache', 'SystemController@cleancache');
    Route::get('rightlist', 'systemController@rightList');
}
);

Route::group(['namespace' => 'PC', 'prefix' => 'cart'], function ()
{
    Route::get('/', 'CartController@index');
    Route::get('index', 'CartController@index');
    Route::post('ajaxaddcart', 'CartController@ajaxAddCart');
    Route::get('openaddcart', 'CartController@openAddCart');
    Route::get('ajaxgetcartlist', 'CartController@ajaxGetCartList');
    Route::post('changenum','CartController@changeNum');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin'), function ()
{
    Route::get('/', 'AuthController@login');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/home',), function ()
{
    Route::get('/', 'HomeController@index');
    Route::get('/welcome', 'HomeController@welcome');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/system',), function ()
{
    Route::get('/', 'SystemController@index');
    Route::get('index', 'SystemController@index');
    Route::get('navigationlist', 'SystemController@navigationlist');
    Route::get('cleancache', 'SystemController@cleancache');
    Route::get('rightlist', 'systemController@rightList');
}
);

Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/smstemplate',), function ()
{
    Route::get('/', 'SmsTemplateController@index');
    Route::get('index', 'SmsTemplateController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/template',), function ()
{
    Route::get('templatelist', 'TemplateController@templateList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/block',), function ()
{
    Route::get('pagelist', 'BlockController@pageList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/article',), function ()
{
    Route::get('/', 'ArticleController@index');
    Route::get('linklist', 'ArticleController@linkList');
    Route::get('articlelist', 'ArticleController@articleList');
    Route::get('categorylist', 'ArticleController@categoryList');
    Route::get('agreement', 'ArticleController@agreement');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/tools',), function ()
{
    Route::get('/', 'ToolsController@index');
    Route::get('index', 'ToolsController@index');
    Route::get('restore', 'ToolsController@restore');
    Route::get('cleardemodata', 'ToolsController@clearDemoData');
    Route::get('region', 'ToolsController@region');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/shop',), function ()
{
    Route::get('/', 'ShopController@index');
    Route::get('index', 'ShopController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/shoporder',), function ()
{
    Route::get('/', 'ShoporderController@index');
    Route::get('index', 'ShoporderController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/freight',), function ()
{
    Route::get('/', 'FreightController@index');
    Route::get('index', 'FreightController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/shipping',), function ()
{
    Route::get('/', 'ShippingController@index');
    Route::get('index', 'ShippingController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/user',), function ()
{
    Route::get('/', 'UserController@index');
    Route::get('index', 'UserController@index');
    Route::get('levellist', 'UserController@levelList');
    Route::get('recharge', 'UserController@recharge');
    Route::get('withdrawals', 'UserController@withdrawals');
    Route::get('remittance', 'UserController@remittance');
    Route::get('signlist', 'UserController@signList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/ad',), function ()
{
    Route::get('adlist', 'AdController@adList');
    Route::get('positionlist', 'AdController@positionList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/comment',), function ()
{
    Route::get('/', 'CommentController@index');
    Route::get('index', 'CommentController@index');
    Route::get('asklist', 'CommentController@askList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/topic',), function ()
{
    Route::get('topiclist', 'TopicController@topicList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/report',), function ()
{
    Route::get('/', 'ReportController@index');
    Route::get('index', 'ReportController@index');
    Route::get('saletop', 'ReportController@saleTop');
    Route::get('usertop', 'ReportController@userTop');
    Route::get('salelist', 'ReportController@saleList');
    Route::get('user', 'ReportController@user');
    Route::get('finance', 'ReportController@finance');
    Route::get('expenselog', 'ReportController@expenseLog');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/combination',), function ()
{
    Route::get('/', 'CombinationController@index');
    Route::get('index', 'CombinationController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/combination',), function ()
{
    Route::get('/', 'CombinationController@index');
    Route::get('index', 'CombinationController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/wechat',), function ()
{
    Route::get('index', 'WechatController@index');
    Route::get('menu', 'WechatController@menu');
    Route::get('autoreply', 'WechatController@autoReply');
    Route::get('fanslist', 'WechatController@fansList');
    Route::get('templatemsg', 'WechatController@templateMsg');
    Route::get('materials', 'WechatController@materials');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/distribute',), function ()
{
    Route::get('goodslist', 'DistributeController@goodsList');
    Route::get('distributor_list', 'DistributeController@distributeList');
    Route::get('tree', 'DistributeController@tree');
    Route::get('gradelist', 'DistributeController@gradeList');
    Route::get('rebatelog', 'DistributeController@rebateLog');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/promotion',), function ()
{
    Route::get('flash_sale', 'PromotionController@flashSale');
    Route::get('group_buy_list', 'PromotionController@groupBuyList');
    Route::get('prom_goods_list', 'PromotionController@promGoodsList');
    Route::get('prom_order_list', 'PromotionController@promOrderList');
    Route::get('pre_sell_list', 'PromotionController@preSellList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/smstemplate',), function ()
{
    Route::get('/', 'SmsTemplateController@index');
    Route::get('index', 'SmsTemplateController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/template',), function ()
{
    Route::get('templatelist', 'TemplateController@templateList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/block',), function ()
{
    Route::get('pagelist', 'BlockController@pageList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/article',), function ()
{
    Route::get('/', 'ArticleController@index');
    Route::get('linklist', 'ArticleController@linkList');
    Route::get('articlelist', 'ArticleController@articleList');
    Route::get('categorylist', 'ArticleController@categoryList');
    Route::get('agreement', 'ArticleController@agreement');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/tools',), function ()
{
    Route::get('/', 'ToolsController@index');
    Route::get('index', 'ToolsController@index');
    Route::get('restore', 'ToolsController@restore');
    Route::get('cleardemodata', 'ToolsController@clearDemoData');
    Route::get('region', 'ToolsController@region');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/shop',), function ()
{
    Route::get('/', 'ShopController@index');
    Route::get('index', 'ShopController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/shoporder',), function ()
{
    Route::get('/', 'ShoporderController@index');
    Route::get('index', 'ShoporderController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/freight',), function ()
{
    Route::get('/', 'FreightController@index');
    Route::get('index', 'FreightController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/shipping',), function ()
{
    Route::get('/', 'ShippingController@index');
    Route::get('index', 'ShippingController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/user',), function ()
{
    Route::get('/', 'UserController@index');
    Route::get('index', 'UserController@index');
    Route::get('levellist', 'UserController@levelList');
    Route::get('recharge', 'UserController@recharge');
    Route::get('withdrawals', 'UserController@withdrawals');
    Route::get('remittance', 'UserController@remittance');
    Route::get('signlist', 'UserController@signList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/ad',), function ()
{
    Route::get('adlist', 'AdController@adList');
    Route::get('positionlist', 'AdController@positionList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/comment',), function ()
{
    Route::get('/', 'CommentController@index');
    Route::get('index', 'CommentController@index');
    Route::get('asklist', 'CommentController@askList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/topic',), function ()
{
    Route::get('topiclist', 'TopicController@topicList');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/report',), function ()
{
    Route::get('/', 'ReportController@index');
    Route::get('index', 'ReportController@index');
    Route::get('saletop', 'ReportController@saleTop');
    Route::get('usertop', 'ReportController@userTop');
    Route::get('salelist', 'ReportController@saleList');
    Route::get('user', 'ReportController@user');
    Route::get('finance', 'ReportController@finance');
    Route::get('expenselog', 'ReportController@expenseLog');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/combination',), function ()
{
    Route::get('/', 'CombinationController@index');
    Route::get('index', 'CombinationController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/Combination',), function ()
{
    Route::get('/', 'CombinationController@index');
    Route::get('index', 'CombinationController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/wechat',), function ()
{
    Route::get('index', 'WechatController@index');
    Route::get('menu', 'WechatController@menu');
    Route::get('autoreply', 'WechatController@autoReply');
    Route::get('fanslist', 'WechatController@fansList');
    Route::get('templatemsg', 'WechatController@templateMsg');
    Route::get('materials', 'WechatController@materials');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/distribute',), function ()
{
    Route::get('goodslist', 'DistributeController@goodsList');
    Route::get('distributor_list', 'DistributeController@distributeList');
    Route::get('tree', 'DistributeController@tree');
    Route::get('gradelist', 'DistributeController@gradeList');
    Route::get('rebatelog', 'DistributeController@rebateLog');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/promotion',), function ()
{
    Route::get('flash_sale', 'PromotionController@flashSale');
    Route::get('group_buy_list', 'PromotionController@groupBuyList');
    Route::get('prom_goods_list', 'PromotionController@promGoodsList');
    Route::get('prom_order_list', 'PromotionController@promOrderList');
    Route::get('pre_sell_list', 'PromotionController@preSellList');

}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/order',), function ()
{
    Route::get('/', 'OrderController@index');
    Route::get('index', 'OrderController@index');
    Route::get('deliverylist', 'OrderController@deliveryList');
    Route::get('virtuallist', 'OrderController@virtualList');
    Route::get('refundorderlist', 'OrderController@refundOrderList');
    Route::get('returnlist', 'OrderController@returnList');
    Route::get('addorder', 'OrderController@addOrder');
    Route::get('orderlog', 'OrderController@orderLog');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/import',), function ()
{
    Route::get('index', 'ImportController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/coupon',), function ()
{
    Route::get('index', 'CouponController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/invoice',), function ()
{
    Route::get('index', 'InvoiceController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/team',), function ()
{
    Route::get('teamlist', 'TeamController@teamList');
    Route::get('orderlist', 'TeamController@orderList');
    Route::get('index', 'TeamController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/admin',), function ()
{
    Route::get('/', 'AdminController@index');
    Route::get('index', 'AdminController@index');
    Route::get('role', 'AdminController@role');

    Route::get('supplier', 'AdminController@supplier');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/goods',), function ()
{
    Route::get('goodslist', 'GoodsController@goodList');
    Route::get('categorylist', 'GoodsController@categoryList');
    Route::get('stocklist', 'GoodsController@stockList');
    Route::get('goodstypelist', 'GoodsController@goodsTypeList');
    Route::get('speclist', 'GoodsController@specList');
    Route::get('goodsattributelist', 'GoodsController@goodsAttributeList');
    Route::get('brandlist', 'GoodsController@brandList');
    Route::get('addeditgoods/{id?}', 'GoodsController@addEditGoods');
    Route::get('ajaxgetspecselect', 'GoodsController@ajaxgetspecselect');
    Route::any('ajaxgetspecinput', 'GoodsController@ajaxGetSpecInput');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/plugin',), function ()
{
    Route::get('index', 'PluginController@index');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/mobileapp',), function ()
{
    Route::get('index', 'MobileAppController@index');
    Route::get('iosaudit', 'MobileAppController@iosAudit');
}
);
Route::group(array('namespace' => 'Admin', 'prefix' => 'admin/uploadify'), function ()
{
    Route::get('upload', 'UploadifyController@upload');
}
);
Route::get('supplier', 'AdminController@supplier');



Route::get('test', 'TestController@Test');
Route::get('tt', function ()
{
    return view('pc.particals.head');
}
);

