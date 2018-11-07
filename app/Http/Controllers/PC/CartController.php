<?php

namespace App\Http\Controllers\PC;

use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function ajaxAddCart(CartRequest $request){
        $data=array('status'=>1);
        return json_encode($data);
    }
    public function openAddCart(){
        return view('pc.goods.openAddCart');
    }
}
