<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/11/4
 * Time: 22:06
 */
namespace App\Tools;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsRepository;

class Tools {
public static function getNavigationByGoodsId($id,$type=0){
    $goods_category_rep=new GoodsCategoryRepository();
    $goods_rep=new GoodsRepository();
    if ($type==1){
        $parent_id_path=$goods_category_rep->getParentIdPath($id);
        return $parent_id_path;
    }elseif ($type==0){
        $goods_category_id=$goods_rep->getGoodsCatById($id);
        if ($goods_category_id){
            $parent_id_path=$goods_category_rep->getParentIdPath($goods_category_id) ;
        }

        return $parent_id_path;
    }
}
}