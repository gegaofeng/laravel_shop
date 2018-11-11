<?php

namespace App\Http\Controllers\PC;

use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsSpecPriceRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    //
    protected $goodsCategoryRepository;
    protected $goodsRepository;
    protected $goodsImagesRepository;
    protected $goodsSpecPriceRepository;

    /**
     * GoodsController constructor.
     */
    public function __construct() {
    $this->goodsCategoryRepository=new GoodsCategoryRepository();
    $this->goodsRepository=new GoodsRepository();
    $this->goodsImagesRepository=new GoodsImagesRepository();
    $this->goodsSpecPriceRepository=new GoodsSpecPriceRepository();
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/31
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function goodsList($id){
        $goods_cat_tree=$this->goodsCategoryRepository->getCatSonTree($id);
        $goods_list=$this->goodsRepository->getGoodsListByCategoryId($goods_cat_tree);
        $goods_id_list=get_arr_column($goods_list,'goods_id');
        $goods_images=$this->goodsImagesRepository->getGoodsImagesByGoodsId($goods_id_list);
        return view('pc.goods.goodsList')->with('goods_list',$goods_list)->with('goods_images',$goods_images);
    }

    /**
     * Notes:
     * User:
     * Date:2018/11/11
     * @param $id
     * @return mixed
     */
    public function goodsInfo($id){
        $goods_info=$this->goodsRepository->getGoodsById($id);
        $goods_spec=$this->goodsSpecPriceRepository->getGoodsSpec($id);
        $cat_navigation=$this->goodsCategoryRepository->getCatNavigationByGoodsId($id);
        $goods_images=$this->goodsImagesRepository->getGoodsImagesByGoodsId($id);
        $spec_goods_price=$this->goodsSpecPriceRepository->getGoodsSpecPriceByGoodsId($id);
//        return $goods_spec;
        return view('pc.goods.goodsInfo')->with('goods',$goods_info)->with('cat_navigation',$cat_navigation)
            ->with('goods_images',$goods_images)->with('goods_spec',$goods_spec)->with('spec_goods_price',$spec_goods_price);
    }

    /**
     * Notes:
     * User:
     * Date:2018/11/11
     * @return string
     */
    public function activity(){
        return json_encode(array('status'=>1));
    }
}
