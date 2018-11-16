<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\BrandRepository;

class GoodsController extends Controller {

    //
    private $goodsRepository;
    private $goodsCategoryRepository;

    public function __construct() {
        $this -> goodsRepository = new GoodsRepository();
        $this -> goodsCategoryRepository = new GoodsCategoryRepository();
        $this -> brandRepository=new BrandRepository();
    }

    public function goodList() {
        $category_list = $this -> goodsCategoryRepository -> getSortGoodsCategory();
                $brand_list= $this -> brandRepository->getSortBrands();
        return view('admin.goods.goodsList') -> with('category_list', $category_list)-> with('brand_list',$brand_list);
    }

    public function categoryList() {
        return view('admin.goods.categoryList');
    }

    public function stockList() {
        return view('admin.goods.stockList');
    }

    public function goodsTypeList() {
        return view('admin.goods.goodsTypeList');
    }

    public function specList() {
        return view('admin.goods.specList');
    }

    public function brandList() {        
        return view('admin.goods.brandList');
    }

    public function goodsAttributeList() {
        return view('admin.goods.goodsAttributeList');
    }

    public function addEditGoods($id=0) {
        
        $cat_list= $this ->goodsCategoryRepository-> getCatListByParentId(0);
        if($id){
            $goods= $this ->goodsRepository-> getGoodsById($id);
            $parent_cat= $this ->goodsCategoryRepository-> getParentCatById($goods['cat_id']);
//            return $parent_cat;
            $level_cat=$parent_cat;
            return view('admin.goods.addEditGoods')->with('goods',$goods)-> with('cat_list',$cat_list)->with('level_cat',$level_cat);
        }       
        return view('admin.goods.addNewGoods');
    }

    public function ajaxGoodsList() {
        $goods_list = $this -> goodsRepository -> getGoodsList();
        return view('admin.goods.ajaxGoodsList') -> with('goods_list', $goods_list);
    }

}
