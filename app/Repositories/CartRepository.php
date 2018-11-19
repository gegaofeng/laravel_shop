<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/11/18
 * Time: 23:08
 */

namespace App\Repositories;


use App\Exceptions\CartException;
use App\Model\Cart;

class CartRepository extends BaseRepository
{
    private $cart;
    private $goods;
    private $goods_spec;
    private $user_id;
    private $goods_num;
    public function __construct() {
        $this->cart=new Cart();
    }

    /**
     * Notes:添加购物车
     * User:
     * Date:2018/11/19
     * @param $goods_id
     * @param $item_id
     * @param $goods_num
     * @param $user_id
     * @return array
     */
    public function addGoodsToCart($goods_id,$item_id,$goods_num,$user_id){
        $this->setGoodsRepository($goods_id);
        $this->setGoodsSpecPriceRepository($item_id);
        $this->setGoodsNum($goods_num);
        if (empty($this->goods)){
            throw new CartException('加入购物车',0,['status' => 0, 'msg' => '购买商品不存在']);
        }

        //s商品类型
        if($this->goods_spec){
            $prom_type = $this->goods_spec['prom_type'];
        }else{
            $prom_type = $this->goods['prom_type'];
        }
        switch ($prom_type){
            case 1:
                            case 2:
            case 3:
            default:
                $this->addNormalGoods();
        }
    }

    /**
     * Notes:设置普通商品
     * User:
     * Date:2018/11/19
     * @param $goods_id
     * @return GoodsRepository|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function setGoodsRepository($goods_id){
        $goods=new GoodsRepository();
        $this->goods=$goods->getGoodsById($goods_id);
        return $this->goods;
    }

    /**
     * Notes:设置含规格的商品
     * User:
     * Date:2018/11/19
     * @param $item_id
     */
    public function setGoodsSpecPriceRepository($item_id){
        if ($item_id>0){
            $goods_spec=new GoodsSpecPriceRepository();
            $this->goods_spec=$goods_spec->getGoodsSpecPriceByItemId($item_id);
        }else{
            $this->goods_spec=null;
        }
    }

    /**
     * Notes:设置用户
     * User:
     * Date:2018/11/19
     * @param $user_id
     */
    public function setUserId($user_id){
        $this->user_id=$user_id;
}
    public function addNormalGoods(){
        if (empty($this->goods_spec)){
            $price=$this->goods['shop_price'];
            $store_count=$this->goods['store_count'];
            $is_exist=$this->getGoodsNumInCart($this->goods['goods_id'],0);
            if ($this->goods_num>$store_count){
                throw new CartException("加入购物车", 0, ['status' => 0, 'msg' => '商品库存不足，剩余' . $store_count . ',当前购物车已有' . $is_exist . '件']);
            }
        }else{
            $price=$this->goods_spec['price'];
            $store_count=$this->goods_spec['store_count'];
            $is_exist=$this->getGoodsNumInCart($this->goods_spec['item_id'],1);
            if ($this->getGoodsNum()>$store_count){
                throw new CartException("加入购物车", 0, ['status' => 0, 'msg' => '商品库存不足，剩余' . $store_count . ',当前购物车已有' . $is_exist . '件']);
            }
        }

    }
    public function getGoodsNumInCart($goods_id,$goods_type=0){
        if ($goods_type==0){
            return $this->cart->where('goods_id',$goods_id)->count();
        }elseif ($goods_type==1){
            return $this->cart->where('item_id',$goods_id)->count();
        }
    }
    public function setGoodsNum($goods_num){
        $this->goods_num=$goods_num;
    }
    public function getGoodsNum(){
        return $this->goods_num;
    }
}