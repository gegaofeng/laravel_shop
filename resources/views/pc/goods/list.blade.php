@extends('pc.layouts.home')
@section('personal_style')
    <link rel="stylesheet" type="text/css" href="{{url('css/pc/tpshop.css')}}"/>
    <link rel="shortcut icon" type="image/x-icon"
          href="/public/upload/logo/2018/04-09/516bc70315079d81dc3726991672b4af.png" media="screen"/>
    <script src="/public/js/layer/layer-min.js"></script>
    <script src="/public/js/global.js"></script>
    <script src="/public/js/pc_common.js"></script>
    <style>
        @media screen and (min-width: 1260px) and (max-width: 1465px) {
            .w1430 {
                width: 1224px;
            }
        }

        @media screen and (max-width: 1260px) {
            .w1430 {
                width: 983px;
            }
        }
    </style>
@endsection
@section('body')
    <body>
    {{--<link rel="stylesheet" type="text/css" href="/template/pc/rainbow/static/css/base.css"/>--}}
    {{--<link rel="shortcut icon" type="image/x-icon" href="/public/upload/logo/2018/04-09/516bc70315079d81dc3726991672b4af.png" media="screen"/>--}}
    @include('pc.public.head')

    <div class="search-box p">
        <div class="w1430">
            <div class="search-path fl">
                <a href="/Home/Goods/goodsList/id/31.html">全部结果</a>
                <i class="litt-xyb"></i>
                <!--如果当前分类是三级分类 则二级也要显示-->
                <!--如果当前分类是三级分类 则二级也要显示-->
                <!--当前分类-->
                <div class="havedox">
                    <div class="disenk"><span><a href="/Home/Goods/goodsList/id/31.html">手机</a></span><i
                                class="litt-xxd"></i></div>
                    <div class="hovshz">
                        <ul>
                            <li><a href="/Home/Goods/goodsList/id/32.html">手机通讯</a></li>
                            <li><a href="/Home/Goods/goodsList/id/33.html">运营商</a></li>
                            <li><a href="/Home/Goods/goodsList/id/34.html">手机配件</a></li>
                            <li><a href="/Home/Goods/goodsList/id/35.html">摄影摄像</a></li>
                            <li><a href="/Home/Goods/goodsList/id/36.html">数码配件</a></li>
                            <li><a href="/Home/Goods/goodsList/id/168.html">影音娱乐</a></li>
                            <li><a href="/Home/Goods/goodsList/id/177.html">电子教育</a></li>
                        </ul>
                    </div>
                </div>
                <i class="litt-xyb"></i>
            </div>
            <div class="search-clear fr">
                <span><a href="/Home/Goods/goodsList/id/31.html">清空筛选条件</a></span>
            </div>
        </div>
    </div>
    <!-- 筛选 start -->
    <div class="search-opt troblect">
        <div class="w1430">
            <div class="opt-list">
                <!-- 分类筛选 start -->
                <dl class="brand-section m-tr">
                    <dt>分类筛选</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/Home/Goods/goodsList/id/32.html">
                                        <span>手机通讯</span>
                                    </a>
                                    <a href="/Home/Goods/goodsList/id/33.html">
                                        <span>运营商</span>
                                    </a>
                                    <a href="/Home/Goods/goodsList/id/34.html">
                                        <span>手机配件</span>
                                    </a>
                                    <a href="/Home/Goods/goodsList/id/35.html">
                                        <span>摄影摄像</span>
                                    </a>
                                    <a href="/Home/Goods/goodsList/id/36.html">
                                        <span>数码配件</span>
                                    </a>
                                    <a href="/Home/Goods/goodsList/id/168.html">
                                        <span>影音娱乐</span>
                                    </a>
                                    <a href="/Home/Goods/goodsList/id/177.html">
                                        <span>电子教育</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>
                        </div>
                    </dd>
                </dl>
                <!-- 品牌筛选 start -->
                <!-- 品牌筛选 end -->
                <!-- 规格筛选 start -->
                <dl class="brand-section m-tr">
                    <dt>选择版本</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/home/Goods/goodsList/id/31/spec/3_9"
                                       data-href="/home/Goods/goodsList/id/31/spec/3_9" data-key='3' data-val='9'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>全网通3G+32G</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/3_10"
                                       data-href="/home/Goods/goodsList/id/31/spec/3_10" data-key='3' data-val='10'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>全网通4G+64G</span>
                                    </a>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm"
                                       onClick="submitMoreFilter('spec',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i
                                        class="litt-pluscr"></i></a>
                        </div>
                    </dd>
                </dl>
                <dl class="brand-section m-tr">
                    <dt>选择颜色</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/home/Goods/goodsList/id/31/spec/4_11"
                                       data-href="/home/Goods/goodsList/id/31/spec/4_11" data-key='4' data-val='11'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>红色</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/4_12"
                                       data-href="/home/Goods/goodsList/id/31/spec/4_12" data-key='4' data-val='12'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>铂光色</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/4_13"
                                       data-href="/home/Goods/goodsList/id/31/spec/4_13" data-key='4' data-val='13'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>极光色</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/4_14"
                                       data-href="/home/Goods/goodsList/id/31/spec/4_14" data-key='4' data-val='14'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>幻夜色</span>
                                    </a>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm"
                                       onClick="submitMoreFilter('spec',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i
                                        class="litt-pluscr"></i></a>
                        </div>
                    </dd>
                </dl>
                <dl class="brand-section m-tr">
                    <dt>套餐类型</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/home/Goods/goodsList/id/31/spec/5_15"
                                       data-href="/home/Goods/goodsList/id/31/spec/5_15" data-key='5' data-val='15'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>官方标配</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/5_16"
                                       data-href="/home/Goods/goodsList/id/31/spec/5_16" data-key='5' data-val='16'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>套餐一</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/5_17"
                                       data-href="/home/Goods/goodsList/id/31/spec/5_17" data-key='5' data-val='17'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>套餐二</span>
                                    </a>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm"
                                       onClick="submitMoreFilter('spec',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i
                                        class="litt-pluscr"></i></a>
                        </div>
                    </dd>
                </dl>
                <dl class="brand-section m-tr">
                    <dt>选择颜色</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/home/Goods/goodsList/id/31/spec/1_2"
                                       data-href="/home/Goods/goodsList/id/31/spec/1_2" data-key='1' data-val='2'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>紫色</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/1_3"
                                       data-href="/home/Goods/goodsList/id/31/spec/1_3" data-key='1' data-val='3'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>绿色</span>
                                    </a>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm"
                                       onClick="submitMoreFilter('spec',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i
                                        class="litt-pluscr"></i></a>
                        </div>
                    </dd>
                </dl>
                <dl class="brand-section m-tr">
                    <dt>码数</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/home/Goods/goodsList/id/31/spec/2_7"
                                       data-href="/home/Goods/goodsList/id/31/spec/2_7" data-key='2' data-val='7'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>L</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/spec/2_18"
                                       data-href="/home/Goods/goodsList/id/31/spec/2_18" data-key='2' data-val='18'>
                                        <input class="shaix_la" type="checkbox" style="display: none"/>
                                        <span>XS</span>
                                    </a>
                                </div>
                                <div class="surclofix p">
                                    <a href="javascript:;" class="u-confirm"
                                       onClick="submitMoreFilter('spec',this);">确定</a>
                                    <a href="javascript:;" class="u-cancel">取消</a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <a href="javascript:void(0)"><span class="dx_choice">多选</span><i
                                        class="litt-pluscr"></i></a>
                        </div>
                    </dd>
                </dl>
                <!-- 规格筛选 end -->
                <!-- 属性筛选 start -->
                <!-- 属性筛选 end -->
                <!-- 价格筛选 start -->
                <dl class="brand-section m-tr">
                    <dt>价格</dt>
                    <dd class="ri-section">
                        <div class="lf-list">
                            <div class="brand-list">
                                <div class="clearfix p">
                                    <a href="/home/Goods/goodsList/id/31/price/0-1700">
                                        <span>1700元以下</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/price/1700-3400">
                                        <span>1700-3400元</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/price/5100-6800">
                                        <span>5100-6800元</span>
                                    </a>
                                    <a href="/home/Goods/goodsList/id/31/price/6800-8500">
                                        <span>6800-8500元</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="lr-more">
                            <!--<a href="javascript:void(0)"><span class="dx_choice">多选</span><i class="litt-pluscr"></i></a>-->
                            <!--<a href="javascript:void(0)"><span class="gd_more">更多</span><i class="litt-tcr"></i></a>-->
                            <!--填写筛选价格区间-s-->
                            <form action="/Home/Goods/goodsList/id/31" method="post" id="price_form">
                                <input type="text" onpaste="this.value=this.value.replace(/[^\d]/g,'')"
                                       onkeyup="this.value=this.value.replace(/[^\d]/g,'')" name="start_price"
                                       id="start_price" value=""/>
                                <span>-</span>
                                <input type="text" onpaste="this.value=this.value.replace(/[^\d]/g,'')"
                                       onkeyup="this.value=this.value.replace(/[^\d]/g,'')" name="end_price"
                                       id="end_price" value=""/>
                                <input type="submit" value="确定"
                                       onClick="if($('#start_price').val() !='' && $('#end_price').val() !='' ) $('#price_form').submit();"/>
                            </form>
                            <!--填写筛选价格区间-e-->
                        </div>
                    </dd>
                </dl>
                <!-- 价格筛选 end -->
            </div>
            <p class="moreamore"><a>浏览更多</a></p>
        </div>
    </div>
    <!-- 筛选 end -->


    <div class="shop-list-tour ma-to-20 p">
        <div class="w1430">
            <div class="tjhot fl">
                <div class="sx_topb"><h3>推荐热卖</h3></div>
                <div class="tjhot-shoplist" id="ajax_hot_goods">
                    <div class="alone-shop">
                        <a href="/Home/Goods/goodsInfo/id/1.html"><img class="lazy"
                                                                       data-original="/public/upload/goods/thumb/1/goods_thumb_1_0_180_180.png"/></a>
                        <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/1.html">vivoX21 6GB+128GB 4G全网通 全面屏
                                拍照手机</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>2999.00</span></p>
                    </div>
                    <div class="alone-shop">
                        <a href="/Home/Goods/goodsInfo/id/6.html"><img class="lazy"
                                                                       data-original="/public/upload/goods/thumb/6/goods_thumb_6_0_180_180.png"/></a>
                        <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/6.html">沃隆 每日坚果 休闲零食 坚果炒货 扁桃仁腰果榛子核桃
                                成人款</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>139.00</span></p>
                    </div>
                    <div class="alone-shop">
                        <a href="/Home/Goods/goodsInfo/id/7.html"><img class="lazy"
                                                                       data-original="/public/upload/goods/thumb/7/goods_thumb_7_0_180_180.jpeg"/></a>
                        <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/7.html">哥弟女装2018春季新款口袋趣味图案贴标连帽针织长开衫A400065
                                连帽设计 实穿美观</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>480.00</span></p>
                    </div>
                    <div class="alone-shop">
                        <a href="/Home/Goods/goodsInfo/id/8.html"><img class="lazy"
                                                                       data-original="/public/upload/goods/thumb/8/goods_thumb_8_0_180_180.png"/></a>
                        <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/8.html">迪芙斯（D:FUSE）女鞋
                                牛皮革细跟露趾性感高跟鞋</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>179.00</span></p>
                    </div>
                    <div class="alone-shop">
                        <a href="/Home/Goods/goodsInfo/id/9.html"><img class="lazy"
                                                                       data-original="/public/upload/goods/thumb/9/goods_thumb_9_0_180_180.png"/></a>
                        <p class="line-two-hidd"><a href="/Home/Goods/goodsInfo/id/9.html">东方泥土 陶瓷艺术品招财摆件
                                客厅办公室/烈焰釉大貔貅D69-39 D69-39 大貔貅 烈焰釉</a></p>
                        <p class="price-tag"><span class="li_xfo">￥</span><span>1580.00</span></p>
                    </div>
                </div>
            </div>
            <div class="stsho fr">
                <div class="sx_topb ba-dark-bg">
                    <div class="f-sort fl">
                        <ul>
                            <li class="red">
                                <a href="/Home/Goods/goodsList/id/31">综合</a>
                            </li>
                            <li class="">
                                <a href="/Home/Goods/goodsList/id/31/sort/sales_sum">销量</a>
                            </li>
                            <li class="">
                                <a href="/Home/Goods/goodsList/id/31/sort/shop_price/sort_asc/desc">价格<i
                                            class="litt-zzx1"></i></a>
                            </li>
                            <li class="">
                                <a href="/Home/Goods/goodsList/id/31/sort/comment_count">评论</a>
                            </li>
                            <li class="">
                                <a href="/Home/Goods/goodsList/id/31/sort/is_new">新品</a>
                            </li>
                        </ul>
                    </div>
                    <div class="f-address fl">
                        <!--<div class="shd_address">-->
                        <!--<div class="shd">收货地：</div>-->
                        <!--<div class="add_cj_p"><input type="text" id="city" /></div>-->
                        <!--</div>-->
                    </div>
                    <div class="f-total fr">
                        <div class="all-sec">共<span>32</span>个商品</div>
                        <div class="all-fy">
                            <a>&lt;</a>
                            <p class="fy-y"><span class="z-cur">1</span>/<span>2</span></p>
                            <a>&gt;</a>
                        </div>
                    </div>
                </div>
                <div class="shop-list-splb p">
                    <ul>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/1.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/1/goods_thumb_1_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/1/goods_sub_thumb_1_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/1/goods_sub_thumb_2_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/1/goods_sub_thumb_3_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/1/goods_sub_thumb_4_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>2999.00</em></span>
                                    <span class="old"><em>￥</em><em>3198.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/1.html">
                                        vivoX21 6GB+128GB 4G全网通 全面屏 拍照手机 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_1" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(1);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(1);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(1,$('#number_'+1).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/13.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/13/goods_thumb_13_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/13/goods_sub_thumb_852_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/13/goods_sub_thumb_853_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>1699.00</em></span>
                                    <span class="old"><em>￥</em><em>1799.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/13.html">
                                        【套餐赠耳机】HUAWEI/华为 畅享8 Plus 全面屏手机 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_13" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(13);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(13);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(13,$('#number_'+13).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/16.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/16/goods_thumb_16_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/16/goods_sub_thumb_69_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/16/goods_sub_thumb_70_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/16/goods_sub_thumb_71_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/16/goods_sub_thumb_72_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>48.00</em></span>
                                    <span class="old"><em>￥</em><em>76.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/16.html">
                                        华为耳机原装手机 荣耀9/8/v9/p9/mate9/8/p10/v10/7x/6x 华为AM115（标准版） </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_16" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(16);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(16);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(16,$('#number_'+16).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/25.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/25/goods_thumb_25_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/25/goods_sub_thumb_854_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/25/goods_sub_thumb_855_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/25/goods_sub_thumb_856_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/25/goods_sub_thumb_857_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>1598.00</em></span>
                                    <span class="old"><em>￥</em><em>1698.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/25.html">
                                        直降200元◆vivo Y85全面屏手机 vivoy85手机 y75 y97官方旗舰店 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_25" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(25);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(25);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(25,$('#number_'+25).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/28.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/28/goods_thumb_28_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/28/goods_sub_thumb_117_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/28/goods_sub_thumb_118_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/28/goods_sub_thumb_119_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/28/goods_sub_thumb_120_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/28/goods_sub_thumb_121_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/28/goods_sub_thumb_122_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>1988.00</em></span>
                                    <span class="old"><em>￥</em><em>2599.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/28.html">
                                        Apple 苹果 iPhone 6 手机【移动合约购】老号码不换号 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_28" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(28);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(28);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(28,$('#number_'+28).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/30.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/30/goods_thumb_30_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/30/goods_sub_thumb_123_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>38.00</em></span>
                                    <span class="old"><em>￥</em><em>58.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/30.html">
                                        中国移动 移动流量卡4g全国通用无限流量卡设备卡手机纯上网卡 9.9元/月包5G全国★移动流量王 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_30" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(30);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(30);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(30,$('#number_'+30).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/34.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/34/goods_thumb_34_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/34/goods_sub_thumb_131_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/34/goods_sub_thumb_132_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/34/goods_sub_thumb_133_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/34/goods_sub_thumb_134_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/34/goods_sub_thumb_135_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/34/goods_sub_thumb_136_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>15.90</em></span>
                                    <span class="old"><em>￥</em><em>20.90</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/34.html">
                                        KOOLIFE 畅享6S手机壳 透明保护套/TPU全包外壳 硅胶防摔软壳 适用于华为 畅享 6S </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_34" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(34);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(34);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(34,$('#number_'+34).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/35.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/35/goods_thumb_35_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/35/goods_sub_thumb_137_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/35/goods_sub_thumb_138_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/35/goods_sub_thumb_139_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/35/goods_sub_thumb_140_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>3398.00</em></span>
                                    <span class="old"><em>￥</em><em>5099.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/35.html">
                                        GoPro HERO 6 Black 运动摄像机 4K60帧高清 语音控制 防抖防水 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_35" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(35);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(35);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(35,$('#number_'+35).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/39.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/39/goods_thumb_39_0_236_236.jpeg"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/39/goods_sub_thumb_154_236_236.jpeg"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>100.00</em></span>
                                    <span class="old"><em>￥</em><em>150.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/39.html">
                                        自动发货 steam 充值卡5美元钱包卡5美刀 5美金 统一通 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_39" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(39);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(39);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="/Home/Goods/goodsInfo/id/39.html">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/48.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/48/goods_thumb_48_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/48/goods_sub_thumb_189_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/48/goods_sub_thumb_190_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/48/goods_sub_thumb_191_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/48/goods_sub_thumb_192_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/48/goods_sub_thumb_193_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/48/goods_sub_thumb_194_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>1699.00</em></span>
                                    <span class="old"><em>￥</em><em>2588.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/48.html">
                                        国家地理（National Geographic） NG W5072 摄影包 单反相机包 双肩包 逍遥者系列 旅行多功能 时尚通勤 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_48" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(48);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(48);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(48,$('#number_'+48).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/49.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/49/goods_thumb_49_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/49/goods_sub_thumb_198_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/49/goods_sub_thumb_870_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/49/goods_sub_thumb_871_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>219.00</em></span>
                                    <span class="old"><em>￥</em><em>359.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/49.html">
                                        三星（SAMSUNG）存储卡128GB 读速100MB/s 写速90MB/s 4K Class10 高速TF卡（Micro SD卡）红色plus升级版 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_49" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(49);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(49);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(49,$('#number_'+49).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/52.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/52/goods_thumb_52_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/52/goods_sub_thumb_203_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/52/goods_sub_thumb_204_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/52/goods_sub_thumb_205_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/52/goods_sub_thumb_206_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>399.00</em></span>
                                    <span class="old"><em>￥</em><em>499.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/52.html">
                                        【官方旗舰店】广州电信光纤宽带新装100M 送不限流量手机卡流量卡 升级分享计划 100M 200元预存+199元一次性费用 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_52" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(52);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(52);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(52,$('#number_'+52).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/54.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/54/goods_thumb_54_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/54/goods_sub_thumb_209_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>9.90</em></span>
                                    <span class="old"><em>￥</em><em>17.90</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/54.html">
                                        【北京移动】7天芒果TV会员 1GB流量仅售9.9元 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_54" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(54);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(54);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="/Home/Goods/goodsInfo/id/54.html">查看详情</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/55.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/55/goods_thumb_55_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/55/goods_sub_thumb_213_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/55/goods_sub_thumb_872_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/55/goods_sub_thumb_873_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>58.00</em></span>
                                    <span class="old"><em>￥</em><em>198.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/55.html">
                                        中国移动198号段 免预存 198号码198手机卡移动198不限量流量卡上网卡电话卡 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_55" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(55);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(55);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(55,$('#number_'+55).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/59.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/59/goods_thumb_59_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/59/goods_sub_thumb_223_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/59/goods_sub_thumb_874_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/59/goods_sub_thumb_875_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/59/goods_sub_thumb_876_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/59/goods_sub_thumb_877_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>19.90</em></span>
                                    <span class="old"><em>￥</em><em>25.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/59.html">
                                        亿色（ESR）华为p10钢化膜 p10手机膜 非全屏覆盖高清透明防指纹玻璃贴膜 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_59" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(59);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(59);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(59,$('#number_'+59).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/62.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/62/goods_thumb_62_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/62/goods_sub_thumb_235_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/62/goods_sub_thumb_236_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/62/goods_sub_thumb_237_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/62/goods_sub_thumb_238_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/62/goods_sub_thumb_239_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>69.00</em></span>
                                    <span class="old"><em>￥</em><em>119.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/62.html">
                                        闪迪（SanDisk）A1 32GB 读速98MB/s 至尊高速移动MicroSDHC UHS-I存储卡 TF卡 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_62" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(62);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(62);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(62,$('#number_'+62).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/65.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/65/goods_thumb_65_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/65/goods_sub_thumb_248_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/65/goods_sub_thumb_249_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/65/goods_sub_thumb_250_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/65/goods_sub_thumb_251_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/65/goods_sub_thumb_252_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/65/goods_sub_thumb_253_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>399.00</em></span>
                                    <span class="old"><em>￥</em><em>499.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/65.html">
                                        绿联Type-C转HDMI/VGA转换器 USB-C扩展坞PD充电转接头数据线 苹果MacBook华为Mate10Pro拓展坞集线器40873 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_65" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(65);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(65);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(65,$('#number_'+65).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/69.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/69/goods_thumb_69_0_236_236.jpeg"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/69/goods_sub_thumb_264_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/69/goods_sub_thumb_265_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/69/goods_sub_thumb_266_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/69/goods_sub_thumb_267_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/69/goods_sub_thumb_609_236_236.jpeg"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>99.00</em></span>
                                    <span class="old"><em>￥</em><em>169.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/69.html">
                                        罗马仕（ROMOSS）HO20锂聚合物 移动电源/充电宝 太阳神 20000毫安LED数显屏 白色 苹果/安卓双输入 手机/平板通用 </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_69" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(69);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(69);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(69,$('#number_'+69).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/70.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/70/goods_thumb_70_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/70/goods_sub_thumb_270_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/70/goods_sub_thumb_271_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/70/goods_sub_thumb_272_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/70/goods_sub_thumb_273_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/70/goods_sub_thumb_274_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/70/goods_sub_thumb_275_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>5789.00</em></span>
                                    <span class="old"><em>￥</em><em>6699.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/70.html">
                                        索尼（SONY）黑卡DSC-RX100M5? 1英寸大底数码相机/卡片机 蔡司镜头（WIFI/NFC 4K视频 RX100V/黑卡5） </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_70" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(70);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(70);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(70,$('#number_'+70).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="s_xsall">
                                <div class="xs_img">
                                    <a href="/Home/Goods/goodsInfo/id/71.html">
                                        <img class="lazy-list"
                                             data-original="/public/upload/goods/thumb/71/goods_thumb_71_0_236_236.png"/>
                                    </a>
                                </div>
                                <div class="xs_slide">
                                    <div class="small-xs-shop">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/71/goods_sub_thumb_276_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/71/goods_sub_thumb_277_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/71/goods_sub_thumb_278_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/71/goods_sub_thumb_279_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/71/goods_sub_thumb_280_236_236.png"/>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <img class="lazy-list"
                                                         data-original="/public/upload/goods/thumb/71/goods_sub_thumb_281_236_236.png"/>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-tag">
                                    <span class="now"><em class="li_xfo">￥</em><em>8498.00</em></span>
                                    <span class="old"><em>￥</em><em>9988.00</em></span>
                                </div>
                                <div class="shop_name2">
                                    <a href="/Home/Goods/goodsInfo/id/71.html">
                                        佳能（Canon）EOS 80D 单反套机（EF-S 18-200mm f/3.5-5.6 IS） 2420万有效像素 45点十字对焦
                                        WIFI/NFC </a>
                                </div>
                                <div class="J_btn_statu">
                                    <div class="p-num">
                                        <input class="J_input_val" id="number_71" type="text" value="1">
                                        <p class="act">
                                            <a href="javascript:void(0);" onClick="goods_add(71);"
                                               class="litt-zzyl1"></a>
                                            <a href="javascript:void(0);" onClick="goods_cut(71);"
                                               class="litt-zzyl2"></a>
                                        </p>
                                    </div>
                                    <div class="p-btn">
                                        <a href="javascript:void(0);" onclick="AjaxAddCart(71,$('#number_'+71).val());">加入购物车</a>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>
                <div class="page p">
                    <div class='dataTables_paginate paging_simple_numbers'>
                        <ul class='pagination'>
                            <li class="paginate_button active"><a tabindex="0" data-dt-idx="1" aria-controls="example1"
                                                                  href="#">1</a></li>
                            <li class="paginate_button"><a class="num" href="/home/Goods/goodsList/id/31/p/2.html">2</a>
                            </li>
                            <li id="example1_next" class="paginate_button next"><a class="next"
                                                                                   href="/home/Goods/goodsList/id/31/p/2.html">下一页</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="underheader-floor p specilike">
        <div class="w1430">
            <div class="layout-title">
                <span class="fl">猜你喜欢</span>
                <span class="update_h fr" onclick="favourite();">
                <i class="litt-hyh"></i>
                换一换
            </span>
            </div>
            <ul class="ul-li-column p" id="favourite_goods"></ul>
        </div>
    </div>
    <script>
        /****猜你喜欢****/
        var favorite_page = 0;

        function favourite() {
            favorite_page++;
            $.ajax({
                type: "GET",
                url: "/index.php?m=Home&c=Index&a=ajax_favorite&i=7&p=" + favorite_page,//+tab,
                success: function (data) {
                    if (data == '' && favorite_page > 1) {
                        favorite_page = 0;
                        favourite();
                    } else {
                        //先注释掉
                        // $('#favourite_goods').html(data);
                        lazy_ajax();
                    }

                }
            });
        }
    </script>
    <!--footer-s-->
    @include('pc.public.footer')

    <style>
        .mod_copyright {
            border-top: 1px solid #EEEEEE;
        }

        .grid-top {
            margin-top: 20px;
            text-align: center;
        }

        .grid-top span {
            margin: 0 10px;
            color: #ccc;
        }

        .mod_copyright > p {
            margin-top: 10px;
            color: #666;
            text-align: center;
        }

        .mod_copyright_auth_ico {
            overflow: hidden;
            display: inline-block;
            margin: 0 3px;
            width: 103px;
            height: 32px;
            background-image: url(/template/pc/rainbow/static/images/ico_footer.png);
            line-height: 1000px;
        }

        .mod_copyright_auth_ico_1 {
            background-position: 0 -151px;
        }

        .mod_copyright_auth_ico_2 {
            background-position: -104px -151px;
        }

        .mod_copyright_auth_ico_3 {
            background-position: 0 -184px;
        }

        .mod_copyright_auth_ico_4 {
            background-position: -104px -184px;
        }

        .mod_copyright_auth_ico_5 {
            background-position: 0 -217px;
        }
    </style>
    <script>
        // 延时加载二维码图片
        jQuery(function ($) {
            $('img[img-url]').each(function () {
                var _this = $(this),
                    url = _this.attr('img-url');
                _this.attr('src', url);
            });
        });
    </script>
    <div class="soubao-sidebar">
        <div class="soubao-sidebar-bg"></div>
        <div class="sidertabs tab-lis-1">
            <div class="sider-top-stra sider-midd-1">
                <div class="icon-tabe-chan">
                    <a href="/Home/User/index.html">
                        <i class="share-side share-side1"></i>
                        <i class="share-side tab-icon-tip triangleshow"></i>
                    </a>

                    <div class="dl_login">
                        <div class="hinihdk">
                            <img src="/template/pc/rainbow/static/images/dl.png"/>

                            <p class="loginafter nologin"><span>你好，请先</span><a href="/Home/user/login.html">登录！</a></p>
                            <!--未登录-e--->
                            <!--登录后-s--->
                            <p class="loginafter islogin">
                                <span class="id_jq userinfo">陈xxxxxxx</span>
                                <span>&nbsp;&nbsp;&nbsp;&nbsp;</span><a href="/Home/user/logout.html"
                                                                        title="点击退出">退出！</a>
                            </p>
                            <!--未登录-s--->
                        </div>
                    </div>
                </div>
                <div class="icon-tabe-chan shop-car">
                    <a href="javascript:void(0);" onclick="ajax_side_cart_list()">
                        <div class="tab-cart-tip-warp-box">
                            <div class="tab-cart-tip-warp">
                                <i class="share-side share-side1"></i>
                                <i class="share-side tab-icon-tip"></i>
                                <span class="tab-cart-tip">购物车</span>
                                <span class="tab-cart-num J_cart_total_num" id="tab_cart_num">0</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="icon-tabe-chan massage">
                    <a href="/Home/User/message_notice.html" target="_blank">
                        <i class="share-side share-side1"></i>
                        <!--<i class="share-side tab-icon-tip"></i>-->
                        <span class="tab-tip">消息</span>
                    </a>
                </div>
            </div>
            <div class="sider-top-stra sider-midd-2">
                <div class="icon-tabe-chan mmm">
                    <a href="/Home/User/goods_collect.html" target="_blank">
                        <i class="share-side share-side1"></i>
                        <!--<i class="share-side tab-icon-tip"></i>-->
                        <span class="tab-tip">收藏</span>
                    </a>
                </div>
                <div class="icon-tabe-chan hostry">
                    <a href="/Home/User/visit_log.html" target="_blank">
                        <i class="share-side share-side1"></i>
                        <!--<i class="share-side tab-icon-tip"></i>-->
                        <span class="tab-tip">足迹</span>
                    </a>
                </div>
                <!--<div class="icon-tabe-chan sign">-->
                <!--<a href="" target="_blank">-->
                <!--<i class="share-side share-side1"></i>-->
                <!--&lt;!&ndash;<i class="share-side tab-icon-tip"></i>&ndash;&gt;-->
                <!--<span class="tab-tip">签到</span>-->
                <!--</a>-->
                <!--</div>-->
            </div>
        </div>
        <div class="sidertabs tab-lis-2">
            <div class="icon-tabe-chan advice">
                <a title="点击这里给我发消息" href="tencent://message/?uin=123456789&amp;Site=TPshop商城&amp;Menu=yes"
                   target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">在线咨询</span>
                </a>
            </div>
            <!--<div class="icon-tabe-chan request">-->
            <!--<a href="" target="_blank">-->
            <!--<i class="share-side share-side1"></i>-->
            <!--&lt;!&ndash;<i class="share-side tab-icon-tip"></i>&ndash;&gt;-->
            <!--<span class="tab-tip">意见反馈</span>-->
            <!--</a>-->
            <!--</div>-->
            <div class="icon-tabe-chan qrcode">
                <a href="" target="_blank">
                    <i class="share-side share-side1"></i>
                    <i class="share-side tab-icon-tip triangleshow"></i>
                    <span class="tab-tip qrewm">
                    <img img-url="/index.php?m=Home&c=Index&a=qr_code&data=http://www.tpshop.test:8080/Mobile/index/app_down.html&head_pic=http://www.tpshop.test:8080//public/static/images/logo/pc_home_logo_default.png&back_img="/>
                    扫一扫下载APP
                </span>
                </a>
            </div>
            <div class="icon-tabe-chan comebacktop">
                <a href="" target="_blank">
                    <i class="share-side share-side1"></i>
                    <!--<i class="share-side tab-icon-tip"></i>-->
                    <span class="tab-tip">返回顶部</span>
                </a>
            </div>
        </div>
        <div class="shop-car-sider">

        </div>
    </div>
    <script src="/template/pc/rainbow/static/js/common.js"></script>
    <!--footer-e-->
    <script src="/template/pc/rainbow/static/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/pc/rainbow/static/js/popt.js" type="text/javascript" charset="utf-8"></script>
    <script src="/template/pc/rainbow/static/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">

        //        更多
        $('.gd_more').parent().click(function () {
            var jed = $(this).parents('.lr-more').siblings();
            jed.toggleClass('ov-inh').find('.brand-box').toggleClass('ov-inh');
            if (jed.toggleClass('ov-inh').find('.brand-list')) {
                jed.toggleClass('ov-inh').find('.brand-list').toggleClass('ov-inh');
            }
            if (jed.hasClass('ov-inh')) {
                $(this).find('.gd_more').html('收起');
            } else {
                $(this).find('.gd_more').html('更多');
            }
        })
        var cancelBtn = null;
        /***多选 start*****/
        $('.dx_choice').parent().click(function () {
            var _this = this;
            var st = 0;
            var jed = $(_this).parents('.ri-section'); //当前选项层DIV

            //关闭前一个多选框
            if (cancelBtn != null) {
                $(cancelBtn).parent().siblings('.clearfix').find('a').each(function (i, o) {
                    $(o).removeClass('addhover-js').find('.litt-zd').hide(); //针对品牌筛选的红色边框和右下角对勾隐藏
                    $(o).removeClass('red_hov_cli')    //针对纯文字型选项，隐藏筛选的选中状态
                        .attr('href', $(o).data('href'))  //还原连接
                        .children('input').prop('checked', false).hide(); //隐藏多选框
                    $(o).unbind('click');
                });
                $(cancelBtn).parents('.lf-list').siblings('.lr-more').show(); //显示其它多选按钮
                $(cancelBtn).parents('.ri-section').removeClass('sum_ov_inh'); //移除多选样式

            }
            cancelBtn = jed.find('.u-cancel'); //前一个取消按钮

            //打开多选
            jed.addClass('sum_ov_inh'); //添加这一行的样式
            //遍历a标签
            jed.find('.clearfix>a').each(function (i, o) {
                $(o).attr('href', 'javascript:;'); //移除连接
                $(o).children('input').show();  //显示多选框
                $(o).bind('click', function () {
                    if ($(o).hasClass('red_hov_cli')) {
                        //取消选中
                        $(o).find('i').toggle()
                        $(o).removeClass('addhover-js'); //针对品牌选项，改变筛选的选中状态
                        $(o).removeClass('red_hov_cli')
                        $(o).children('input').prop("checked", false);
                        $(o).parent().siblings('.surclofix').children('.u-confirm').removeClass('u-confirm01');
                        st--;
                    } else {
                        $(o).addClass('red_hov_cli')
                        $(o).children('input').prop("checked", true);
                        $(o).find('i').toggle()
                        $(o).addClass('addhover-js');
                        $(o).parent().siblings('.surclofix').children('.u-confirm').addClass('u-confirm01');
                        st++;
                    }
                    //如果没有选中项,确定按钮点不了
                    if (st == 0) {
                        jed.find('.u-confirm').disabled = true;
                    }
                });
            });
            //隐藏当前多选按钮
            $(_this).parent().hide();
        });

        /***多选 end*****/
        //############   取消多选        ###########
        $('.surclofix .u-cancel').each(function () {
            $(this).click(function () {
                var jed = $(this).parents('.ri-section');
                //遍历a标签
                jed.find('.clearfix>a').each(function (i, o) {
                    $(o).removeClass('addhover-js').find('.litt-zd').hide(); //针对品牌筛选的红色边框和右下角对勾隐藏
                    $(o).removeClass('red_hov_cli')    //针对纯文字型选项，隐藏筛选的选中状态
                        .attr('href', $(o).data('href'))  //还原连接
                        .children('input').prop('checked', false).hide(); //隐藏多选框
                    $(o).unbind('click');
                });
                jed.find('.lr-more').show(); //显示多选按钮
                jed.removeClass('sum_ov_inh') //移除这一行的样式
                $('.u-confirm').removeClass('u-confirm01'); //移除确定按钮可点击标识
            });
        })

        $(function () {
            favourite();
            //左侧边栏JS
//		ajax_hot_goods();
//		ajax_sales_goods();
            //############   更多类别属性筛选  start     ###########
            $('.moreamore').click(function () {
                $('.m-tr').each(function (i, o) {
                    if (i > 7) {
                        var attrdisplay = $(o).css('display');
                        if (attrdisplay == 'none') {
                            $(o).css('display', 'block');
                        }
                        if (attrdisplay == 'block') {
                            $(o).css('display', 'none');
                        }
                    }
                });
                if ($(this).hasClass('checked')) {
                    $(this).removeClass('checked').html('<a class="red">收起</a>');
                } else {
                    $(this).addClass('checked').html('<a >更多选项</a>');
                }
            })
            $('.moreamore').trigger('click').html('<a >更多选项</a>'); //  默认点击一下
            //############   更多类别属性筛选   end    ###########

            /***价格排序 start*****/
            var price_i = 0;
            $('.f-sort ul li').click(function () {
                $(this).addClass('red').siblings().removeClass('red').find('i').removeClass('litt-zzx2').removeClass('litt-zzx3').addClass('litt-zzx1');
                var jd = $(this).find('i');
                price_i++;
                if (price_i > 2) price_i = 1;
                switch (price_i) {
                    case 1:
                        jd.addClass('litt-zzx2').removeClass('litt-zzx1').removeClass('litt-zzx3');
                        break;
                    case 2:
                        jd.addClass('litt-zzx3').removeClass('litt-zzx2').removeClass('litt-zzx1');
                        break;
                }
            })
            /***价格排序 end*******/
            /***地址选择 start*****/
            $("#city").click(function (e) {
                SelCity(this, e);
            });
            /***地址选择 end*****/
            /***是否自营 start****/
            $('.choice-mo-shop ul li').click(function () {
                $(this).find('.litt-zzdg1').toggleClass('litt-zzdg2');
                $(this).find('a').toggleClass('red');
            })
            /***是否自营 end****/
            /***滑过浏览商品 start***/
            $('.small-xs-shop ul li').hover(function () {
                $(this).addClass('bored').siblings().removeClass('bored');
                var small_src = $(this).find('img').attr('src');
                $(this).parents('.s_xsall').find('.xs_img').find('img').attr('src', small_src);
            }, function () {

            })
            /***滑过浏览商品 end***/
        })

        /****加减购物车数额***/
        function goods_cut($val) {
            var num_val = document.getElementById('number_' + $val);
            var new_num = num_val.value;
            var Num = parseInt(new_num);
            if (Num > 1) Num = Num - 1;
            num_val.value = Num;
        }

        function goods_add($val) {
            var num_val = document.getElementById('number_' + $val);
            var new_num = num_val.value;
            var Num = parseInt(new_num);
            Num = Num + 1;
            num_val.value = Num;
        }

        /****加减购物车数额***/

        //############   点击多选确定按钮      ############
// t 为类型  是品牌 还是 规格 还是 属性
// btn 是点击的确定按钮用于找位置
        get_parment = {"id": "31"};

        function submitMoreFilter(t, btn) {
            // 没有被勾选的时候
            if (!$(btn).hasClass("u-confirm01")) {
                return false;
            }

            // 获取现有的get参数
            var key = ''; // 请求的 参数名称
            var val = new Array(); // 请求的参数值
            $(btn).parent().siblings(".clearfix").find(".red_hov_cli").each(function (i, o) {
                key = $(o).data('key');
                val.push($(o).data('val'));
            });
            //parment = key+'_'+val.join('_');
//        return false;
            // 品牌
            if (t == 'brand') {
                get_parment.brand_id = val.join('_');
            }
            // 规格
            if (t == 'spec') {
                if (get_parment.hasOwnProperty('spec')) {
                    get_parment.spec += '@' + key + '_' + val.join('_');
                }
                else {
                    get_parment.spec = key + '_' + val.join('_');
                }
            }
            // 属性
            if (t == 'attr') {
                if (get_parment.hasOwnProperty('attr')) {
                    get_parment.attr += '@' + key + '_' + val.join('_');
                }
                else {
                    get_parment.attr = key + '_' + val.join('_');
                }
            }
            // 组装请求的url
            var url = '';
            for (var k in get_parment) {
                url += "&" + k + '=' + get_parment[k];
            }
            location.href = "/index.php?m=Home&c=Goods&a=goodsList" + url;
        }

        //媒体查询
        /*$(function(){
            window.onresize=resizeauto;
            resizeauto();
            function resizeauto(){
                var windowW = $(window).width();
                if(windowW > 1447){
                    $('.w1430,.w1224,.w1000').addClass('w1430').removeClass('w1224').removeClass('w1000');
                }else if(windowW <= 1447 && windowW > 1241){
                    $('.w1430,.w1224,.w1000').addClass('w1224').removeClass('w1430').removeClass('w1000');
                }else if(windowW <= 1241){
                    $('.w1430,.w1224,.w1000').addClass('w1000').removeClass('w1224').removeClass('w1430');
                }
            }
        })*/
    </script>
    </body>
@endsection