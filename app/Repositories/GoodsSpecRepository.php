<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Model\GoodsSpec;
/**
 * Description of GoodsSpecRepository
 *
 * @author 12900058
 */
class GoodsSpecRepository {
    //put your code here
    private $goodsSpec;
    public function __construct() {
        $this ->goodsSpec=new GoodsSpec();
    }
    public function getSpecListByTypeId($type_id,$order_by='order',$order='asc'){
        return $this ->goodsSpec->with('goodsSpecItem')->where('type_id',$type_id)->orderBy($order_by,$order)->get();
    }
}
