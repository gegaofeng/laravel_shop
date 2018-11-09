<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index(){
        return view('admin.order.index');
    }
    public function virtualList(){
        return view('admin.order.virtualList');
    }
    public function deliveryList(){
        return view('admin.order.deliveryList');
    }
    public function refundOrderList(){
        return view('admin.order.refundOrderList');
    }
    public function returnList(){
        return view('admin.order.returnList');
    }
    public function addOrder(){
        return view('admin.order.addOrder');
    }
    public function orderLog(){
        return view('admin.order.orderLog');
    }
}
