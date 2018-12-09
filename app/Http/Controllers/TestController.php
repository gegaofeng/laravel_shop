<?php

namespace App\Http\Controllers;

use App\Model\GoodsSpec;
use App\Model\GoodsSpecItem;
use App\Model\User;
use App\Repositories\CartRepository;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsSpecPriceRepository;
use App\Repositories\NavigationRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    //
    protected $model;
    public function __construct() {
        $this->model=new GoodsRepository();
        $this->goodsSpecPriceRepository=new GoodsSpecPriceRepository();
//        $this->model=new GoodsRepository();
    }

    public function test(Request $request){
        $data=['name'=>'test','email'=>'123@qq.com','password'=>'test'];
        return \App\User::create([
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'password' => Hash::make($data['password']),
                            ]);
        var_dump(Auth::user());
        var_dump(Auth::id());
        $request->session()->put('time',time());
        $request->session()->put('user_id',time());
        var_dump($request->session()->all());
        var_dump($request->session()->get('_token'));
//        $request->session()->regenerate();
        var_dump($request->session()->all());
        var_dump($request->session()->get('_token'));
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
//        return $this->model->getGoodsById(96);
//        $tools=new Tools();
//        return $tools::create_goods_thum_images(202,236,236);
//        $goodsSpecPriceRepository=new GoodsSpecPriceRepository();
//         $spec_goods_price=$goodsSpecPriceRepository->getGoodsSpecPriceByGoodsId(1);
//        return view('test')->with('spec_goods_price',$spec_goods_price);
//        $a=new CartRepository();
//        return $a->setGoodsRepository(1211);
//        return $a->getCartList('0');
//        $tools=new Tools();
//        return $tools::create_goods_thum_images(88,236,236);
//        $goods_cat=new GoodsCategoryRepository();
//        return view('test')->with('test',$goods_cat-> getSortGoodsCategory());
//        return $goods_cat-> getCatSonTree(14);
//        return 1;
//        $brand=new \App\Repositories\BrandRepository();
//        return $brand-> getSortBrands(33);
//        $cat=new GoodsCategoryRepository();
//        return $cat-> getCatSonTree(13);

//        $a=new GoodsRepository();
//        return view('test')->with('a',$a-> getGoodsById(1));
//        var_dump($a-> getGoodsById(1));
//        $a=new \App\Repositories\GoodsSpecRepository();
//        var_dump($a-> getSpecListByTypeId(1));
//         return $a-> getSpecListByTypeId(1);
//        $a=new GoodsSpecPriceRepository();
//        return $a-> getGoodsSpecItemIdByGoodsId(104);
    }
}
