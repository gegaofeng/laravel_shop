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
use http\Env\Request;
use Illuminate\Support\Facades\DB;

class CartRepository extends BaseRepository
{
    private $cart;
    private $goods;
    private $goods_spec;
    private $user_id;
    private $goods_num;
    private $goods_type;

    /**
     * CartRepository constructor.
     */
    public function __construct($user_id=0)
    {
        $this->cart = new Cart();
        $this->user_id=$user_id;
    }
    public function getCartList($user_id){
        $cart_list=$this->cart->where('user_id',$user_id)->get();
        return $cart_list;
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
     * @throws CartException
     */
    public function addGoodsToCart($goods_id, $item_id, $goods_num, $user_id)
    {
        $this->setGoodsRepository($goods_id);
        $this->setGoodsSpecPriceRepository($item_id);
        $this->setGoodsNum($goods_num);
        if (empty($this->goods)) {
            throw new CartException('加入购物车', 0, ['status' => 0, 'msg' => '购买商品不存在']);
        }

        //s商品类型
        if ($this->goods_spec) {
            $prom_type = $this->goods_spec['prom_type'];
        } else {
            $prom_type = $this->goods['prom_type'];
        }
        switch ($prom_type) {
            case 1:
            case 2:
            case 3:
            default:
                $this->addNormalGoods($goods_id, $item_id, $goods_num, $user_id);
        }
    }

    /**
     * Notes:设置普通商品
     * User:
     * Date:2018/11/19
     * @param $goods_id
     * @return GoodsRepository|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function setGoodsRepository($goods_id)
    {
        $goods = new GoodsRepository();
        $this->goods = $goods->getGoodsById($goods_id);
    }

    /**
     * Notes:设置含规格的商品
     * User:
     * Date:2018/11/19
     * @param $item_id
     */
    public function setGoodsSpecPriceRepository($item_id)
    {
        if ($item_id > 0) {
            $goods_spec = new GoodsSpecPriceRepository();
            $this->goods_spec = $goods_spec->getGoodsSpecPriceByItemId($item_id);
            $this->goods_type = 1;
        } else {
            $this->goods_spec = null;
            $this->goods_type = 0;
        }
    }

    /**
     * Notes:设置用户id
     * User:
     * Date:2018/11/19
     * @param $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function addNormalGoods($goods_id, $item_id, $goods_num, $user_id)
    {
        //判断商品类型
        if (empty($this->goods_spec)) {
            $price = $this->goods['shop_price'];
            $store_count = $this->goods['store_count'];
            $is_exist = $this->getGoodsNumInCart($this->goods['goods_id'], 0);
            if ($goods_num > $store_count) {
                throw new CartException("加入购物车", 0, ['status' => 0,
                                                     'msg'    => '商品库存不足，剩余' . $store_count . ',当前购物车已有' . $is_exist . '件']
                );
            }
        } else {
            $price = $this->goods_spec['price'];
            $store_count = $this->goods_spec['store_count'];
            $is_exist = $this->getGoodsNumInCart($this->goods_spec['item_id'], $user_id, 1);
            if ($goods_num > ($store_count - $is_exist)) {
                throw new CartException("加入购物车", 0, ['status' => 0,
                                                     'msg'    => '商品库存不足，剩余' . $store_count . ',当前购物车已有' . $is_exist . '件']
                );
            }
        }
        //阶梯价格未采用待完善
        //判断购物车中是否已经存在
        if ($is_exist) {
            $goods_num = $is_exist + $goods_num;
            $this->updateGoodsNum($goods_num, $goods_id, $item_id, $this->goods_type, $user_id);
        } else {
            $cart_add_data = array(
                'user_id'            => $user_id,   // 用户id
                //                'session_id' => $this->session_id,   // sessionid
                'goods_id'           => $this->goods['goods_id'],   // 商品id
                'goods_sn'           => $this->goods['goods_sn'],   // 商品货号
                'goods_name'         => $this->goods['goods_name'],   // 商品名称
                'market_price'       => $this->goods['market_price'],   // 市场价
                'goods_price'        => $price,  // 原价
                'member_goods_price' => $price,  // 会员折扣价 默认为 购买价
                'goods_num'          => $goods_num, // 购买数量
                'add_time'           => time(), // 加入购物车时间
                'prom_type'          => 0,   // 0 普通订单,1 限时抢购, 2 团购 , 3 促销优惠
                'prom_id'            => 0,   // 活动id
            );
            if ($this->goods_spec) {
                $cart_add_data['item_id'] = $this->goods_spec['item_id'];
                $cart_add_data['market_price'] = $this->goods_spec['market_price'];
                $cart_add_data['spec_key'] = $this->goods_spec['key'];
                $cart_add_data['spec_key_name'] = $this->goods_spec['key_name']; // 规格 key_name
                $cart_add_data['sku'] = $this->goods_spec['sku']; //商品条形码
            }
            $this->insertGoods($cart_add_data);
        }
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/11/20
     * @param $goods_id
     * @param int $goods_type
     * @return mixed
     */
    public function getGoodsNumInCart($goods_id, $user_id, $goods_type = 0)
    {
        if ($goods_type == 0) {
            $result= $this->cart->where('user_id', $user_id)->where('goods_id', $goods_id)->first();
            return $result['goods_num'];
        } elseif ($goods_type == 1) {
            $result= $this->cart->where('user_id', $user_id)->where('item_id', $goods_id)->first();
            return $result['goods_num'];
        }
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/11/20
     * @param $goods_num
     */
    public function setGoodsNum($goods_num)
    {
        $this->goods_num = $goods_num;
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/11/20
     * @return mixed
     */
    public function getGoodsNum()
    {
        return $this->goods_num;
    }

    /**
     * Notes:商品加入购物车，购物车中已存在该商品时更新数量
     * User:Feng
     * Date:2018/11/20
     * @param $goods_num
     * @param $goods_type
     * @throws CartException
     */
    public function updateGoodsNum($goods_num, $goods_id, $item_id, $goods_type, $user_id)
    {
        if ($goods_type) {
            $result = $this->cart->where('user_id', $user_id)->where('item_id', $item_id)->update(['goods_num' => $goods_num]);
        } else {
            $result = $this->cart->where('user_id', $user_id)->where('goods_id', $goods_id)->update(['goods_num' => $goods_num]);
        }
        if ($result == false) {
            throw new CartException("加入购物车", 0, ['status' => 0, 'msg' => 'update加入购物车失败']);
        }
    }

    /**
     * Notes:商品加入购物车，购物车中不存在该商品时，增加该商品
     * User:Feng
     * Date:2018/11/20
     * @param $data
     * @throws CartException
     */
    public function insertGoods($data)
    {
        $result = $this->cart->insert($data);
        if ($result == false) {
            throw new CartException("加入购物车", 0, ['status' => 0, 'msg' => '加入购物车失败']);
        }
    }

    /**
     * Notes:更新购物车信息
     * User:Feng
     * Date:2018/11/27
     * @param array $cart
     * @return array
     */
    public function asyncUpdateCart($cart=[]){
        $cart_list=$cart_selected_id=$cart_no_selected_id=[];
        if (empty($cart)){
            return ['status'=>0,'msg'=>'购物车没有商品','result'=>compact('total_fee','goods_fee','goods_num','cart_list')];
        }
        foreach ($cart as $key=>$val){
            if ($cart[$key]['selected']==1){
                $cart_selected_id[]=$cart[$key]['id'];
            }else{
                $cart_no_selected_id[]=$cart[$key]['id'];
            }
        }
        //省略用户判断代码
        if (!empty($cart_no_selected_id)){
            DB::table('carts')->whereIn('id',$cart_no_selected_id)->update(['selected'=>0]);
        }
        if (empty($cart_selected_id)){
            $cart_price_info=$this->getCartPriceInfo();
            $cart_price_info['cart_list']=$cart_list;
            return ['status'=>1,'msg'=>'没有选中任何商品','result'=>$cart_price_info];
        }
        DB::table('carts')->whereIn('id',$cart_selected_id)->update(['selected'=>1]);
        $cart_list=DB::table('carts')->whereIn('id',$cart_selected_id)->get()->toArray();
        foreach ($cart_list as $v){
            $cart_list_attr[]=array_merge((Array)$v,['cut_fee'=>0,'total_fee'=>$v->goods_price*$v->goods_num,'goods_fee'=>$v->goods_price]);
        }

        //搭配购买待完善
//        var_dump($cart_list_attr);
        if ($cart_list_attr){
            $cart_price_info=$this->getCartPriceInfo($cart_list_attr);
            $cart_price_info['cart_list']=$cart_list_attr;
            return ['status'=>1,'msg'=>'计算成功','result'=>$cart_price_info];
        }else{
            $cart_price_info=$this->getCartPriceInfo();
            $cart_price_info['cart_list']=$cart_list_attr;
            return ['status'=>1,'msg'=>'没有选中任何商品','result'=>$cart_price_info];
        }
    }

    /**
     * Notes:计算购物车商品数量、商品价格
     * User:Feng
     * Date:2018/11/26
     * @param array $cart_list
     * @return array
     */
    public function getCartPriceInfo($cart_list=[]){
        $total_fee=$goods_fee=$goods_num=0;
        if ($cart_list){
            foreach ($cart_list as $key=>$value){
                $total_fee+=$value['goods_price']*$value['goods_num'];
                $goods_fee+=$value['cut_fee'];
                $goods_num+=$value['goods_num'];
            }
        }
        return compact('total_fee','goods_fee','goods_num');
    }

    /**
     * Notes:更改购物车商品数量
     * User:Feng
     * Date:2018/11/27
     * @param $id
     * @param $num
     * @return array
     */
    public function changeNum($id,$num){
        if (!$this->user_id){
            $cart=$this->cart->where('user_id',$this->user_id)->whereId($id)->first();
        }else{

        }

        $cart->goods_num=$num;
        $result=$cart->save();
        if ($result){
            return ['status' => 1, 'msg' => '修改商品数量成功', 'result' => ''];
        }else{
            return ['status'=>0,'msg'=>'修改商品数量失败，请重试','result'=>''];
        }
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/10
     * @param array $cart_id
     * @return mixed
     */
    public function delete(array $cart_id){
        if (!$this->user_id){
            $result=$this->cart->where('user_id',$this->user_id)->whereIn('id',$cart_id)->delete();
        }
        return $result;
    }
}