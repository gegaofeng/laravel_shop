<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/30
 * Time: 23:01
 */

namespace App\Repositories;

use App\Model\GoodsImages;

class GoodsImagesRepository extends BaseRepository
{
    protected $goods_images;

    public function __construct()
    {
        $this->goods_images = new GoodsImages();
    }

    public function getGoodsImagesByGoodsId(array $goods_id)
    {
        $goods_images = $this->goods_images->whereIn('goods_id', $goods_id)->get();
        return $goods_images;
    }
}