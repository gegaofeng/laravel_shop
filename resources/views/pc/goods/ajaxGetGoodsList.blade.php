<div class="shop-list-splb p">
    <ul>
        @foreach($goods_list as $goods)
            <li>
                <div class="s_xsall">
                    <div class="xs_img">
                        <a href="{{url('goodsinfo/'.$goods['goods_id'])}}">
                            <img class="lazy-list"
                                 data-original="{{goods_thum_images($goods['goods_id'],236,236)}}"/>
                        </a>
                    </div>
                    <div class="xs_slide">
                        <div class="small-xs-shop">
                            <ul>
                                @foreach($goods_images as $goods_image)
                                    @if($goods['goods_id']==$goods_image['goods_id'])
                                        <li>
                                            <a href="javascript:void(0);">
                                                <img class="lazy-list"
                                                     data-original="{{$goods_image['image_url']}}"/>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="price-tag">
                                        <span class="now"><em
                                                    class="li_xfo">￥</em><em>{{$goods['shop_price']}}</em></span>
                        <span class="old"><em>￥</em><em>{{$goods['market_price']}}</em></span>
                    </div>
                    <div class="shop_name2">
                        <a href="{{url('goodsinfo/'.$goods['goods_id'])}}">
                            {{$goods['goods_name']}}</a>
                    </div>
                    <div class="J_btn_statu">
                        <div class="p-num">
                            <input class="J_input_val" id="number_{{$goods['goods_id']}}" type="text"
                                   value="1">
                            <p class="act">
                                <a href="javascript:void(0);"
                                   onClick="goods_add({{$goods['goods_id']}});"
                                   class="litt-zzyl1"></a>
                                <a href="javascript:void(0);"
                                   onClick="goods_cut({{$goods['goods_id']}});"
                                   class="litt-zzyl2"></a>
                            </p>
                        </div>
                        <div class="p-btn">
                            <a href="javascript:void(0);"
                               onclick="AjaxAddCart({{$goods['goods_id']}},$('#number_'+{{$goods['goods_id']}}).val());">加入购物车</a>
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<div class="page p">
    <div class='dataTables_paginate paging_simple_numbers'>
        {{$goods_list->links('pc.particals.paginator')}}
    </div>
</div>
<script>
    /***滑过浏览商品 start***/
    $('.small-xs-shop ul li').hover(function () {
        $(this).addClass('bored').siblings().removeClass('bored');
        var small_src = $(this).find('img').attr('src');
        $(this).parents('.s_xsall').find('.xs_img').find('img').attr('src', small_src);
    }, function () {

    });
    /***滑过浏览商品 end***/
</script>