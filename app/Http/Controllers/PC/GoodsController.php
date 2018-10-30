<?php

namespace App\Http\Controllers\PC;

use App\Model\Goods;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    protected $goodsCategoryRepository;
    protected $goodsRepository;
    protected $goodsImagesRepository;
    public function __construct() {
    $this->goodsCategoryRepository=new GoodsCategoryRepository();
    $this->goodsRepository=new GoodsRepository();
    $this->goodsImagesRepository=new GoodsImagesRepository();
    }
    public function goodsList($id){
        $goods_cat_tree=$this->goodsCategoryRepository->getCatSonTree($id);
//        var_dump($goods_cat_tree);
        $goods_list=$this->goodsRepository->getGoodsListByCategoryId($goods_cat_tree);
//         return $goods_list;
        $goods_id_list=array();
        $goods_images=$this->goodsImagesRepository->getGoodsImagesByGoodsId($goods_id_list);
        return view('pc.goods.goodsList')->with('goods_list',$goods_list);
    }
}
