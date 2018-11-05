<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/30
 * Time: 22:46
 */

if (!function_exists('goods_thum_images')) {
    function goods_thum_images($goods_id, $width, $height, $item_id = 0)
    {

        if (empty($goods_id))
            return '';
        //判断缩略图是否存在
        $path = "upload/goods/thumb/$goods_id/";
        $goods_thumb_name = "goods_thumb_{$goods_id}_{$item_id}_{$width}_{$height}";

        // 这个商品 已经生成过这个比例的图片就直接返回了
        if (is_file($path . $goods_thumb_name . '.jpg'))
            return '/' . $path . $goods_thumb_name . '.jpg';
        if (is_file($path . $goods_thumb_name . '.jpeg'))
            return '/' . $path . $goods_thumb_name . '.jpeg';
        if (is_file($path . $goods_thumb_name . '.gif'))
            return '/' . $path . $goods_thumb_name . '.gif';
        if (is_file($path . $goods_thumb_name . '.png'))
            return '/' . $path . $goods_thumb_name . '.png';
        //        $original_img = '';//先定义空字符变量
        //        if($item_id){
        //            $original_img = Db::name('spec_goods_price')->where(["goods_id"=>$goods_id,'item_id'=>$item_id])->cache(true, 30, 'original_img_cache')->value('spec_img');
        //
        //        }
        //        if(empty($original_img)){
        //            $original_img = Db::name('goods')->where("goods_id", $goods_id)->cache(true, 30, 'original_img_cache')->value('original_img');
        //        }
        //
        //
        //        if (empty($original_img)) {
        //            return '/public/images/icon_goods_thumb_empty_300.png';
        //        }
        //
        //        $ossClient = new \app\common\logic\OssLogic;
        //        if (($ossUrl = $ossClient->getGoodsThumbImageUrl($original_img, $width, $height))) {
        //            return $ossUrl;
        //        }
        //
        //        $original_img = '.' . $original_img; // 相对路径
        //        if (!is_file($original_img)) {
        //            return '/public/images/icon_goods_thumb_empty_300.png';
        //        }
        //
        //        try {
        //            require_once 'vendor/topthink/think-image/src/Image.php';
        //            require_once 'vendor/topthink/think-image/src/image/Exception.php';
        //            if(strstr(strtolower($original_img),'.gif'))
        //            {
        //                require_once 'vendor/topthink/think-image/src/image/gif/Encoder.php';
        //                require_once 'vendor/topthink/think-image/src/image/gif/Decoder.php';
        //                require_once 'vendor/topthink/think-image/src/image/gif/Gif.php';
        //            }
        //            $image = \think\Image::open($original_img);
        //
        //            $goods_thumb_name = $goods_thumb_name . '.' . $image->type();
        //            // 生成缩略图
        //            !is_dir($path) && mkdir($path, 0777, true);
        //            // 参考文章 http://www.mb5u.com/biancheng/php/php_84533.html  改动参考 http://www.thinkphp.cn/topic/13542.html
        //            $image->thumb($width, $height, 2)->save($path . $goods_thumb_name, NULL, 100); //按照原图的比例生成一个最大为$width*$height的缩略图并保存
        //            $img_url = '/' . $path . $goods_thumb_name;
        //
        //            return $img_url;
        //        } catch (think\Exception $e) {
        //
        //            return $original_img;
        //        }
    }
}
if (!function_exists('get_sub_images')) {
    function get_sub_images($sub_img, $goods_id, $width, $height)
    {
        //判断缩略图是否存在
        $path = "upload/goods/thumb/$goods_id/";
        $goods_thumb_name = "goods_sub_thumb_{$sub_img['img_id']}_{$width}_{$height}";

        //这个缩略图 已经生成过这个比例的图片就直接返回了
        if (is_file($path . $goods_thumb_name . '.jpg'))
            return '/' . $path . $goods_thumb_name . '.jpg';
        if (is_file($path . $goods_thumb_name . '.jpeg'))
            return '/' . $path . $goods_thumb_name . '.jpeg';
        if (is_file($path . $goods_thumb_name . '.gif'))
            return '/' . $path . $goods_thumb_name . '.gif';
        if (is_file($path . $goods_thumb_name . '.png'))
            return '/' . $path . $goods_thumb_name . '.png';

//            $ossClient = new \app\common\logic\OssLogic;
//            if (($ossUrl = $ossClient->getGoodsAlbumThumbUrl($sub_img['image_url'], $width, $height))) {
//                return $ossUrl;
//            }
//
//            $original_img = '.' . $sub_img['image_url']; //相对路径
//            if (!is_file($original_img)) {
//                return '/public/images/icon_goods_thumb_empty_300.png';
//            }
//
//            try {
//                require_once 'vendor/topthink/think-image/src/Image.php';
//                require_once 'vendor/topthink/think-image/src/image/Exception.php';
//                if(strstr(strtolower($original_img),'.gif'))
//                {
//                    require_once 'vendor/topthink/think-image/src/image/gif/Encoder.php';
//                    require_once 'vendor/topthink/think-image/src/image/gif/Decoder.php';
//                    require_once 'vendor/topthink/think-image/src/image/gif/Gif.php';
//                }
//                $image = \think\Image::open($original_img);
//
//                $goods_thumb_name = $goods_thumb_name . '.' . $image->type();
//                // 生成缩略图
//                !is_dir($path) && mkdir($path, 0777, true);
//                // 参考文章 http://www.mb5u.com/biancheng/php/php_84533.html  改动参考 http://www.thinkphp.cn/topic/13542.html
//                $image->thumb($width, $height, 2)->save($path . $goods_thumb_name, NULL, 100); //按照原图的比例生成一个最大为$width*$height的缩略图并保存
//                $img_url = '/' . $path . $goods_thumb_name;
//
//                return $img_url;
//            } catch (think\Exception $e) {
//
//                return $original_img;
//            }
    }
}
if (!function_exists('get_arr_column')) {
    function get_arr_column($arr, $key_name)
    {
        $target = array();
        foreach ($arr as $item => $value) {
            $target[] = $value[$key_name];
        }
        return $target;
    }
}
