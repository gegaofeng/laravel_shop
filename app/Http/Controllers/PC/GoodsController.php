<?php

namespace App\Http\Controllers\PC;

use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsSpecPriceRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

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
        return view('pc.goods.goodsList')->with('id',$id);
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
    public function activity(Request $request){
        $goods_id=$request['goods_id'];
        $item_id=$request['item_id'];
        $goods_num=$request['goods_num'];
        $goods=$this->goodsRepository->getGoodsById($goods_id);
        //商品活动逻辑省略待完善
        return json_encode(array('status'=>1,'result'=>['goods'=>$goods]));
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/16
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxGetGoodsList(Request $request){
        $goods_cat_tree=$this->goodsCategoryRepository->getCatSonTree($request['id']);
        $goods_list=$this->goodsRepository->getGoodsListByCategoryId($goods_cat_tree);
        $goods_id_list=get_arr_column($goods_list,'goods_id');
        $goods_images=$this->goodsImagesRepository->getGoodsImagesByGoodsId($goods_id_list);
        return view('pc.goods.ajaxGetGoodsList')->with('goods_list',$goods_list)->with('goods_images',$goods_images);
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/16
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request){
        return url()->full();
        $url=Input::all();
        foreach ($url as $k=>$v){
            echo $k.'为'.$v;
        }
//        var_dump($url);
        return $url;
        $id=$request['id'];
        $brand_id=$request['brand_id'];
        $sort=$request['sort'];
        $sort_asc=$request['sort_asc'];
        $price=$request['price'];
        $start_price=$request['start_price'];
        $end_price=$request['end_price'];
        $q=urldecode(trim($request['q']));
        $key_word='%'.$q."%";
//        return $q;
//        $where['goods_name']=array('like', '%' . $q . '%');
//        $goodsHaveSearchWord = DB::table('goods')->where('goods_name','like','%'.$q.'%')->count();
//        return $goodsHaveSearchWord;
        $goods_list=$this->goodsRepository->search($key_word);
        $goods_id_list=get_arr_column($goods_list,'goods_id');
        $goods_images=$this->goodsImagesRepository->getGoodsImagesByGoodsId($goods_id_list);
//        return $goods_list;
        return view('pc.goods.search')->with('goods_list',$goods_list)->with('goods_images',$goods_images);
    }
}
