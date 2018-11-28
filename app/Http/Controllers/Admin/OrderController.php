<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    //
    private $order_rep;
    public function __construct() {
        $this ->order_rep=new OrderRepository();
    }

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
    public function ajaxIndex(Request $request){
        
        $order_list= $this ->order_rep-> getOrderList();
//        return $order_list;
        return view('admin.order.ajaxIndex')-> with('order_list',$order_list);
//        return view('admin.order.ajaxIndex');
    }
    public function detail(Request $request){
        return view('admin.order.detail');
    }
}
