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

        if (empty($goods_id)){
            return '';
        }

        //判断缩略图是否存在
        $path = "upload/goods/thumb/$goods_id/";
        $goods_thumb_name = "goods_thumb_{$goods_id}_{$item_id}_{$width}_{$height}";

        // 这个商品 已经生成过这个比例的图片就直接返回了
        if (is_file($path . $goods_thumb_name . '.jpg')){
            return '/' . $path . $goods_thumb_name . '.jpg';
        }

        if (is_file($path . $goods_thumb_name . '.jpeg')){
            return '/' . $path . $goods_thumb_name . '.jpeg';
        }

        if (is_file($path . $goods_thumb_name . '.gif')){
            return '/' . $path . $goods_thumb_name . '.gif';
        }

        if (is_file($path . $goods_thumb_name . '.png')){
            return '/' . $path . $goods_thumb_name . '.png';
        }
        return \App\Tools\Tools::create_goods_thum_images($goods_id,$width,$height,$item_id);
    }
}
if (!function_exists('get_sub_images')) {
    function get_sub_images($sub_img, $goods_id, $width, $height)
    {
        //判断缩略图是否存在
        $path = "upload/goods/thumb/$goods_id/";
        $goods_thumb_name = "goods_sub_thumb_{$sub_img['img_id']}_{$width}_{$height}";

        //这个缩略图 已经生成过这个比例的图片就直接返回了
        if (is_file($path . $goods_thumb_name . '.jpg')){
            return '/' . $path . $goods_thumb_name . '.jpg';
        }

        if (is_file($path . $goods_thumb_name . '.jpeg')){
            return '/' . $path . $goods_thumb_name . '.jpeg';
        }

        if (is_file($path . $goods_thumb_name . '.gif')){
            return '/' . $path . $goods_thumb_name . '.gif';
        }

        if (is_file($path . $goods_thumb_name . '.png')){
            return '/' . $path . $goods_thumb_name . '.png';
        }


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
//php获取中文字符拼音首字母
if(!function_exists('getFirstCharter')){ 

function getFirstCharter($str){
      if(empty($str))
      {
            return '';          
      }
      $fchar=ord($str{0});
      if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
      $s1=iconv('UTF-8','gb2312//TRANSLIT//IGNORE',$str);
      $s2=iconv('gb2312','UTF-8//TRANSLIT//IGNORE',$s1);
      $s=$s2==$str?$s1:$str;
      $asc=ord($s{0})*256+ord($s{1})-65536;
     if($asc>=-20319&&$asc<=-20284) return 'A';
     if($asc>=-20283&&$asc<=-19776) return 'B';
     if($asc>=-19775&&$asc<=-19219) return 'C';
     if($asc>=-19218&&$asc<=-18711) return 'D';
     if($asc>=-18710&&$asc<=-18527) return 'E';
     if($asc>=-18526&&$asc<=-18240) return 'F';
     if($asc>=-18239&&$asc<=-17923) return 'G';
     if($asc>=-17922&&$asc<=-17418) return 'H';
     if($asc>=-17417&&$asc<=-16475) return 'J';
     if($asc>=-16474&&$asc<=-16213) return 'K';
     if($asc>=-16212&&$asc<=-15641) return 'L';
     if($asc>=-15640&&$asc<=-15166) return 'M';
     if($asc>=-15165&&$asc<=-14923) return 'N';
     if($asc>=-14922&&$asc<=-14915) return 'O';
     if($asc>=-14914&&$asc<=-14631) return 'P';
     if($asc>=-14630&&$asc<=-14150) return 'Q';
     if($asc>=-14149&&$asc<=-14091) return 'R';
     if($asc>=-14090&&$asc<=-13319) return 'S';
     if($asc>=-13318&&$asc<=-12839) return 'T';
     if($asc>=-12838&&$asc<=-12557) return 'W';
     if($asc>=-12556&&$asc<=-11848) return 'X';
     if($asc>=-11847&&$asc<=-11056) return 'Y';
     if($asc>=-11055&&$asc<=-10247) return 'Z';
     return null;
}
}