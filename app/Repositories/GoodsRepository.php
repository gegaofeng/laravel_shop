<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/29
 * Time: 22:32
 */
namespace App\Repositories;
use App\Model\Goods;


class GoodsRepository extends BaseRepository{
    protected $goods;
    protected $goodsCategoryRepository;
    public function __construct() {
        $this->goods=new Goods();
        $this->goodsCategoryRepository=new GoodsCategoryRepository();
    }
}