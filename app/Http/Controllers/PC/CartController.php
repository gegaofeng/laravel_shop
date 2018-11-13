<?php

namespace App\Http\Controllers\PC;

use App\Http\Requests\CartRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    public function index(){
        return view('pc.cart.index');
    }
    public function ajaxAddCart(CartRequest $request){
        return 1;
        $data=array('status'=>1);
        return json_encode($data);
    }
    public function openAddCart(){
        return view('pc.cart.openAddCart');
    }
    public function ajaxGetCartList(){
        return view('pc.cart.ajaxGetCatList');
    }
}
