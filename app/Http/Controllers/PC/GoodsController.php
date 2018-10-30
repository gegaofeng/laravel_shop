<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    public function __construct() {

    }
    public function goodsList(){

        return view('pc.goods.list');
    }
}
