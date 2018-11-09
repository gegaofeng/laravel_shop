<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    //
    public function index(){
        return view('admin.promotion.index');
    }
    public function flashSale(){
        return view('admin.promotion.flashSale');
    }
    public function groupBuyList(){
        return view('admin.promotion.groupBuyList');
    }
    public function promGoodsList(){
        return view('admin.promotion.promGoodsList');
    }
    public function promOrderList(){
        return view('admin.promotion.promOrderList');
    }
    public function preSellList(){
        return view('admin.promotion.preSellList');
    }
}
