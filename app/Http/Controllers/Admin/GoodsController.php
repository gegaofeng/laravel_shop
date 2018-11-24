<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\BrandRepository;
use App\Repositories\GoodsTypeRepository;
use App\Repositories\GoodsSpecRepository;
use App\Repositories\GoodsSpecItemRepository;
use App\Repositories\GoodsSpecImageRepository;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller {

    //
    private $goodsRepository;
    private $goodsCategoryRepository;

    public function __construct() {
        $this -> goodsRepository = new GoodsRepository();
        $this -> goodsCategoryRepository = new GoodsCategoryRepository();
        $this -> brandRepository = new BrandRepository();
    }

    public function goodList() {
        $category_list = $this -> goodsCategoryRepository -> getSortGoodsCategory();
        $brand_list = $this -> brandRepository -> getSortBrands();
        return view('admin.goods.goodsList') -> with('category_list', $category_list) -> with('brand_list', $brand_list);
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

    public function addEditGoods($id = 0) {
        $goods_type = new GoodsTypeRepository();
        $cat_list = $this -> goodsCategoryRepository -> getCatListByParentId(0);
        $goods_type_list = $goods_type -> getGoodsTypeList();
        if ($id) {
            $goods = $this -> goodsRepository -> getGoodsById($id);
            $parent_cat = $this -> goodsCategoryRepository -> getParentCatById($goods['cat_id']);
//            return $parent_cat;
            $level_cat = $parent_cat;
            return view('admin.goods.addEditGoods') -> with('goods', $goods) -> with('cat_list', $cat_list) -> with('level_cat', $level_cat) -> with('goods_types', $goods_type_list);
        }
        return view('admin.goods.addNewGoods');
    }

    public function ajaxGoodsList(Request $request) {
        $filter = [];
        if (!is_null($request['brand_id']))
            $filter['brand_id'] = $request['brand_id'];
        if (!is_null($request['cat_id']))
            $filter['cat_id'] = $request['cat_id'];
        if (!is_null($request['is_on_sale']))
            $filter['is_on_sale'] = $request['is_on_sale'];
        if ($request['intro'] != '0')
            $filter[$request['intro']] = '1';
        $orderby = $request['orderby1'];
        $order = $request['orderby2'];
        $key_word = $request['key_word'];
//        return $filter;
        $goods_list = $this -> goodsRepository -> getGoodsList($filter, $orderby, $order, $key_word);
        return view('admin.goods.ajaxGoodsList') -> with('goods_list', $goods_list);
    }

    public function ajaxGetSpecSelect(Request $request) {
        $goods_id = $request['goods_id'] ? $request['goods_id'] : 0;
        $goods_spec_type = $request['spec_type'];
        $goods_spec_repo = new GoodsSpecRepository();
        $goods_spec_image = new GoodsSpecImageRepository();
        $spec_list = $goods_spec_repo -> getSpecListByTypeId($goods_spec_type);
        if ($goods_id) {
            $goods_spec_image_list = $goods_spec_image -> getSpecImgListByGoodsId($goods_id) -> keyBy('spec_image_id');
        }
//        return $goods_spec_image_list;
        $goods_spec_price = new \App\Repositories\GoodsSpecPriceRepository();
        $items_ids = $goods_spec_price -> getGoodsSpecItemIdByGoodsId($goods_id);
        return view('admin.goods.ajaxSpecSelect') -> with('spec_list', $spec_list) -> with('spec_image_list', $goods_spec_image_list) -> with('items_ids', $items_ids);
    }

    public function ajaxGetSpecInput(Request $request) {
        $goods_id = $request['goods_id'];
        $goods_spec_arr = $request['spec_arr'];
        return $this -> getSpecInput($goods_id, $goods_spec_arr);
    }

    public function getSpecInput($goods_id, $spec_arr) {
        // 排序
        foreach ($spec_arr as $k => $v) {
            $spec_arr_sort[$k] = count($v);
        }
        asort($spec_arr_sort);
        foreach ($spec_arr_sort as $key => $val) {
            $spec_arr2[$key] = $spec_arr[$key];
        }
        $clo_name = array_keys($spec_arr2);
        $spec_arr2 = combineDika($spec_arr2); //  获取 规格的 笛卡尔积                 
        $spec = DB::table('goods_specs') -> get() -> keyBy('id'); // 规格表
        foreach ($spec as $k=>$v){
            $spec[$k]=(array)$v;
        }
        $specItem = DB::table('goods_spec_items') -> get()->toArray(); //规格项
        foreach ($specItem as $k =>$v){
            $specItem[$k]=(array)$v;
        }
        $keySpecGoodsPrice = DB::table('goods_spec_prices') -> where('goods_id', $goods_id) -> get()->keyBy('key')->toArray(); //规格项
        foreach($keySpecGoodsPrice as $k=>$v){
            $keySpecGoodsPrice[$k]=(array)$v;
        }
        $str = "<table class='table table-bordered' id='spec_input_tab'>";
        $str .= "<tr>";
        $str_fill = "<tr>";
        // 显示第一行的数据
        foreach ($clo_name as $k => $v) {
//            return  $spec[$v]->name;
//            return ;
//            $str .= "<td><b>".$spec[$v]->name."</b></td>";
            $str .= "<td><b>";
            $str .=$spec[$v]['name'];
            $str .= "</b></td>";
            $str_fill .= " <td><b></b></td>";
        }
//        return $str;
        $str .= "<td><b>购买价</b></td>
               <td><b>市场价</b></td>
               <td><b>成本价</b></td>
               <td><b>佣金</b></td>
               <td><b>库存</b></td>
               <td><b>SKU</b></td>
               <td><b>操作</b></td>
             </tr>";
        if (count($spec_arr2) > 0) {
            $str_fill .= '<td><input id="item_price" value="0" onkeyup="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)" onpaste="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)"></td>
               <td><input id="item_market_price" value="0" onkeyup="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)" onpaste="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)"></td>
               <td><input id="item_cost_price" value="0" onkeyup="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)" onpaste="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)"></td>
               <td><input id="item_commission" value="0" onkeyup="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)" onpaste="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)"></td>
               <td><input id="item_store_count" value="0" onkeyup="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)" onpaste="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)"></td>
               <td><input id="item_sku" value="" onkeyup="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)" onpaste="this.value=this.value.replace(/[^\d.]/g,&quot;&quot;)"></td>
               <td><button id="item_fill" type="button" class="btn btn-success">批量填充</button></td>
             </tr>';
            $str .= $str_fill;
        }
        // 显示第二行开始
        foreach ($spec_arr2 as $k => $v) {
            $str .= "<tr>";
            $item_key_name = array();
            foreach ($v as $k2 => $v2) {
//                var_dump( $specItem[$v2]);
//                $str .= "<td>{$specItem[$v2][item]}</td>";
                $str .= "<td>";
                $str .= $specItem[$v2]['item'];
                $str .= "</td>";
//                var_dump($spec[$specItem[$v2]['spec_id']]);
                $item_key_name[$v2] = $spec[$specItem[$v2]['spec_id']]['name'] . ':' . $specItem[$v2]['item'];
            }
            var_dump($item_key_name);
            ksort($item_key_name);
            $item_key = implode('_', array_keys($item_key_name));
            $item_name = implode(' ', $item_key_name);
//            var_dump($keySpecGoodsPrice);
            var_dump($item_key);
            if(isset($keySpecGoodsPrice[$item_key])){
            $keySpecGoodsPrice[$item_key]['price'] ? false : $keySpecGoodsPrice[$item_key]['price'] = 0; // 价格默认为0
            $keySpecGoodsPrice[$item_key]['store_count'] ? false : $keySpecGoodsPrice[$item_key]['store_count'] = 0; //库存默认为0
            $keySpecGoodsPrice[$item_key]['market_price'] ? false : $keySpecGoodsPrice[$item_key]['market_price'] = 0; //市场价默认为0
            $keySpecGoodsPrice[$item_key]['cost_price'] ? false : $keySpecGoodsPrice[$item_key][cost_price] = 0; //成本价默认为0
            $keySpecGoodsPrice[$item_key]['commission'] ? false : $keySpecGoodsPrice[$item_key]['commission'] = 0; //佣金默认为0
            $str .= "<td><input name='item[$item_key]['price']' value='{$keySpecGoodsPrice[$item_key]['price']}' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
            $str .= "<td><input name='item[$item_key][market_price]' value='{$keySpecGoodsPrice[$item_key]['market_price']}' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
            $str .= "<td><input name='item[$item_key]['cost_price']' value='{$keySpecGoodsPrice[$item_key]['cost_price']}' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
            $str .= "<td><input name='item[$item_key]['commission']' value='{$keySpecGoodsPrice[$item_key]['commission']}' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")' /></td>";
            $str .= "<td><input name='item[$item_key]['store_count']' value='{$keySpecGoodsPrice[$item_key]['store_count']}' onkeyup='this.value=this.value.replace(/[^\d.]/g,\"\")' onpaste='this.value=this.value.replace(/[^\d.]/g,\"\")'/></td>";
            $str .= "<td><input name='item[$item_key]['sku']' value='{$keySpecGoodsPrice[$item_key]['sku']}' /><input type='hidden' name='item[$item_key]['key_name']' value='$item_name' /></td>";
            $str .= "<td><button type='button' class='btn btn-default delete_item'>无效</button></td>";
            $str .= "</tr>";
            }
        }
        $str .= "</table>";
        return $str;
    }

}
