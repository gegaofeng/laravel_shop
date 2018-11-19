<?php

namespace App\Http\Controllers\PC;

use App\Exceptions\CartException;
use App\Http\Requests\CartRequest;
use App\Repositories\CartRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    //
    private $user_id = 0;
    private $cartRepository;

    public function __construct()
    {
        $this->cartRepository = new CartRepository();
    }

    public function index()
    {
        return view('pc.cart.index');
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

    public function openAddCart()
    {
        return view('pc.cart.openAddCart');
    }

    public function ajaxGetCartList()
    {
        return view('pc.cart.ajaxGetCatList');
    }

    public function getUserId()
    {
        return $this->user_id;
    }
}
