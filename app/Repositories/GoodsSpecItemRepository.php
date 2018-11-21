<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Model\GoodsSpecItem;
/**
 * Description of GoodsSpecItemRepository
 *
 * @author 12900058
 */
class GoodsSpecItemRepository {
    //put your code here
    private $goodsSpecItem;
    public function __construct() {
        $this ->goodsSpecItem=new GoodsSpecItem();
    }
    public function getSpecItemBySpecId($spec_id){
        return $this ->goodsSpecItem->where('spec_id',$spec_id)->get();
    }
}
