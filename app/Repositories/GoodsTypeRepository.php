<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;
use App\Model\GoodsType;
/**
 * Description of GoodsTypeRepository
 *
 * @author 12900058
 */
class GoodsTypeRepository {
    //put your code here
    private $goodsType;
    public function __construct() {
        $this ->goodsType=new GoodsType();
    }
    public function getGoodsTypeList($order_by='id',$order='asc',$page=10){
        return $this ->goodsType->orderBy($order_by,$order)->paginate($page);
    }
    public function update( array $data){
        $model=$this ->goodsType->whereId($data['id'])->first();
        $model->name=$data['name'];
        return $model->save();
    }
    public function insert(array $data){
        $result=$this ->goodsType->create($data);
        return $result;
    }
}
