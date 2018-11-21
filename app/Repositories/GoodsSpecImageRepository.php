<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Model\GoodsSpecImage;
/**
 * Description of GoodsSpecImageRepository
 *
 * @author 12900058
 */
class GoodsSpecImageRepository {
    //put your code here
    private $goodsSpecImage;
    public function __construct() {
        $this ->goodsSpecImage=new GoodsSpecImage();
    }
    public function getSpecImgListByGoodsId($goods_id){
        return $this ->goodsSpecImage->where('goods_id',$goods_id)->get();
    }
}
