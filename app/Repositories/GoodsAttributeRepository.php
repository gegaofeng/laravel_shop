<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Model\GoodsAttribute;
/**
 * 
 * Description of GoodsAttributeRepository
 *
 * @author 12900058
 */
class GoodsAttributeRepository  extends BaseRepository{
    //put your code here
    private $goodsAttribute;
    public function __construct() {
        $this ->goodsAttribute=new GoodsAttribute();
    }
    public function getGoodsAttributeList(array $where=[], string $order_by='order',string $order='ASC',int $page=1){
        $result= $this ->goodsAttribute->where($where)->orderBy($order_by,$order)->paginate($page);
        return $result;
    }
}
