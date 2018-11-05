@extends('pc.layouts.home')
@section('personal_style')
    <meta charset="UTF-8">
    <title>{{$goods['goods_name']}}-{$tpshop_config['shop_info_store_name']}</title>
    <meta name="keywords" content="{{$goods['keywords']}}"/>
    <meta name="description" content="{{$goods['goods_remark']}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/tpshop.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('static/css/jquery.jqzoom.css')}}">
    <script src="{{asset('static/js/jquery-1.11.3.min.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('static/js/move.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{asset('')}}/js/layer/layer-min.js"></script>
    <script type="text/javascript" src="{{asset('static')}}/js/jquery.jqzoom.js"></script>
    <script src="{{asset('/js/global.js')}}"></script>
    <script src="{{asset('/js/pc_common.js')}}"></script>
    <link rel="stylesheet" href="{{asset('static/css/location.css')}}" type="text/css"><!-- 收货地址，物流运费 -->
    <link rel="shortcut icon" type="image/x-icon"
          href="{$tpshop_config.shop_info_store_ico|default='/public/static/images/logo/storeico_default.png'}"
          media="screen"/>
@endsection
@section('body')
<body>
<!--header-s-->
@include('pc.particals.head')
<!--header-e-->
<div class="search-box p">
    <div class="w1224">
        <div class="search-path fl">
            @foreach($cat_navigation as $item=>$value)
                <a href="{{url('goodslist/'.$item)}}">{{$value}}</a>
                <i class="litt-xyb"></i>
            @endforeach
            <div class="havedox">
                <span>{{$goods['goods_name']}}</span>
            </div>
        </div>
		<!--
        <div class="online-service fr p">
        	<a href="javascript:void(0);" class="z-onlines z-online-service fr"><i></i>在线客服</a>
        </div>
		-->
    </div>
</div>
<div class="details-bigimg p">
    <div class="w1224">
        <div class="detail-img">
            <div class="product-gallery">
                <div class="product-photo" id="photoBody">
                    <div class="product-video">
                        <if condition="$goods.video">
                            <video id="video" src="{{$goods['video']}}" controls="controls" preload="preload"
                                   onended="this.load();">
                                您的浏览器不支持查看此视频，请升级浏览器到最新版本
                            </video>
                        </if>
                    </div>
                    <i class="close-video"></i>
                    <i class="video-play"></i>
                    <!-- 商品大图介绍 start [[-->
                    <div class="product-img jqzoom">
                        <img id="zoomimg" src="{{goods_thum_images($goods['goods_id'],400,400)}}"
                             jqimg="{{goods_thum_images($goods['goods_id'],800,800)}}">
                    </div>
                    <!-- 商品大图介绍 end ]]-->
                    <!-- 商品小图介绍 start [[-->
                    <div class="product-small-img fn-clear">
                        <a href="javascript:;" class="next-left next-btn fl disabled"><</a>
                        <div class="pic-hide-box fl">
                            <ul class="small-pic" id="small-pic" style="left:0;">
                                @foreach($goods_images as $image)
                                    <li class="small-pic-li">
                                        <a href="javascript:;"><img src="{{get_sub_images($image,$goods['goods_id'],60,60)}}"
                                                                    data-img="{{get_sub_images($image,$goods['goods_id'],400,400)}}"
                                                                    data-big="{{get_sub_images($image,$goods['goods_id'],800,800)}}">
                                            <i></i></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="javascript:;" class="next-right next-btn fl">></a></div>
                    <!-- 商品小图介绍 end ]]-->
                </div>
                <!-- 收藏商品 start [[-->
                <div class="collect">
                    <a href="javascript:void(0);" id="collectLink"><i class="collect-ico collect-ico-null"></i>
                        <span class="collect-text">收藏商品</span>
                        <em class="J_FavCount">({{$goods['collect_sum']+$goods['virtual_collect_sum']}})</em>
                    </a>
                    <!--<a href="javascript:void(0);" id="collectLink"><i class="collect-ico collect-ico-ok"></i>已收藏<em class="J_FavCount">(20)</em></a>-->
                </div>
                <!-- 分享商品 -->
                <div class="share">
                    <div class="jiathis_style">
                        <div class="bdsharebuttonbox">
                            <a href="#" class="bds_more" data-cmd="more"></a>
                            <a href="#" class="bds_qzone" data-cmd="qzone"></a>
                            <a href="#" class="bds_tsina" data-cmd="tsina"></a>
                            <a href="#" class="bds_tqq" data-cmd="tqq"></a>
                            <a href="#" class="bds_renren" data-cmd="renren"></a>
                            <a href="#" class="bds_weixin" data-cmd="weixin"></a>
                        </div>
                    </div>
                    <script>
                        var bd_url = "http://{$_SERVER[HTTP_HOST]}/index.php?m=Home&c=Goods&a=goodsInfo&id={$_GET[id]}";
                        var bd_pic = "http://{$_SERVER[HTTP_HOST]}{$goods[goods_id]|goods_thum_images=400,400}";
                        var bdText = "{{$goods['goods_name']}}";
                        var is_distribut = getCookie('is_distribut');
                        var user_id = getCookie('user_id');
                        // 如果已经登录了, 并且是分销商
                        if (parseInt(is_distribut) == 1 && parseInt(user_id) > 0) {
                            bd_url = bd_url + "&first_leader=" + user_id;
                        }

                        function setShareConfig(id, config) {
                            config.bdUrl = bd_url;
                            config.bdPic = bd_pic;
                            config.bdText = bdText;
                            return config;
                        }

                        window._bd_share_config = {
                            "common": {
                                onBeforeClick: setShareConfig,
                                "bdSnsKey": {},
                                "bdText": "",
                                "bdMini": "2",
                                "bdPic": "",
                                "bdStyle": "0",
                                "bdSize": "16"
                            },
                            "share": {},
                            "image": {
                                "viewList": ["qzone", "tsina", "tqq", "renren", "weixin"],
                                "viewText": "分享到：",
                                "viewSize": "16"
                            },
                            "selectShare": {
                                "bdContainerClass": null,
                                "bdSelectMiniList": ["qzone", "tsina", "tqq", "renren", "weixin"]
                            }
                        };
                        with (document) 0[(getElementsByTagName('head')[0] || body).appendChild(createElement('script')).src = 'http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion=' + ~(-new Date() / 36e5)];
                    </script>
                </div>
            </div>
        </div>
        <form id="buy_goods_form" name="buy_goods_form" method="post" action="">
            <input type="hidden" name="goods_id" value="{{$goods['goods_id']}}"><!-- 商品id -->
            <input type="hidden" name="goods_prom_type" value="{{$goods['prom_type']}}"/><!-- 活动类型 -->
            <input type="hidden" name="shop_price" value="{{$goods['shop_price']}}"/><!-- 活动价格 -->
            <input type="hidden" name="store_count" value="{{$goods['store_count']}}"/><!-- 活动库存 -->
            <input type="hidden" name="market_price" value="{{$goods['market_price']}}"/><!-- 商品原价 -->
            <input type="hidden" name="start_time" value=""/><!-- 活动开始时间 -->
            <input type="hidden" name="end_time" value=""/><!-- 活动结束时间 -->
            <input type="hidden" name="activity_title" value=""/><!-- 活动标题 -->
            <input type="hidden" name="prom_detail" value=""/><!-- 促销活动的促销类型 -->
            <input type="hidden" name="activity_is_on" value=""/><!-- 活动是否正在进行中 -->
            <input type="hidden" name="item_id" value="{$Request.param.item_id}"/><!-- 商品规格id -->
            <input type="hidden" name="exchange_integral" value="{$goods.exchange_integral}"/><!-- 积分 -->
            <input type="hidden" name="point_rate" value="{$point_rate}"/><!-- 积分兑换比 -->
            <input type="hidden" name="is_virtual" value="{$goods.is_virtual}"/><!-- 是否是虚拟商品 -->
            <input type="hidden" name="virtual_limit" id="virtual_limit" value="{$goods.virtual_limit|default=0}"/>
            <div class="detail-ggsl">
                <h1>{{$goods['goods_name']}}</h1>
                <div class="presale-time" style="display: none">
                    <div class="pre-icon fl">
                        <span class="ys"><i class="detai-ico"></i><span id="activity_type">抢购活动</span></span>
                    </div>
                    <div class="pre-icon fr">
                        <span class="per" style="display: none"><i class="detai-ico"></i><em id="order_user_num">0</em>人预定</span>
                        <span class="ti" id="activity_time"><i class="detai-ico"></i>剩余时间：<span
                                id="overTime"></span></span>
                        <span class="ti" id="prom_detail"></span>
                    </div>
                </div>
                <div class="shop-price-cou p">
                    <div class="shop-price-le">
                        <ul>
                            <li class="jaj"><span id="goods_price_title">商城价：</span></li>
                            <li>
                                <span class="bigpri_jj" id="goods_price"><em>￥</em>
                                    <!--<a href=""><em class="sale">（降价通知）</em></a>-->
                                </span>
                            </li>
                        </ul>
                        <ul>
                            <li class="jaj"><span id="market_price_title">市场价：</span></li>
                            <li class="though-line"><span><em>￥</em><span id="market_price">{{$goods['market_price']}}</span></span>
                                <span class="mobile-buy-cheap">
                                    手机购买更便宜
                                    <i>
                                    <img class="small-qrcode-h" src="{{asset('static/images/qrcode.png')}}"
                                         alt=""/>
                                    <img class="big-qrcode-h"
                                         img-url="/index.php?m=Home&c=Index&a=qr_code&data={$ShareLink}&head_pic={$head_pic}&back_img={$back_img}"
                                         alt=""/>
                                    </i>
                                </span>
                            </li>
                        </ul>
                        <ul id="activity_title_div" style="display: none">
                            <li class="jaj"><span id="activity_label"></span></li>
                            <li><span id="activity_title"
                                      style="color: #df3033;background: 0 0;border: 1px solid #df3033;padding: 2px 3px;"></span>
                            </li>
                        </ul>
                        <if condition="$goods['give_integral'] gt 0">
                            <ul>
                                <li class="jaj ls4"><span>赠送积分：</span></li>
                                <li><span class="fullminus">{{$goods['give_integral']}}</span></li>
                            </ul>
                        </if>
                    </div>
                    <div class="shop-cou-ri">
                        <div class="allcomm"><p>累计评价</p>
                            <p class="f_blue">{{$goods['comment_count']}}</p></div>
                        <div class="br1"></div>
                        <div class="allcomm"><p>累计销量</p>
                            <p class="f_blue">{{$goods['sales_sum']+$goods['virtual_sales_sum']}}</p></div>
                    </div>
                </div>
                <if condition="$goods[is_virtual] eq 0">
                    <div class="standard p">
                        <!-- 收货地址，物流运费 -start-->
                        <ul class="list1">
                            <li class="jaj"><span>配&nbsp;&nbsp;送：</span></li>
                            <li class="summary-stock though-line">
                                <div class="dd shd_address">
                                    <!--<div class="addrID"><div></div><b></b></div>-->
                                    <div class="store-selector add_cj_p">
                                        <div class="text" style="width: 150px;">
                                            <div></div>
                                            <b></b></div>
                                        <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                    </div>
                                    <span id="dispatching_msg" style="display: none;">可配送</span>
                                    <span id="dispatching_desc"
                                          style="vertical-align: middle;position: relative;top: -4px;left: 9px;color: #666"></span>
                                </div>
                            </li>
                        </ul>
                        {{--<script src="{{asset('/js/locationJson.js')}}"></script>--}}
                                                <!-- 收货地址，物流运费 -end-->
                    </div>
                </if>
                <div class="standard p">
                    <ul>
                        <li class="jaj"><span>服&nbsp;&nbsp;务：</span></li>
                        <li class="lawir"><span class="service">由<a>{$tpshop_config['shop_info_store_name']}</a>发货并提供售后服务</span>
                        </li>
                    </ul>
                </div>
                <notempty name="$goods['brand']">
                    <div class="standard p">
                        <ul>
                            <li class="jaj"><span>品&nbsp;&nbsp;牌：</span></li>
                            <li class="lawir"><span class="service">{$goods['brand']['name']}</span></li>
                        </ul>
                    </div>
                </notempty>
                <if condition="$goods['is_virtual'] eq 0 and $goods['exchange_integral'] gt 0">
                    <div class="standard p">
                        <ul>
                            <li class="jaj"><span>可&nbsp;&nbsp;用：</span></li>
                            <li class="lawir">
                                <span class="service" id="integral">
                                    {:round($goods['shop_price']-$goods['exchange_integral']/$point_rate,2)}
                                    +{$goods['exchange_integral']}积分
                                </span></li>
                        </ul>
                    </div>
                </if>

                <!-- 规格 start [[-->
                <foreach name="filter_spec" item="v" key="k">
                    <div class="spec_goods_price_div standard p">
                        <ul>
                            <li class="jaj"><span>{$k}：</span></li>
                            <li class="lawir colo">
                                <foreach name="v" item="v2" key="k2">
                                    <input type="radio" hidden id="goods_spec_{$v2[item_id]}" name="goods_spec[{$k}]" value="{$v2[item_id]}"/>
                                    <a id="goods_spec_a_{$v2[item_id]}" class="spec_item">
                                        <if condition="$v2[src] neq ''">
                                            <img src="{$v2[src]}" style="width: 40px;height: 40px;"/>
                                            <span class="dis_alintro">{$v2[item]}</span>
                                            <else/>
                                            {$v2[item]}
                                        </if>
                                    </a>
                                </foreach>
                            </li>
                        </ul>
                    </div>
                </foreach>
                <script>

                </script>
                <!-- 规格end ]]-->
                <div class="standard">
                    <ul class="p">
                        <li class="jaj"><span>数&nbsp;&nbsp;量：</span></li>
                        <li class="lawir">
                            <div class="minus-plus">
                                <a class="mins" href="javascript:void(0);" onclick="altergoodsnum(-1)">-</a>
                                <input class="buyNum" id="number" type="text" name="goods_num" value="1"
                                       onblur="altergoodsnum(0)" max=""/>
                                <a class="add" href="javascript:void(0);" onclick="altergoodsnum(1)">+</a>
                            </div>
                            <div class="sav_shop">库存：<span id="spec_store_count">{{$goods['store_count']}}</span></div>
                        </li>
                    </ul>
                </div>
                <!-- 预售 s -->
                <div class="allpre-ne-ter pre_sell_div" style=" margin-top: 15px; min-height: 100px;display: none">
                    <div class="presell_allpri" style="display:block">
                        <ul id="price_ladder_html"></ul>
                    </div>
                    <a href="javascript:" class="jieti-anniu price_ladder_more">
                        展开
                    </a>
                    <script>
                        function satrhide() {
                            var b = $('.presell_allpri ul li').length;
                            for (var i = 4; i < b; i++) {
                                $('.presell_allpri ul li').eq(i).hide();
                            }
                        };

                        function satrshow() {
                            var b = $('.presell_allpri ul li').length;
                            for (var i = 4; i < b; i++) {
                                $('.presell_allpri ul li').eq(i).show();
                            }
                        };
                        satrhide();
                        $(function () {
                            $('.jieti-anniu').click(function () {
                                satrshow();
                                $(this).hide();
                            });

                            $('.allpre-ne-ter').mouseleave(function () {
                                satrhide();
                                if (price_ladder.length > 4) {
                                    $('.jieti-anniu').show();
                                } else {
                                    $('.jieti-anniu').hide();
                                }
                            });
                        })
                    </script>
                </div>
                <!-- 预售 e -->
                <div class="standard p">
                    <div class="standard p">
                        <a id="buy_now" class="paybybill buy_button" href="javascript:;" style="display: none">立即购买</a>
                        <a id="join_cart" class="addcar buy_button" href="javascript:;" style="display: none"><i class="sk"></i>加入购物车</a>
                    </div>
                </div>
            </div>
        </form>
        <!--看了又看-s-->
        <div class="detail-ry p">
            <div class="type_more">
                <div class="type-top">
                    <h2>看了又看<a class="update_h fr" href="javascript:;" onclick="replace_look();">换一换</a></h2>
                </div>
                <div id="see_and_see">
                </div>
            </div>
        </div>
        <!--看了又看-s-->
    </div>
</div>
<!--搭配购组合套餐 s-->
@include('pc.goods.goodsInfoCombination')
<!--搭配购组合套餐 e-->
<div class="detail-main p">
    <div class="w1224">
        <div class="deta-le-ma">
            <div class="type_more">
                <div class="type-top">
                    <h2>热搜推荐</h2>
                </div>
                <div class="type-bot">
                    <ul class="xg_typ">
                        <foreach name="tpshop_config.hot_keywords" item="wd" key="k">
                            <li><a href="{:U('Home/Goods/search',array('q'=>$wd))}">{$wd}</a></li>
                        </foreach>
                    </ul>
                </div>
            </div>
            <div class="type_more ma-to-20">
                <div class="type-top">
                    <h2>推荐热卖</h2>
                </div>
                <div class="tjhot-shoplist type-bot">
                    <tpshop sql="select goods_id,goods_name,shop_price from __PREFIX__goods where is_recommend=1 and is_on_sale = 1 order by goods_id desc limit 10"
                            item="vo" key="k">
                        <div class="alone-shop">
                            <a href="{:U('Home/Goods/goodsInfo',array('id'=>$vo[goods_id]))}"><img
                                    src="{$vo.goods_id|goods_thum_images=206,206}" style="display: inline;"></a>
                            <p class="line-two-hidd"><a href="{:U('Home/Goods/goodsInfo',array('id'=>$vo[goods_id]))}">{$vo.goods_name|getSubstr=0,30}</a>
                            </p>
                            <p class="price-tag"><span class="li_xfo">￥</span><span>{$vo.shop_price}</span></p>
                            <!--<p class="store-alone"><a href="">恒要达食品专享店</a></p>-->
                        </div>
                    </tpshop>
                </div>
            </div>
        </div>
        @include('pc.goods.goodsInfoDetail')
    </div>
</div>
<script type="text/javascript">
    //	商品详情页 滚动到一定位置固定定位
    $(window).scroll(function () {
        if ($(window).scrollTop() <= 850) {
            $("#datail-nav-top").css("position", "static");
        } else {
            $("#datail-nav-top").css({
                "position": "fixed",
                "top": "0",
                "left": "600",
                "width": "968",
                "z-index": "10007",
                "background-color": "#fff"
            });
        }
    });

</script>
<!--footer-s-->
@include('pc.particals.footer')
@include('pc.public.sidebar_cart')
<!--看了又看-s-->
<div style="display: none" id="look_see">
    <foreach name="look_see" item="look" key="k">
        <div class="tjhot-shoplist type-bot">
            <div class="alone-shop">
                <a href="{:U('Home/Goods/goodsInfo',array('id'=>$look[goods_id]))}">
                    <img class="wiahides"src="{$look.goods_id|goods_thum_images=206,206}" style="display: inline;"></a>
                <p class="shop_name2">
                    <a href="{:U('Home/Goods/goodsInfo',array('id'=>$look[goods_id]))}">{$look.goods_name}</a>
                </p>
                <p class="price-tag">
                    <span class="li_xfo">￥</span><span>{$look.shop_price}</span>
                </p>
            </div>
        </div>
    </foreach>
    <!--看了又看-s-->
</div>
<!--footer-e-->
<script src="{{asset('static/js/lazyload.min.js')}}" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="{{asset('static/js/headerfooter.js')}}"></script>
<script type="text/javascript">
    //判断是否有视频标签
    if ($('#video').length > 0) {
        $('#photoBody').addClass('videoshow-ac');
    }
    //点击关闭视频
    $('.video-play').click(function (event) {
        $('#photoBody').addClass('videoshow-ac').removeClass('picshow-ac');
        video.play();
    });
    //点击播放视频
    $('.close-video').click(function (event) {
        $('#photoBody').addClass('picshow-ac').removeClass('videoshow-ac');
        video.pause();
    });
    var commentType = 1;// 默认评论类型
    var spec_goods_price = {$spec_goods_price |default= 'null'};//规格库存价格
    $(document).ready(function () {
        /*商品缩略图放大镜*/
        $(".jqzoom").jqueryzoom({
            xzoom: 500,
            yzoom: 500,
            offset: 1,
            position: "right",
            preload: 1,
            lens: 1
        });
        replace_look();
        initSpec();
        initGoodsPrice();
        changeImg();
    });

    var buy_now = $('#buy_now');
    var join_cart = $('#join_cart');
    //购买按钮显示
    function buy_button(){
        var is_virtual = $("input[name='is_virtual']").val();//是否是虚拟商品
        var exchange_integral = $("input[name='exchange_integral']").val();//是否是为积分商品
        var goods_prom_type = $('input[name="goods_prom_type"]').attr('value');//活动商品
        var activity_is_on = $('input[name="activity_is_on"]').attr('value'); //活动是否进行中
        buy_now.hide();
        join_cart.hide();
        if(is_virtual == 1){
            buy_now.html('立即购买').show();
            return;
        }
        if(exchange_integral > 0){
            buy_now.html('立即兑换').show();
            return;
        }
        if(goods_prom_type == 4 && activity_is_on == 1){
            buy_now.html('立即预订').show();
            return;
        }
        buy_now.html('立即购买').show();
        join_cart.show();
    }

    //购买按钮
    $(function () {
        //立即购买
        $(document).on('click', '#buy_now', function () {
            if ($(this).hasClass('buy_bt_disable')) {
                return;
            }
            if (getCookie('user_id') == '') {
                pop_login();
                return;
            }
            var is_virtual = $("input[name='is_virtual']").val();//是否是虚拟商品
            var exchange_integral = $("input[name='exchange_integral']").val();//是否是积分兑换商品
            var goods_id = $("input[name='goods_id']").val();
            var store_count = $("input[name='store_count']").attr('value');// 商品原始库存
            var goods_num = parseInt($("input[name='goods_num']").val());
            var goods_prom_type = $('input[name="goods_prom_type"]').attr('value');//活动商品
            var activity_is_on = $('input[name="activity_is_on"]').attr('value'); //活动是否进行中
            var form = $('#buy_goods_form');
            if (is_virtual == 1) {
                var virtual_limit = parseInt($('#virtual_limit').val());
                if ((goods_num <= store_count && goods_num <= virtual_limit) || (goods_num < store_count && virtual_limit == 0)) {
                    form.attr('action', "{:U('Home/Cart/cart2',['action'=>'buy_now'])}").submit();
                } else {
                    layer.msg('购买数量超过此商品购买上限', {icon: 3});
                }
                return;
            }
            if (exchange_integral > 0) {
                buyIntegralGoods(goods_id, 1);
                return;
            }
//            if(goods_prom_type == 4 && activity_is_on == 1){
//                form.attr('action', "{:U('Home/Cart/pre_sell')}").submit();
//                return;
//            }
            //普通流程
            if (goods_num <= store_count) {
                form.attr('action', "{:U('Home/Cart/cart2',['action'=>'buy_now'])}").submit();
            } else {
                layer.msg('购买数量超过此商品购买上限', {icon: 3});
            }
        })
        //加入购物车
        $(document).on('click', '#join_cart', function () {
            if ($(this).hasClass('buy_bt_disable')) {
                return;
            }
            var goods_id = $("input[name='goods_id']").val();
            AjaxAddCart(goods_id, 1);
        })
    })

    //有规格id的时候，解析规格id选中规格
    function initSpec() {
        var item_id = $("input[name='item_id']").val();
        $.each(spec_goods_price, function (i, o) {
            if (o.item_id == item_id) {
                var spec_key_arr = o.key.split("_");
                $.each(spec_key_arr, function (index, item) {
                    var spec_radio = $("#goods_spec_" + item);
                    var goods_spec_a = $("#goods_spec_a_" + item);
                    spec_radio.attr("checked", "checked");
                    goods_spec_a.addClass('red');
                })
            }
        })
        if (item_id > 0 && !$.isEmptyObject(spec_goods_price)) {
            var item_arr = [];
            $.each(spec_goods_price, function (i, o) {
                item_arr.push(o.item_id);
            })
            //规格id不存在商品里
            if ($.inArray(parseInt(item_id), item_arr) < 0) {
                initFirstSpec();
            } else {
                $.each(spec_goods_price, function (i, o) {
                    if (o.item_id == item_id) {
                        var spec_key_arr = o.key.split("_");
                        $.each(spec_key_arr, function (index, item) {
                            var spec_radio = $("#goods_spec_" + item);
                            var goods_spec_a = $("#goods_spec_a_" + item);
                            spec_radio.attr("checked", "checked");
                            goods_spec_a.addClass('red');
                        })
                    }
                })
            }
        } else {
            initFirstSpec();
        }
    }

    //默认让每种规格第一个选中
    function initFirstSpec() {
        $('.spec_goods_price_div').each(function (i, o) {
            var firstSpecRadio = $(this).find("input[type='radio']").eq(0);
            firstSpecRadio.attr('checked', 'checked').prop('checked', 'checked');
            firstSpecRadio.parent().find('a').eq(0).addClass('red');
        })
    }

    //看了又看切换
    var tmpindex = 0;
    var look_see_length = $('#look_see').children().length;
    function replace_look() {
        var listr = '';
        if (tmpindex * 2 >= look_see_length) tmpindex = 0;
        $('#look_see').children().each(function (i, o) {
            if ((i >= tmpindex * 2) && (i < (tmpindex + 1) * 2)) {
                listr += '<div class="tjhot-shoplist type-bot">' + $(o).html() + '</div>';
            }
        });
        tmpindex++;
        $('#see_and_see').empty().append(listr);
    }

    //缩略图切换
    $('.small-pic-li').mouseenter(function () {
        if ($('#video').length > 0) {
            $('.close-video').trigger('click');
        }
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $('#zoomimg').attr('src', $(this).find('img').attr('data-img')).attr('jqimg', $(this).find('img').attr('data-big'));
    });

    //缩略图切换
    function changeImg() {
        var $picBox = $('#small-pic');
        var $picList = $picBox.find('.small-pic-li');
        var length = $picList.length;
        $picBox.css('width', 70 * length);
        if ($('#video').length > 0) { //判断是否有视频标签
            $('#photoBody').addClass('videoshow-ac');
        }
        $('.video-play').click(function (event) { //点击关闭视频
            $('#photoBody').addClass('videoshow-ac').removeClass('picshow-ac');
            video.play();
        });
        $('.close-video').click(function (event) {  //点击播放视频
            $('#photoBody').addClass('picshow-ac').removeClass('videoshow-ac');
            video.pause();
        });
        //缩略图切换
        $picList.mouseenter(function () {
            if ($('#video').length > 0) {
                $('.close-video').trigger('click');
            }
            $(this).addClass('active').siblings().removeClass('active');
            $('#zoomimg').attr('src', $(this).find('img').attr('data-img')).attr('jqimg', $(this).find('img').attr('data-big'));
        })
        var i = 0;
        if (length <= 5) {
            $('.product-gallery .next-btn').css('display', 'none');
        } else {
            //前一张缩略图
            $('.next-left').click(function () {
                i--;
                if (i < 0) {
                    i = 0;
                    return;
                }
                $picBox.animate({left: -i * 70}, 500);
            })
            //后前一张缩略图
            $('.next-right').click(function () {
                i++;
                if (i > length - 5) {
                    i = length - 5;
                    return;
                }
                $picBox.animate({left: -i * 70}, 500);
            })
        }
    }

    //购买数量加减
    function altergoodsnum(n) {
        var num = parseInt($('#number').val());
        var maxnum = parseInt($('#number').attr('max'));
        if (maxnum > 200) {
            maxnum = 200;
        }
        num += n;
        num <= 0 ? num = 1 : num;
        if (num >= maxnum) {
            $(this).addClass('no-mins');
            num = maxnum;
        }
        $('#store_count').text(maxnum - num); //更新库存数量
        $('#number').val(num);
        /*        initGoodsPrice();*/
    }

    //初始化商品价格库存
    function initGoodsPrice() {
        var goods_id = $('input[name="goods_id"]').val();
        var goods_num = parseInt($('#number').val());
        if (!$.isEmptyObject(spec_goods_price)) {
            var goods_spec_arr = [];
            $("input[name^='goods_spec']").each(function () {
                if ($(this).attr('checked') == 'checked') {
                    goods_spec_arr.push($(this).val());
                }
            });
            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
            if (spec_goods_price[spec_key] != undefined) {
                var item_id = spec_goods_price[spec_key]['item_id'];
                $('input[name=item_id]').val(item_id);
            } else {
                $("#goods_price").html("<em>￥</em>" + 0); //变动价格显示
                $('#spec_store_count').html(0);
                $('input[name="shop_price"]').attr('value', 0);//商品价格
                $('input[name="store_count"]').attr('value', 0);//商品库存
                $('.buy_button').addClass('buy_bt_disable');
                return false;
            }
        }
        $.ajax({
            type: 'post',
            dataType: 'json',
            data: {goods_id: goods_id, item_id: item_id, goods_num: goods_num},
            url: "{:U('Home/Goods/activity')}",
            success: function (data) {
                if (data.status == 1) {
                    $('input[name="goods_prom_type"]').attr('value', data.result.goods.prom_type);//商品活动类型
                    $('input[name="shop_price"]').attr('value', data.result.goods.shop_price);//商品价格
                    $('input[name="store_count"]').attr('value', data.result.goods.store_count);//商品库存
                    $('input[name="market_price"]').attr('value', data.result.goods.market_price);//商品原价
                    $('input[name="start_time"]').attr('value', data.result.goods.start_time);//活动开始时间
                    $('input[name="end_time"]').attr('value', data.result.goods.end_time);//活动结束时间
                    $('input[name="activity_title"]').attr('value', data.result.goods.activity_title);//活动标题
                    $('input[name="prom_detail"]').attr('value', data.result.goods.prom_detail);//促销详情
                    $('input[name="activity_is_on"]').attr('value', data.result.goods.activity_is_on);//活动是否正在进行中
                    price_ladder = data.result.goods.price_ladder;
                    goods_activity_theme();
                    buy_button();
                }
                doInitRegion();
            }
        });
    }

    //价格阶梯显示
    var price_ladder = null;
    function priceLadderShow() {
        var price_ladder_html = '';
        if (price_ladder != null && price_ladder != '') {
            $.each(price_ladder, function (i, o) {
                price_ladder_html += '<li class="pre_undred">满<span>' + o.amount + '件</span><br/><span>' + o.price + '</span></li>';
            });
            $('#price_ladder_html').empty().html(price_ladder_html);
            if (price_ladder.length > 3) {
                $('.price_ladder_more').show();
            } else {
                $('.price_ladder_more').hide();
            }
            $('.pre_sell_div').show();
        }
    }

    //商品价格库存显示
    function goods_activity_theme() {
        $('.pre_sell_div').hide();
        var goods_prom_type = $('input[name="goods_prom_type"]').attr('value');
        var activity_is_on = $('input[name="activity_is_on"]').attr('value');
        if (activity_is_on == 0) {
            setNormalGoodsPrice();
        } else {
            if (goods_prom_type == 0 || goods_prom_type == 6) {
                //普通商品
                setNormalGoodsPrice();
            } else if (goods_prom_type == 1) {
                //抢购
                setFlashSaleGoodsPrice();
            } else if (goods_prom_type == 2) {
                //团购
                setGroupByGoodsPrice();
            } else if (goods_prom_type == 3) {
                //优惠促销
                setPromGoodsPrice();
            } else {

            }
        }
        var buy_num = parseInt($('#number').val());//购买数
        var store = parseInt($('input[name="store_count"]').val());//实际库存数量
        if (store <= 0) {
            $('.buy_button').addClass('buy_bt_disable');
        } else {
            $('.buy_button').removeClass('buy_bt_disable');
        }
        if (buy_num > store) {
            $('.buyNum').val(store);
        }
    }

    //普通商品库存和价格
    function setNormalGoodsPrice() {
        var goods_price, store_count;//商品价,商品库存
        var market_price = $("input[name='market_price']").attr('value');// 商品市场价
        var exchange_integral = $("input[name='exchange_integral']").attr('value');// 兑换积分
        var point_rate = $("input[name='point_rate']").attr('value');// 积分金额比
        // 如果有属性选择项
        if (!$.isEmptyObject(spec_goods_price)) {
            var goods_spec_arr = [];
            $("input[name^='goods_spec']").each(function () {
                if ($(this).attr('checked') == 'checked') {
                    goods_spec_arr.push($(this).val());
                }
            });
            var spec_key = goods_spec_arr.sort(sortNumber).join('_');  //排序后组合成 key
            goods_price = spec_goods_price[spec_key]['price']; // 找到对应规格的价格
            store_count = spec_goods_price[spec_key]['store_count']; // 找到对应规格的库存
            market_price = spec_goods_price[spec_key]['market_price']; // 找到对应规格的市场价
            $("input[name='shop_price']").attr('value', goods_price);
            $("input[name='store_count']").attr('value', store_count);
            $("input[name='market_price']").attr('value', market_price);
        } else {
            priceLadderShow();
        }
        goods_price = $("input[name='shop_price']").attr('value');// 商品本店价
        store_count = $("input[name='store_count']").attr('value');// 商品库存
        $('#market_price_title').empty().html('市场价：');
        $('#market_price').empty().html(market_price);
        $("#goods_price").html("<em>￥</em>" + goods_price); //变动价格显示
        var integral = round(goods_price - (exchange_integral / point_rate), 2);
        $("#integral").html(integral + '+' + exchange_integral + '积分'); //积分显示
        $('#spec_store_count').html(store_count);
        $('.presale-time').hide();
        $('#number').attr('max', store_count);
    }

    //秒杀商品库存和价格
    function setFlashSaleGoodsPrice() {
        var flash_sale_price = $("input[name='shop_price']").attr('value');
        var flash_sale_count = $("input[name='store_count']").attr('value');
        var market_price = $("input[name='market_price']").attr('value');
        var start_time = $("input[name='start_time']").attr('value');
        var end_time = $("input[name='end_time']").attr('value');
        var activity_title = $("input[name='activity_title']").attr('value');
        $("#goods_price").html("<em>￥</em>" + flash_sale_price); //变动价格显示
        $('#spec_store_count').html(flash_sale_count);
        $('#goods_price_title').html('抢购价：');
        $('#market_price_title').empty().html('原&nbsp;&nbsp;价：');
        $('#activity_label').empty().html('抢&nbsp;&nbsp;购：');
        $('#activity_title').empty().html(activity_title);
        $('#activity_title_div').show();
        $('#market_price').empty().html(market_price);
        $('.presale-time').show();
        $('#prom_detail').hide();
        $('#number').attr('max', flash_sale_count);
        setInterval(activityTime, 1000);
    }

    //团购商品库存和价格
    function setGroupByGoodsPrice() {
        var group_by_price = $("input[name='shop_price']").attr('value');
        var group_by_count = $("input[name='store_count']").attr('value');
        var market_price = $("input[name='market_price']").attr('value');
        var start_time = $("input[name='start_time']").attr('value');
        var end_time = $("input[name='end_time']").attr('value');
        var activity_title = $("input[name='activity_title']").attr('value');
        $("#goods_price").empty().html("<em>￥</em>" + group_by_price); //变动价格显示
        $('#spec_store_count').empty().html(group_by_count);
        $('#activity_type').empty().html('团购');
        $('#goods_price_title').empty().html('团购价：');
        $('#market_price_title').empty().html('原&nbsp;&nbsp;价：');
        $('#activity_label').empty().html('团&nbsp;&nbsp;购：');
        $('#activity_title').empty().html(activity_title);
        $('#activity_title_div').show();
        $('#market_price').empty().html(market_price);
        $('.presale-time').show();
        $('#prom_detail').hide();
        $('#number').attr('max', group_by_count);
        setInterval(activityTime, 1000);
    }

    //促销商品库存和价格
    function setPromGoodsPrice() {
        var prom_goods_price = $("input[name='shop_price']").attr('value');
        var prom_goods_count = $("input[name='store_count']").attr('value');
        var market_price = $("input[name='market_price']").attr('value');
        var start_time = $("input[name='start_time']").attr('value');
        var end_time = $("input[name='end_time']").attr('value');
        var activity_title = $("input[name='activity_title']").attr('value');
        var prom_detail = $("input[name='prom_detail']").attr('value');
        $("#goods_price").empty().html("<em>￥</em>" + prom_goods_price); //变动价格显示
        $('#spec_store_count').empty().html(prom_goods_count);
        $('#activity_type').empty().html('促销');
        $('.presale-time').show();
        $('#prom_detail').empty().html(prom_detail).show();
        $('#activity_time').hide();
        $('#goods_price_title').empty().html('促销价：');
        $('#market_price_title').empty().html('原&nbsp;&nbsp;价：');
        $('#activity_label').empty().html('促&nbsp;&nbsp;销：');
        $('#activity_title').empty().html(activity_title);
        $('#activity_title_div').show();
        $('#market_price').empty().html(market_price);
        $('#number').attr('max', prom_goods_count);
    }

    // 倒计时
    function activityTime() {
        var end_time = parseInt($("input[name='end_time']").attr('value'));
        var timestamp = Date.parse(new Date());
        var now = timestamp / 1000;
        var end_time_date = formatDate(end_time * 1000);
        var text = GetRTime(end_time_date);
        //活动时间到了就刷新页面重新载入
        if (now > end_time) {
            layer.msg('该商品活动已结束', function () {
                location.reload();
            });
        }
        $("#overTime").text(text);
    }

    //时间戳转换
    function add0(m) {
        return m < 10 ? '0' + m : m
    }

    //时间戳转换字符
    function formatDate(now) {
        var time = new Date(now);
        var y = time.getFullYear();
        var m = time.getMonth() + 1;
        var d = time.getDate();
        var h = time.getHours();
        var mm = time.getMinutes();
        var s = time.getSeconds();
        return y + '/' + add0(m) + '/' + add0(d) + ' ' + add0(h) + ':' + add0(mm) + ':' + add0(s);
    }

    //sort排序用
    function sortNumber(a, b) {
        return a - b;
    }

    //收藏商品
    $('#collectLink').click(function () {
        if (getCookie('user_id') == '') {
            layer.msg('请先登录！', {icon: 1});
        } else {
            var goods_arr = new Array();
            //单个收藏
            goods_arr.push($('input[name="goods_id"]').val());
            $.ajax({
                type: 'post',
                dataType: 'json',
                data: {goods_ids: goods_arr},
                url: "{:U('Home/Goods/collect_goods')}",
                success: function (res) {
                    if (res.status == 1) {
                        layer.msg(res.msg, {icon: 1});
                    } else {
                        layer.msg(res.msg, {icon: 3});
                    }
                }
            });
        }
    });

    //点击切换规格
    $(document).on('click', '.spec_item', function () {
        var spec_item_img_src = $(this).find('img').attr('src');
        if (spec_item_img_src != '') {
            $('#zoomimg').attr('jqimg', spec_item_img_src).attr('src', spec_item_img_src);
        }
        $(this).addClass('red').siblings('a').removeClass('red');
        $(this).siblings('input').removeAttr('checked');
        $(this).prev('input').attr('checked', 'checked').prop('checked', 'checked');
        if ($('#video').length > 0) {
            //判断是否有视频标签
            $('#photoBody').addClass('picshow-ac');
            video.pause();
        }
        // 更新商品价格
        initGoodsPrice();
        //获取搭配购列表
        getCombination();
    })

</script>
</body>
@endsection