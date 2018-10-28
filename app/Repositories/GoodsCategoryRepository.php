<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/28
 * Time: 10:49
 */
namespace App\Repositories;


use App\Model\GoodsCategory;

class GoodsCategoryRepository extends BaseRepository {
    protected $model;
    public function __construct(GoodsCategory $goodsCategory) {
        $this->model=$goodsCategory;
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     */
    public function getAll()
    {
        return $this->model->get();
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     * @return array
     */
    public function getGoodsCategoryTree(){
        $tree = $arr = $result =$category_list= array();
        $category_list=$this->model->orderBy('sort_order')->get();
        if($category_list){
            foreach ($category_list as $val){
                if($val['level'] == 2){
                    $arr[$val['parent_id']][] = $val;
                }
                if($val['level'] == 3){
                    $crr[$val['parent_id']][] = $val;
                }
                if($val['level'] == 1){
                    $tree[] = $val;
                }
            }

            foreach ($arr as $k=>$v){
                foreach ($v as $kk=>$vv){
                    $arr[$k][$kk]['sub_menu'] = empty($crr[$vv['id']]) ? array() : $crr[$vv['id']];
                }
            }

            foreach ($tree as $val){
                $val['tmenu'] = empty($arr[$val['id']]) ? array() : $arr[$val['id']];
                $result[] = $val;
            }
        }
        return $result;
    }
}