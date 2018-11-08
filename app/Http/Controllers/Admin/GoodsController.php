<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function goodList(){
        return view('admin.goods.goodsList');
    }
    public function categoryList(){
        return view('admin.goods.categoryList');
    }
    public function stockList(){
        return view('admin.goods.stockList');
    }
    public function goodsTypeList(){
        return view('admin.goods.goodsTypeList');
    }
    public function specList(){
        return view('admin.goods.specList');
    }
    public function brandList(){
        return view('admin.goods.brandList');
    }
    public function goodsAttributeList(){
        return view('admin.goods.goodsAttributeList');
    }
}