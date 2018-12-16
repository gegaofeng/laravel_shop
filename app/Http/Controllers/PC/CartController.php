<?php

namespace App\Http\Controllers\PC;

use App\Exceptions\CartException;
use App\Http\Requests\CartRequest;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    private $user_id = 0;
    private $cartRepository;

    /**
     * CartController constructor.
     */
    public function __construct()
    {
        $this->cartRepository = new CartRepository($this->user_id);
    }

    /**
     * Notes:购物车首页
     * User:Feng
     * Date:2018/11/27
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        var_dump(Auth::check());
        return Auth::id();
        $cart_list = $this->cartRepository->getCartList($this->getUserId());
        $total_goods_num = 0;
        if ($cart_list->isEmpty()) {
            $total_goods_num = 0;
        } else {
            foreach ($cart_list as $goods)
                $total_goods_num += $goods['goods_num'];
        }
        return view('pc.cart.index')->with('cart_list', $cart_list)->with('total_goods_num', $total_goods_num);
    }

    /**
     * Notes:
     * User:
     * Date:2018/11/19
     * @param CartRequest $request
     * @return array|string
     */
    public function ajaxAddCart(CartRequest $request)
    {
        $goods_id = $request['goods_id'];
        $goods_num = $request['goods_num'];
        $item_id = $request['item_id'];
        try {
            $this->cartRepository->addGoodsToCart($goods_id, $item_id, $goods_num, $this->getUserId());
            return json_encode(['status' => 1, 'msg' => '加入购物车成功']);
        } catch (CartException $e) {
            $error = $e->getErrorArr();
            return $error;
        }
    }

    /**
     * Notes:异步更新购物车信息
     * User:Feng
     * Date:2018/11/27
     * @param Request $request
     * @return string
     */
    public function asyncUpdateCart(Request $request)
    {
        $cart = $request['cart'];
        $result = $this->cartRepository->asyncUpdateCart($cart);
        return json_encode($result);
    }

    /**
     * Notes:修改购物车商品数量
     * User:Feng
     * Date:2018/11/27
     * @param Request $request
     * @return string
     */
    public function changeNum(Request $request)
    {
        $cart = $request->post('cart');
        if (empty($cart)) {
            return json_encode(['status' => 0, 'msg' => '请选择要更改数量的商品', 'result' => '']);
        }
        $result = $this->cartRepository->changeNum($cart['id'], $cart['goods_num']);
        return json_encode($result);
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/10
     * @param Request $request
     * @return string
     */
    public function delete(Request $request)
    {
        $carts_id = $request['cart_ids'];
        //        return $carts_id;
        $result = $this->cartRepository->delete($carts_id);
        if ($result) {
            return json_encode(['status' => 1, 'msg' => '删除成功', 'result' => $result]);
        } else {
            return json_encode(['status' => 0, 'msg' => '删除失败', 'result' => $result]);
        }
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/10
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function openAddCart()
    {
        return view('pc.cart.openAddCart');
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/10
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ajaxGetCartList()
    {
        return view('pc.cart.ajaxGetCatList');
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/10
     * @return int
     */
    public function getUserId()
    {
        return $this->user_id;
    }
}
