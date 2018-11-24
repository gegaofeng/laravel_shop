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
use Illuminate\Support\Facades\DB;

class Tools
{
    public static function getNavigationByGoodsId($id, $type = 0)
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
            foreach ($cat_arr as $cat) {
                if ($cat != 0) {
                    $cat_navifation[$cat] = $goods_category_rep->getCatNameById($cat);
                }
            }
            return $cat_navifation;
        }
    }

    public static function create_goods_thum_images($goods_id, $width, $height, $item_id = 0)
    {
        $original_img = '';//先定义空字符变量
        if ($item_id) {
            $original_img = Db::table('spec_goods_price')->where(["goods_id" => $goods_id, 'item_id' => $item_id]
            )->value('spec_img');
        }
        if (empty($original_img)) {
            $original_img = Db::table('goods')->where("goods_id", $goods_id)->value('original_img');
        }
        if (empty($original_img)) {
            return '/images/icon_goods_thumb_empty_300.png';
        }
        $original_img_full_path = base_path() . '/public/' . $original_img;
        // 取出原图，获得图形信息getimagesize参数说明：0(宽),1(高),2(1gif/2jpg/3png),3(width="638" height="340")
        $original_img_info = getimagesize($original_img_full_path);
        if ($original_img_info[2] == 1) {
            $OldImg = @imagecreatefromgif($original_img_full_path);
            $ext = 'gif';
        } elseif ($original_img_info[2] == 2) {
            $OldImg = @imagecreatefromjpeg($original_img_full_path);
            $ext = 'jpg';
        } else {
            $OldImg = @imagecreatefrompng($original_img_full_path);
            $ext = 'png';
        }
        //缩略图路径名称
        $path = base_path() . '/public/' . "upload/goods/thumb/$goods_id/";
        $goods_thumb_name = "goods_thumb_{$goods_id}_{$item_id}_{$width}_{$height}.{$ext}";
        //缩略图保存路径
        if (!is_dir($path)) {
            mkdir($path);
        }
        // 创建图形,imagecreate参数说明：宽,高
        $NewImg = imagecreatetruecolor($width, $height);
        //创建色彩,参数：图形,red(0-255),green(0-255),blue(0-255)
        $black = imagecolorallocate($NewImg, 0, 0, 0); //黑色
        $white = imagecolorallocate($NewImg, 255, 255, 255); //白色
        $red = imagecolorallocate($NewImg, 255, 0, 0); //红色
        $blue = imagecolorallocate($NewImg, 0, 0, 255); //蓝色
        $other = imagecolorallocate($NewImg, 0, 255, 0);
        //新图形高宽处理
        $WriteNewWidth = $height * ($original_img_info[0] / $original_img_info[1]); //要写入的高度
        $WriteNewHeight = $width * ($original_img_info[1] / $original_img_info[0]); //要写入的宽度
        //这样处理图片比例会失调，但可以填满背景
        if ($original_img_info[0] / $width > $original_img_info[1] / $height) {
            $WriteNewWidth = $width;
            $WriteNewHeight = $width / ($original_img_info[0] / $original_img_info[1]);
        } else {
            $WriteNewWidth = $height * ($original_img_info[0] / $original_img_info[1]);
            $WriteNewHeight = $height;
        }
        //以$NewHeight为基础,如果新宽小于或等于$NewWidth,则成立
        if ($WriteNewWidth <= $width) {
            $WriteNewWidth = $WriteNewWidth; //用判断后的大小
            $WriteNewHeight = $height; //用规定的大小
            $WriteX = floor(($width - $WriteNewWidth) / 2); //在新图片上写入的X位置计算
            $WriteY = 0;
        } else {
            $WriteNewWidth = $width; // 用规定的大小
            $WriteNewHeight = $WriteNewHeight; //用判断后的大小
            $WriteX = 0;
            $WriteY = floor(($height - $WriteNewHeight) / 2); //在新图片上写入的X位置计算
        }
        //旧图形缩小后,写入到新图形上(复制),imagecopyresized参数说明：新旧, 新xy旧xy, 新宽高旧宽高
        @imagecopyresampled($NewImg, $OldImg, $WriteX, $WriteY, 0, 0, $WriteNewWidth, $WriteNewHeight, $original_img_info[0], $original_img_info[1]);
        //保存文件
        //  @imagegif( $NewImg, $NewImagePath );
        @imagejpeg($NewImg, $path . $goods_thumb_name, 100);
        //结束图形
        @imagedestroy($NewImg);
        return "upload/goods/thumb/{$goods_id}/" . $goods_thumb_name;
    }
}