<empty name="cartList">
    <!--为空时-s-->
    <div class="empty-c">
        <span class="ma"><i class="c-i oh"></i>亲，购物车中没有商品哟~</span>
    </div>
    <!--为空时-e-->
    <else/>
    <!--现有商品时-->
    <div class="mn-c-m">
        <div class="mn-c-box">

            <volist name="cartList" id="cart">
                <div class="c-store">
                    <div class="c-store-tt">{$cart.add_time|date="Y-m-d H:i:s",###}</div>
                    <div class="c-sale-b" style="display:none">  <!-- 临时屏蔽 -->
                        <span class="i">[满减]</span>满299元减50元
                    </div>
                    <div class="c-item clearfix">
                        <a href="javascript:void(0);" class="del js_delete"
                           onclick="header_cart_del({$cart.id}),ajax_side_cart_list();">×</a>
                        <a href="{:U('Home/Goods/goodsInfo',array('id'=>$cart[goods_id]))}" class="goods-pic fl">
                            <img src="{$cart.goods_id|goods_thum_images=50,50}" alt="" title="{$cart[goods_name]}">
                        </a>
                        <div class="goods-cont fl">
                            <a href="{:U('Home/Goods/goodsInfo',array('id'=>$cart[goods_id]))}" class="goods-name">{$cart[goods_name]}</a>
                            <p class="num fl"> * {$cart[goods_num]}件</p>
                            <p class="red fr">￥{$cart[member_goods_price]}</p>
                        </div>
                    </div>
                </div>
            </volist>
            <div class="mn-c-total">
                <div class="c-t">
                    <p class="t-n fl"><span class="red" id="total_qty">{$cartPriceInfo[goods_num]}</span>件</p>
                    <p class="t-p red fr"><em>￥</em><span id="total_pay">{$cartPriceInfo[total_fee]}</span></p>
                </div>
                <a href="{{url('cart/index')}}" class="c-btn">去购物车结算 &gt;&gt;</a>
            </div>
        </div>
        <!--现有商品时-->
</empty>
<script>
    $(".cart_quantity").text('{$cartPriceInfo[goods_num]}'); // 购物车的总数量
</script>