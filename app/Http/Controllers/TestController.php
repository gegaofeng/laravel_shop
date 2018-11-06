<?php

namespace App\Http\Controllers;

use App\Model\GoodsSpec;
use App\Model\GoodsSpecItem;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsSpecPriceRepository;
use App\Repositories\NavigationRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    protected $model;
    public function __construct() {
        $this->model=new GoodsRepository();
    }

    public function test(){
//        $a=GoodsSpec::with('goodsSpecItem')->whereIn('id',[1,2])->get();
//        $a=GoodsSpecItem::with('spec')->whereIn('id',[9,11,16,12,13])->get();
//        return $a;
//        $data=array(
//            array('name'=>'namea','b','goods_spec_item'=>array(array('id'=>'aa','bb','cc'),array('id'=>'aa','bb','cc'))),
//          array('name'=>'nameaa','bb','cc','goods_spec_item'=>array(array('id'=>'aa','bb','cc'),array('id'=>'aa','bb','cc'))),
//        );
//        $data=json_encode($data);
////        return $data;
//        return view('test')->with('data',$data);
        return $this->model->getGoodsById(96);
    }
}
