<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function ajaxAddCart(){
        $data=array('status'=>1);
        return json_encode($data);
    }
    public function openAddCart(){
        return view('pc.goods.openAddCart');
    }
}
