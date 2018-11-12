<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/29
 * Time: 22:32
 */
namespace App\Repositories;
use App\Model\Goods;


class GoodsRepository extends BaseRepository{
    protected $goods;
    protected $goodsCategoryRepository;
    public function __construct() {
        $this->goods=new Goods();
        $this->goodsCategoryRepository=new GoodsCategoryRepository();
    }
    public function getGoodsListByCategoryId($category_id){
        $goods_list=$this->goods->whereIn('cat_id',$category_id)->paginate(5);
        return $goods_list;
    }
    public function getGoodsById($goods_id){
        $find=$this->goods->with('brand')->where('goods_id',$goods_id)->first();
        $goods= $this->goods->where('goods_id',$goods_id)->get();
//        var_dump($find);
//        return $im=$goods->goodsImages;
        return $find;
    }
    public function getGoodsCatById($goods_id){
        return $this->goods->where('goods_id',$goods_id)->pluck('cat_id');
    }
}