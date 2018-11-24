<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/28
 * Time: 10:49
 */

namespace App\Repositories;


use App\Model\GoodsCategory;

class GoodsCategoryRepository extends BaseRepository
{
    protected $goodsCategory;

    public function __construct()
    {
        $this->goodsCategory = new GoodsCategory();
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     */
    public function getAll()
    {
        return $this->goodsCategory->get();
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     * @return array
     */
    public function getGoodsCategoryTree()
    {
        $tree = $arr = $result = $category_list = array();
        $category_list = $this->goodsCategory->orderBy('sort_order')->get();
        if ($category_list) {
            foreach ($category_list as $val) {
                if ($val['level'] == 2) {
                    $arr[$val['parent_id']][] = $val;
                }
                if ($val['level'] == 3) {
                    $crr[$val['parent_id']][] = $val;
                }
                if ($val['level'] == 1) {
                    $tree[] = $val;
                }
            }

            foreach ($arr as $k => $v) {
                foreach ($v as $kk => $vv) {
                    $arr[$k][$kk]['sub_menu'] = empty($crr[$vv['id']]) ? array() : $crr[$vv['id']];
                }
            }

            foreach ($tree as $val) {
                $val['tmenu'] = empty($arr[$val['id']]) ? array() : $arr[$val['id']];
                $result[] = $val;
            }
        }
        return $result;
    }

    protected $a = array();

    public function getCatSonId($cat_id)
    {
        $cat_son = array();
        $cat_son_id_arr = $this->goodsCategory->where('parent_id', $cat_id)->select('id')->get();
        //var_dump($son_cat_id_arr);
        //        foreach ($cat_son_id_arr as $item => $value) {
        //            $cat_son[] = $value['id'];
        //        }
        $cat_son = get_arr_column($cat_son_id_arr, 'id');
        if (count($cat_son)) {
            return $cat_son;
        } else {
            return [];
        }

    }

    public function getCatSonTree($cat_id)
    {
        $cat_son_tree = $cat_son = $this->getCatSonId($cat_id);
        $cat_son_tree_len = count($cat_son_tree);
        $counter = 0;
        while ($counter < $cat_son_tree_len) {
            $a = $this->getCatSonId($cat_son_tree[$counter]);
            if (count($a)) {
                $cat_son_tree = array_merge($cat_son_tree, $a);
            }

            $counter++;
            $cat_son_tree_len = count($cat_son_tree);
        }
        if (count($cat_son_tree)) {
            return $cat_son_tree;
        } else {
            return [$cat_id];
        }

    }

    public function getParentIdPath($cat_id)
    {
        $parent_id_path = $this->goodsCategory->where('id', $cat_id)->select('id', 'name', 'parent_id', 'parent_id_path')->first();
        return $parent_id_path;
    }

    public function getCatNameById($cat_id)
    {
        $cat_name = $this->goodsCategory->where('id', $cat_id)->select('name')->first();
        return $cat_name['name'];
    }

    public static function getCatNavigationByGoodsId($id, $type = 0)
    {
        $goods_category_rep = new GoodsCategoryRepository();
        $goods_rep = new GoodsRepository();
        if ($type == 1) {
            $parent_id_path = $goods_category_rep->getParentIdPath($id);
            return $parent_id_path;
        } elseif ($type == 0) {
            $goods_category_id = $goods_rep->getGoodsCatById($id);
            if ($goods_category_id) {
                $parent_id_path = $goods_category_rep->getParentIdPath($goods_category_id);
            }
            $cat_arr = explode('_', $parent_id_path['parent_id_path']);
            //        var_dump($cat_arr);
            foreach ($cat_arr as $cat) {
                if ($cat != 0) {
                    $cat_navifation[$cat] = $goods_category_rep->getCatNameById($cat);
                }
            }
            return $cat_navifation;
        }
    }

}