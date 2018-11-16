<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Repositories;

use App\Model\Brand;

class BrandRepository extends BaseRepository {

    private $brand;
    private $goodsCategoryRepository;

    public function __construct() {
        $this -> brand = new Brand();
        $this -> goodsCategoryRepository = new GoodsCategoryRepository();
    }
    //获取分类下的品牌（包括该分类）
    public function getSortBrands($cat_id = 0) {
        $brand_where = array();
        if ($cat_id) {
            $brand_where = $this -> goodsCategoryRepository -> getCatSonTree($cat_id);
            $brand_where[]=$cat_id;
//            var_dump($brand_where);
//            return $brand_where;
            $brand_list = $this -> brand -> wherein('cat_id',$brand_where) -> get()->toArray();
        } else {
            $brand_list = $this -> brand -> get()->toArray();
        }
        $nameList = array();
        foreach ($brand_list as $k => $v) {
            $name = getFirstCharter($v['name']) . '--' . $v['name']; // 前面加上拼音首字母
//            if(array_key_exists($v['id'],$brandIdArr) && $v['cat_id']){// 如果有双重品牌的 则加上分类名称
//                                    $name .= ' ( '. $goodsCategoryArr[$v[cat_id]] . ' ) ';
//            }
            $nameList[] = $v['name'] = $name;
            $brand_list[$k] = $v;
        }
        array_multisort($nameList, SORT_STRING, SORT_ASC, $brand_list);
        return $brand_list;
    }

}
