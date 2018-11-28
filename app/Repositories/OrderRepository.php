<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Model\Order;
/**
 * Description of OrderRepository
 *
 * @author 12900058
 */
class OrderRepository {
    //put your code here
    private $oreder;
    public function __construct() {
        $this ->oreder=new Order();
    }
    public function getOrderList(array $where=[],$order_by='order_sn',$order='ASC',$page=15){
        $order_list= $this ->oreder->where($where)->orderBy($order_by,$order)->paginate($page);
        return $order_list;
    }
}
