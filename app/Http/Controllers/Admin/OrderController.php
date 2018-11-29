<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    //
    private $order_rep;
    private $order_status=[
        0 => '待确认',
        1 => '已确认',
        2 => '已收货',
        3 => '已取消',                
        4 => '已完成',//评价完
        5 => '已作废',
    ];
    private $pay_status=array(
        0 => '未支付',
        1 => '已支付',
        2 => '部分支付',
        3 => '已退款',
        4 => '拒绝退款'
    );
    private $shipping_status=array(
        0 => '未发货',
        1 => '已发货',
        2 => '部分发货'
    );
    private $start_time;
    private $end_time;
    public function __construct() {
        $this ->order_rep=new OrderRepository();
        $this->start_time=date('Y-m-d',strtotime("-3 month"));
        $this->end_time=date('Y-m-d',strtotime('now'));
    }

    public function index(){
        return view('admin.order.index')-> with('start_time',$this->start_time)-> with('end_time',$this->end_time);
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
        return view('admin.order.ajaxIndex')-> with('order_list',$order_list)->with('order_status', $this ->order_status)-> with('pay_status',$this->pay_status)-> with('shipping_status',$this->shipping_status);
//        return view('admin.order.ajaxIndex');
    }
    public function detail(Request $request){
        return view('admin.order.detail');
    }
}
