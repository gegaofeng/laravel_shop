<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/11/6
 * Time: 11:09
 */
namespace App\Repositories;

use App\Model\GoodsSpecPrice;
use App\Model\GoodsSpecItem;
use App\Model\GoodsSpec;

class GoodsSpecPriceRepository extends BaseRepository{
    protected $GoodsSpecPrice;
    public function __construct() {
        $this->GoodsSpecPrice=new GoodsSpecPrice();
    }
    public function getGoodsSpec($goods_id){
        $keys=$this->getGoodsSpecPriceByGoodsId($goods_id);
//        $keys=$this->GoodsSpecPrice->where('goods_id',$goods_id)->orderBy('store_count')->get();
        $key_str='';
        if (!$keys->isempty()){
            foreach ($keys as $key){
                $key_str=$key['key'].'_'.$key_str;
            }
            $key_arr=explode('_',$key_str);
            $key_arr=array_unique($key_arr);
            array_pop($key_arr);
            $filters=GoodsSpec::whereHas('goodsSpecItem',function ($q) use($key_arr){
                $q->whereIn('id',$key_arr);
            })->with('goodsSpecItem')->get();
            return $filters;
        }else{
            return json_encode(array());
        }


    }
    public function getGoodsSpecPriceByGoodsId($goods_id,$order='store_count'){
        return $this->GoodsSpecPrice->where('goods_id',$goods_id)->orderBy($order)->get();
    }
    public function getGoodsSpecItemIdByGoodsId($goods_id){
        $spec_price_list= $this -> getGoodsSpecPriceByGoodsId($goods_id);
        $item_id_list=[];
        foreach($spec_price_list as $spec_price){
            $item_id_list= array_merge($item_id_list, explode('_', $spec_price['key']));
        }
        return array_unique($item_id_list);
    }
}