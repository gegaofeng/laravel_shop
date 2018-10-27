<div class="top-hander">
    <div class="w1224 pr clearfix">
        <div class="fl">
            <link rel="stylesheet" href="css/pc/location.css" type="text/css"><!-- 收货地址，物流运费 -->
            <div class="sendaddress pr fl">
                <span>送货至：</span>
                <!-- <span>深圳<i class="share-a_a1"></i></span>-->
                <span>
                    <ul class="list1">
                                  <li class="summary-stock though-line">
                                      <div class="dd" style="border-right:0px;width:200px;">
                                          <div class="store-selector add_cj_p">
                                              <div class="text"><div></div><b></b></div>
                                              <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </span>
            </div>
            <script src="js/public/locationJson.js"></script>
            <script src="js/pc/location.js"></script>
            <script>doInitRegion();</script>
            <div class="fl nologin">
                <a class="red" href="/Home/user/login.html">登录</a>
                <a href="/Home/user/reg.html">注册</a>
            </div>
            <div class="fl islogin hide">
                <a class="red userinfo" href="/Home/user/index.html"></a>
                <a href="/Home/user/logout.html" title="退出" target="_self">安全退出</a>
            </div>
        </div>
        <ul class="top-ri-header fr clearfix">
            <li><a target="_blank" href="/Home/Order/order_list.html">我的订单</a></li>
            <li class="spacer"></li>
            <li><a target="_blank" href="/Home/User/visit_log.html">我的浏览</a></li>
            <li class="spacer"></li>
            <li><a target="_blank" href="/Home/User/goods_collect.html">我的收藏</a></li>
            <li class="spacer"></li>
            <li><a target="_blank" href="http://help.tp-shop.cn/Index/Help/channel/cat_id/5.html">帮助中心</a></li>
            <li class="spacer"></li>
            <li class="hover-ba-navdh">
                <div class="nav-dh">
                    <span>网站导航</span>
                    <i class="share-a_a1"></i>
                </div>
                <ul class="conta-hv-nav clearfix">
                    <li>
                        <a href="/Home/Activity/promoteList.html">优惠活动</a>
                    </li>
                    <li>
                        <a href="/Home/Activity/pre_sell_list.html">预售活动</a>
                    </li>
                    <li>
                        <a href="/Home/Goods/integralMall.html">拍卖活动</a>
                    </li>
                    <li>
                        <a href="/Home/Goods/integralMall.html">兑换中心</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="nav-middan-z w1224 clearfix">
    <a class="ecsc-logo" href="/Home/index/index.html">
        <img src="upload/logo/2018/04-09/814d7e9a0eddcf3754f2e8373a50a19c.png"
             style="width: 159px;height: 58px;">
    </a>
    <div class="ecsc-search">
        <form id="searchForm" name="" method="get" action="/Home/Goods/search.html" class="ecsc-search-form">
            <input autocomplete="off" name="q" id="q" type="text" value="" class="ecsc-search-input"
                   placeholder="请输入搜索关键字...">
            <button type="submit" class="ecsc-search-button"> 搜索</button>
            <div class="candidate p">
                <ul id="search_list"></ul>
            </div>
            <script type="text/javascript">
                ;(function ($) {
                    $.fn.extend({
                        donetyping: function (callback, timeout) {
                            timeout = timeout || 1e3;
                            var timeoutReference,
                                doneTyping = function (el) {
                                    if (!timeoutReference)
                                        return;
                                    timeoutReference = null;
                                    callback.call(el);
                                };
                            return this.each(function (i, el) {
                                    var $el = $(el);
                                    $el.is(':input') && $el.on('keyup keypress', function (e) {
                                            if (e.type == 'keyup' && e.keyCode != 8)
                                                return;
                                            if (timeoutReference)
                                                clearTimeout(timeoutReference);
                                            timeoutReference = setTimeout(function () {
                                                    doneTyping(el);
                                                }, timeout
                                            );
                                        }
                                    ).on('blur', function () {
                                            doneTyping(el);
                                        }
                                    );
                                }
                            );
                        }
                    });
                })(jQuery
                );
                $('.ecsc-search-input').donetyping(function () {
                        search_key();
                    }, 500
                ).focus(function () {
                        var search_key = $.trim($('#q').val());
                        if (search_key != '') {
                            $('.candidate').show();
                        }
                    }
                );
                $('.candidate').mouseleave(function () {
                        $(this).hide();
                    }
                );

                function searchWord(words) {
                    $('#q').val(words);
                    $('#searchForm').submit();
                }

                function search_key() {
                    let search_key = $.trim($('#q').val());
                    if (search_key != '') {
                        $.ajax({
                            type: 'post',
                            dataType: 'json',
                            data: {
                                key:
                                search_key
                            },
                            url: "/Home/Api/searchKey.html",
                            success: function (data) {
                                if (data.status == 1) {
                                    let html = '';
                                    $.each(data.result, function (n, value) {
                                            html += '<li onclick="searchWord(\'' + value.keywords + '\');"><div class="search-item">' + value.keywords + '</div><div class="search-count">约' + value.goods_num + '个商品</div></li>';
                                        }
                                    );
                                    html += '<li class="close"><div class="search-count">关闭</div></li>';
                                    $('#search_list').empty().append(html);
                                    $('.candidate').show();
                                } else {
                                    $('#search_list').empty();
                                }
                            }
                        });
                    }
                }
            </script>
        </form>
        <div class="keyword clearfix">
            <a class="key-item" href="/Home/Goods/search/q/%E6%89%8B%E6%9C%BA.html" target="_blank"> 手机</a>
            <a class="key-item" href="/Home/Goods/search/q/%E5%B0%8F%E7%B1%B3.html" target="_blank"> 小米</a>
            <a class="key-item" href="/Home/Goods/search/q/iphone.html" target="_blank"> iphone</a>
            <a class="key-item" href="/Home/Goods/search/q/%E4%B8%89%E6%98%9F.html" target="_blank"> 三星</a>
            <a class="key-item" href="/Home/Goods/search/q/%E5%8D%8E%E4%B8%BA.html" target="_blank"> 华为</a>
            <a class="key-item" href="/Home/Goods/search/q/%E5%86%B0%E7%AE%B1.html" target="_blank"> 冰箱</a>
        </div>
    </div>
    <div class="u-g-cart fr" id="hd-my-cart">
        <a href="/Home/Cart/index.html">
            <div class="c-n fl">
                <i class="share-shopcar-index"></i>
                <span> 我的购物车</span>
                <em class="shop-nums" id="cart_quantity"> 0</em>
            </div>
        </a>
        <div class="u-fn-cart" id="show_minicart">
            <div class="minicartContent" id="minicart">
            </div>
        </div>
    </div>
</div>
<div class="nav w1224 clearfix">
    <div class="categorys home_categorys">
        <div class="dt">
            <a href="" target="_blank"><i class="share-a_a2"></i> 全部商品分类</a>
        </div>
        <!--全部商品分类-s-->
        <div class="dd" style="display: block;">
            <div class="cata-nav" id="cata-nav">
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-0"></i>
                                <a href="/Home/Goods/goodsList/id/31.html" title="手机"> 手机数码</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>
                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/32.html" target="_blank"> 手机通讯</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/62.html" target="_blank"> 手机</a>
                                        <a href="/Home/Goods/goodsList/id/63.html" target="_blank"> 老人手机</a>
                                        <a href="/Home/Goods/goodsList/id/64.html" target="_blank"> 游戏手机</a>
                                        <a href="/Home/Goods/goodsList/id/65.html" target="_blank"> 对讲机</a>
                                        <a href="/Home/Goods/goodsList/id/66.html" target="_blank"> 以旧换新</a>
                                        <a href="/Home/Goods/goodsList/id/67.html" target="_blank"> 手机维修</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/33.html" target="_blank"> 运营商</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/68.html" target="_blank"> 合约机</a>
                                        <a href="/Home/Goods/goodsList/id/69.html" target="_blank"> 选号码</a>
                                        <a href="/Home/Goods/goodsList/id/70.html" target="_blank"> 固定宽带</a>
                                        <a href="/Home/Goods/goodsList/id/71.html" target="_blank"> 办套餐</a>
                                        <a href="/Home/Goods/goodsList/id/72.html" target="_blank"> 充话费 / 流量</a>
                                        <a href="/Home/Goods/goodsList/id/73.html" target="_blank"> 中国移动</a>
                                        <a href="/Home/Goods/goodsList/id/74.html" target="_blank"> 中国联通</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/34.html" target="_blank"> 手机配件</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/75.html" target="_blank"> 手机壳</a>
                                        <a href="/Home/Goods/goodsList/id/76.html" target="_blank"> 贴膜</a>
                                        <a href="/Home/Goods/goodsList/id/77.html" target="_blank"> 手机储存卡</a>
                                        <a href="/Home/Goods/goodsList/id/78.html" target="_blank"> 数据线</a>
                                        <a href="/Home/Goods/goodsList/id/79.html" target="_blank"> 充电宝</a>
                                        <a href="/Home/Goods/goodsList/id/80.html" target="_blank"> 手机耳机</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/35.html" target="_blank"> 摄影摄像</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/81.html" target="_blank"> 数码相机</a>
                                        <a href="/Home/Goods/goodsList/id/82.html" target="_blank"> 单反相机</a>
                                        <a href="/Home/Goods/goodsList/id/84.html" target="_blank"> 运动相机</a>
                                        <a href="/Home/Goods/goodsList/id/85.html" target="_blank"> 摄像头</a>
                                        <a href="/Home/Goods/goodsList/id/88.html" target="_blank"> 户外器材</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/36.html" target="_blank"> 数码配件</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/160.html" target="_blank"> 三角架 / 云台</a>
                                        <a href="/Home/Goods/goodsList/id/161.html" target="_blank"> 滤器</a>
                                        <a href="/Home/Goods/goodsList/id/162.html" target="_blank"> 闪光灯 / 手柄</a>
                                        <a href="/Home/Goods/goodsList/id/163.html" target="_blank"> 相机清洁</a>
                                        <a href="/Home/Goods/goodsList/id/164.html" target="_blank"> 机身附件</a>
                                        <a href="/Home/Goods/goodsList/id/165.html" target="_blank"> 读卡器</a>
                                        <a href="/Home/Goods/goodsList/id/166.html" target="_blank"> 支架</a>
                                        <a href="/Home/Goods/goodsList/id/167.html" target="_blank"> 电池 / 充电器</a>
                                        <a href="/Home/Goods/goodsList/id/89.html" target="_blank"> 相机包</a>
                                        <a href="/Home/Goods/goodsList/id/90.html" target="_blank"> 储存卡</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/168.html" target="_blank"> 影音娱乐</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/169.html" target="_blank"> 耳机 / 耳麦</a>
                                        <a href="/Home/Goods/goodsList/id/170.html" target="_blank"> 音箱 / 音响</a>
                                        <a href="/Home/Goods/goodsList/id/171.html" target="_blank"> 智能音箱</a>
                                        <a href="/Home/Goods/goodsList/id/172.html" target="_blank"> 无线音箱</a>
                                        <a href="/Home/Goods/goodsList/id/173.html" target="_blank"> 收音机</a>
                                        <a href="/Home/Goods/goodsList/id/174.html" target="_blank"> 麦克风</a>
                                        <a href="/Home/Goods/goodsList/id/175.html" target="_blank"> MP3 / MP4</a>
                                        <a href="/Home/Goods/goodsList/id/176.html" target="_blank"> 专业音频</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/177.html" target="_blank"> 电子教育</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/178.html" target="_blank"> 学生平板</a>
                                        <a href="/Home/Goods/goodsList/id/179.html" target="_blank"> 点读机</a>
                                        <a href="/Home/Goods/goodsList/id/180.html" target="_blank"> 录音笔</a>
                                        <a href="/Home/Goods/goodsList/id/181.html" target="_blank"> 电子词典</a>
                                        <a href="/Home/Goods/goodsList/id/182.html" target="_blank"> 复读机</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/4335611d9ab78af07e93ff2a31d2c895.jpg" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/382052a07ca4795bf95f8067b88991b0.png" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/964733352359d70a5f43b814e2679ea2.png" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/06fd5a2896edeee49120f8717d642ee1.png" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/e8f1892d1a21c64318c53635a7225e66.png" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-1"></i>
                                <a href="/Home/Goods/goodsList/id/12.html" title="服饰"> 服装服饰</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title">
                                <a class="layer-title-item" href="/Home/Goods/goodsList/id/14.html"> 新品推荐<i
                                            class="ico ico-arrow-right">&gt;</i></a>
                            </div>
                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/13.html" target="_blank"> 女装</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/183.html" target="_blank"> 半身裙</a>
                                        <a href="/Home/Goods/goodsList/id/184.html" target="_blank"> 短裤</a>
                                        <a href="/Home/Goods/goodsList/id/185.html" target="_blank"> 旗袍</a>
                                        <a href="/Home/Goods/goodsList/id/186.html" target="_blank"> 休闲裤</a>
                                        <a href="/Home/Goods/goodsList/id/187.html" target="_blank"> 牛仔裤</a>
                                        <a href="/Home/Goods/goodsList/id/188.html" target="_blank"> 中老年女装</a>
                                        <a href="/Home/Goods/goodsList/id/189.html" target="_blank"> 小西装</a>
                                        <a href="/Home/Goods/goodsList/id/190.html" target="_blank"> 打底衫</a>
                                        <a href="/Home/Goods/goodsList/id/191.html" target="_blank"> 打底裤</a>
                                        <a href="/Home/Goods/goodsList/id/192.html" target="_blank"> 马甲</a>
                                        <a href="/Home/Goods/goodsList/id/193.html" target="_blank"> 礼服</a>
                                        <a href="/Home/Goods/goodsList/id/194.html" target="_blank"> 婚纱</a>
                                        <a href="/Home/Goods/goodsList/id/195.html" target="_blank"> 吊带 / 背心</a>
                                        <a href="/Home/Goods/goodsList/id/196.html" target="_blank"> 毛尼大衣</a>
                                        <a href="/Home/Goods/goodsList/id/197.html" target="_blank"> 羽绒服</a>
                                        <a href="/Home/Goods/goodsList/id/14.html" target="_blank"> 新品推荐</a>
                                        <a href="/Home/Goods/goodsList/id/15.html" target="_blank"> 连衣裙</a>
                                        <a href="/Home/Goods/goodsList/id/16.html" target="_blank"> T恤</a>
                                        <a href="/Home/Goods/goodsList/id/17.html" target="_blank"> 衬衫</a>
                                        <a href="/Home/Goods/goodsList/id/18.html" target="_blank"> 雪纺衫</a>
                                        <a href="/Home/Goods/goodsList/id/19.html" target="_blank"> 短外套</a>
                                        <a href="/Home/Goods/goodsList/id/20.html" target="_blank"> 卫衣</a>
                                        <a href="/Home/Goods/goodsList/id/21.html" target="_blank"> 针秀衫</a>
                                        <a href="/Home/Goods/goodsList/id/22.html" target="_blank"> 风衣</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/23.html" target="_blank"> 男装</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/24.html" target="_blank"> 当季热卖</a>
                                        <a href="/Home/Goods/goodsList/id/25.html" target="_blank"> 新品推荐</a>
                                        <a href="/Home/Goods/goodsList/id/215.html" target="_blank"> 工装</a>
                                        <a href="/Home/Goods/goodsList/id/198.html" target="_blank"> T恤</a>
                                        <a href="/Home/Goods/goodsList/id/199.html" target="_blank"> 牛仔裤</a>
                                        <a href="/Home/Goods/goodsList/id/200.html" target="_blank"> 休闲裤</a>
                                        <a href="/Home/Goods/goodsList/id/201.html" target="_blank"> 衬衫</a>
                                        <a href="/Home/Goods/goodsList/id/202.html" target="_blank"> 短裤</a>
                                        <a href="/Home/Goods/goodsList/id/203.html" target="_blank"> 羽绒服</a>
                                        <a href="/Home/Goods/goodsList/id/204.html" target="_blank"> 棉服</a>
                                        <a href="/Home/Goods/goodsList/id/205.html" target="_blank"> 夹克</a>
                                        <a href="/Home/Goods/goodsList/id/206.html" target="_blank"> 卫衣</a>
                                        <a href="/Home/Goods/goodsList/id/207.html" target="_blank"> 毛尼大衣</a>
                                        <a href="/Home/Goods/goodsList/id/208.html" target="_blank"> 西服套装</a>
                                        <a href="/Home/Goods/goodsList/id/209.html" target="_blank"> 风衣</a>
                                        <a href="/Home/Goods/goodsList/id/210.html" target="_blank"> 马甲 / 背心</a>
                                        <a href="/Home/Goods/goodsList/id/211.html" target="_blank"> 西服</a>
                                        <a href="/Home/Goods/goodsList/id/212.html" target="_blank"> 西裤</a>
                                        <a href="/Home/Goods/goodsList/id/216.html" target="_blank"> 羊毛衫</a>
                                        <a href="/Home/Goods/goodsList/id/213.html" target="_blank"> 中老男装</a>
                                        <a href="/Home/Goods/goodsList/id/214.html" target="_blank"> 设计师 / 潮牌</a>
                                        <a href="/Home/Goods/goodsList/id/29.html" target="_blank"> 加绒裤</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/26.html" target="_blank"> 内衣</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/219.html" target="_blank"> 男士内裤</a>
                                        <a href="/Home/Goods/goodsList/id/220.html" target="_blank"> 女士内裤</a>
                                        <a href="/Home/Goods/goodsList/id/221.html" target="_blank"> 文胸套装</a>
                                        <a href="/Home/Goods/goodsList/id/222.html" target="_blank"> 情侣睡衣</a>
                                        <a href="/Home/Goods/goodsList/id/223.html" target="_blank"> 少女文胸</a>
                                        <a href="/Home/Goods/goodsList/id/224.html" target="_blank"> 商务男袜</a>
                                        <a href="/Home/Goods/goodsList/id/226.html" target="_blank"> 打底裤袜</a>
                                        <a href="/Home/Goods/goodsList/id/227.html" target="_blank"> 内衣配件</a>
                                        <a href="/Home/Goods/goodsList/id/228.html" target="_blank"> 泳衣</a>
                                        <a href="/Home/Goods/goodsList/id/229.html" target="_blank"> 秋衣秋裤</a>
                                        <a href="/Home/Goods/goodsList/id/230.html" target="_blank"> 保暖内衣</a>
                                        <a href="/Home/Goods/goodsList/id/231.html" target="_blank"> 情趣内衣</a>
                                        <a href="/Home/Goods/goodsList/id/217.html" target="_blank"> 文胸</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/27.html" target="_blank"> 配饰</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/232.html" target="_blank"> 女士围巾 / 披肩</a>
                                        <a href="/Home/Goods/goodsList/id/233.html" target="_blank"> 男士丝巾 / 围巾</a>
                                        <a href="/Home/Goods/goodsList/id/234.html" target="_blank"> 太阳镜</a>
                                        <a href="/Home/Goods/goodsList/id/235.html" target="_blank"> 防辐射眼镜</a>
                                        <a href="/Home/Goods/goodsList/id/236.html" target="_blank"> 老花镜</a>
                                        <a href="/Home/Goods/goodsList/id/237.html" target="_blank"> 游泳镜</a>
                                        <a href="/Home/Goods/goodsList/id/238.html" target="_blank"> 领带 / 领结</a>
                                        <a href="/Home/Goods/goodsList/id/239.html" target="_blank"> 毛线帽</a>
                                        <a href="/Home/Goods/goodsList/id/240.html" target="_blank"> 棒球帽</a>
                                        <a href="/Home/Goods/goodsList/id/241.html" target="_blank"> 遮阳伞 / 雨伞</a>
                                        <a href="/Home/Goods/goodsList/id/242.html" target="_blank"> 男士腰带</a>
                                        <a href="/Home/Goods/goodsList/id/243.html" target="_blank"> 女士腰带</a>
                                        <a href="/Home/Goods/goodsList/id/244.html" target="_blank"> 真皮手套</a>
                                        <a href="/Home/Goods/goodsList/id/245.html" target="_blank"> 毛线手套</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/28.html" target="_blank"> 童装</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/256.html" target="_blank"> 礼服 / 演出服</a>
                                        <a href="/Home/Goods/goodsList/id/257.html" target="_blank"> 羽绒服</a>
                                        <a href="/Home/Goods/goodsList/id/258.html" target="_blank"> 棉服</a>
                                        <a href="/Home/Goods/goodsList/id/259.html" target="_blank"> 内衣裤</a>
                                        <a href="/Home/Goods/goodsList/id/260.html" target="_blank"> 口罩</a>
                                        <a href="/Home/Goods/goodsList/id/261.html" target="_blank"> 耳罩 / 耳包</a>
                                        <a href="/Home/Goods/goodsList/id/246.html" target="_blank"> 套装</a>
                                        <a href="/Home/Goods/goodsList/id/247.html" target="_blank"> 卫衣</a>
                                        <a href="/Home/Goods/goodsList/id/248.html" target="_blank"> 裤子</a>
                                        <a href="/Home/Goods/goodsList/id/249.html" target="_blank"> 外套 / 大衣</a>
                                        <a href="/Home/Goods/goodsList/id/250.html" target="_blank"> 毛衣 / 针织衫</a>
                                        <a href="/Home/Goods/goodsList/id/251.html" target="_blank"> 衬衫</a>
                                        <a href="/Home/Goods/goodsList/id/252.html" target="_blank"> 户外 / 运动服</a>
                                        <a href="/Home/Goods/goodsList/id/254.html" target="_blank"> 裙子</a>
                                        <a href="/Home/Goods/goodsList/id/255.html" target="_blank"> 亲子装</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/3181c862e182923170dcf1e15bc0a2cc.jpg" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/0051c20be128541be1f4cfa41316b1ca.png" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/3181c862e182923170dcf1e15bc0a2cc.jpg" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-13/cd8a548bcc78a0a2fcc855a644c0e92f.jpg" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-2"></i>
                                <a href="/Home/Goods/goodsList/id/37.html" title="电脑"> 电脑配件</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>

                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/38.html" target="_blank"> 电脑整机</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/91.html" target="_blank"> 笔记本</a>
                                        <a href="/Home/Goods/goodsList/id/92.html" target="_blank"> 游戏本</a>
                                        <a href="/Home/Goods/goodsList/id/93.html" target="_blank"> 平板电脑</a>
                                        <a href="/Home/Goods/goodsList/id/94.html" target="_blank"> 台试机</a>
                                        <a href="/Home/Goods/goodsList/id/95.html" target="_blank"> 一体机</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/39.html" target="_blank"> 电脑配件</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/147.html" target="_blank"> 显示器</a>
                                        <a href="/Home/Goods/goodsList/id/148.html" target="_blank"> CPU</a>
                                        <a href="/Home/Goods/goodsList/id/149.html" target="_blank"> 主板</a>
                                        <a href="/Home/Goods/goodsList/id/150.html" target="_blank"> 显卡</a>
                                        <a href="/Home/Goods/goodsList/id/151.html" target="_blank"> 硬盘</a>
                                        <a href="/Home/Goods/goodsList/id/152.html" target="_blank"> 内存</a>
                                        <a href="/Home/Goods/goodsList/id/153.html" target="_blank"> 机箱</a>
                                        <a href="/Home/Goods/goodsList/id/154.html" target="_blank"> 电源</a>
                                        <a href="/Home/Goods/goodsList/id/96.html" target="_blank"> 散热器</a>
                                        <a href="/Home/Goods/goodsList/id/97.html" target="_blank"> 装机配件</a>
                                        <a href="/Home/Goods/goodsList/id/98.html" target="_blank"> 组装电脑</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/40.html" target="_blank"> 外设产品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/102.html" target="_blank"> 手写板</a>
                                        <a href="/Home/Goods/goodsList/id/155.html" target="_blank"> 鼠标垫</a>
                                        <a href="/Home/Goods/goodsList/id/156.html" target="_blank"> 电脑工具</a>
                                        <a href="/Home/Goods/goodsList/id/157.html" target="_blank"> 电脑清洁</a>
                                        <a href="/Home/Goods/goodsList/id/158.html" target="_blank"> 插座</a>
                                        <a href="/Home/Goods/goodsList/id/99.html" target="_blank"> 鼠标</a>
                                        <a href="/Home/Goods/goodsList/id/100.html" target="_blank"> 键盘</a>
                                        <a href="/Home/Goods/goodsList/id/101.html" target="_blank"> U盘</a>
                                        <a href="/Home/Goods/goodsList/id/103.html" target="_blank"> 摄像头</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/41.html" target="_blank"> 游戏设备</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/128.html" target="_blank"> 游戏软件</a>
                                        <a href="/Home/Goods/goodsList/id/129.html" target="_blank"> 游戏周边</a>
                                        <a href="/Home/Goods/goodsList/id/130.html" target="_blank"> 手柄 / 方向盘</a>
                                        <a href="/Home/Goods/goodsList/id/104.html" target="_blank"> 游戏机</a>
                                        <a href="/Home/Goods/goodsList/id/105.html" target="_blank"> 游戏耳机</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/42.html" target="_blank"> 网络产品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/123.html" target="_blank"> 交换机</a>
                                        <a href="/Home/Goods/goodsList/id/124.html" target="_blank"> 网络存储卡</a>
                                        <a href="/Home/Goods/goodsList/id/125.html" target="_blank"> 网卡</a>
                                        <a href="/Home/Goods/goodsList/id/127.html" target="_blank"> 4G / 3G上网 </a>
                                        <a href="/Home/Goods/goodsList/id/121.html" target="_blank"> 路由器</a>
                                        <a href="/Home/Goods/goodsList/id/122.html" target="_blank"> 网络机顶盒</a>
                                        <a href="/Home/Goods/goodsList/id/126.html" target="_blank"> 网络配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/43.html" target="_blank"> 办公设备</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/131.html" target="_blank"> 投像机</a>
                                        <a href="/Home/Goods/goodsList/id/133.html" target="_blank"> 多功能一体机</a>
                                        <a href="/Home/Goods/goodsList/id/134.html" target="_blank"> 打印机</a>
                                        <a href="/Home/Goods/goodsList/id/135.html" target="_blank"> 传真设备</a>
                                        <a href="/Home/Goods/goodsList/id/136.html" target="_blank"> 验钞 / 点钞机</a>
                                        <a href="/Home/Goods/goodsList/id/137.html" target="_blank"> 收银机</a>
                                        <a href="/Home/Goods/goodsList/id/159.html" target="_blank"> 线缆</a>
                                        <a href="/Home/Goods/goodsList/id/132.html" target="_blank"> 投影配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/44.html" target="_blank"> 文具耗材</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/138.html" target="_blank"> 硒鼓 / 墨粉</a>
                                        <a href="/Home/Goods/goodsList/id/139.html" target="_blank"> 墨盒</a>
                                        <a href="/Home/Goods/goodsList/id/140.html" target="_blank"> 色带</a>
                                        <a href="/Home/Goods/goodsList/id/141.html" target="_blank"> 纸类</a>
                                        <a href="/Home/Goods/goodsList/id/142.html" target="_blank"> 办公文具</a>
                                        <a href="/Home/Goods/goodsList/id/143.html" target="_blank"> 学生文具</a>
                                        <a href="/Home/Goods/goodsList/id/144.html" target="_blank"> 文件收纳</a>
                                        <a href="/Home/Goods/goodsList/id/145.html" target="_blank"> 计算器</a>
                                        <a href="/Home/Goods/goodsList/id/146.html" target="_blank"> 财会用品</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/0709c98a383426ecef6bec431a1fee1f.jpg" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/3181c862e182923170dcf1e15bc0a2cc.jpg" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-3"></i>
                                <a href="/Home/Goods/goodsList/id/30.html" title="家居"> 家具家居</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>

                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/45.html" target="_blank"> 厨具</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/262.html" target="_blank"> 水具酒具</a>
                                        <a href="/Home/Goods/goodsList/id/263.html" target="_blank"> 餐具</a>
                                        <a href="/Home/Goods/goodsList/id/264.html" target="_blank"> 厨房配件</a>
                                        <a href="/Home/Goods/goodsList/id/265.html" target="_blank"> 刀剪菜板</a>
                                        <a href="/Home/Goods/goodsList/id/266.html" target="_blank"> 锅具套装</a>
                                        <a href="/Home/Goods/goodsList/id/268.html" target="_blank"> 茶具 / 咖啡具</a>
                                        <a href="/Home/Goods/goodsList/id/269.html" target="_blank"> 保温杯</a>
                                        <a href="/Home/Goods/goodsList/id/270.html" target="_blank"> 保鲜盒</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/46.html" target="_blank"> 家纺</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/275.html" target="_blank"> 凉席</a>
                                        <a href="/Home/Goods/goodsList/id/276.html" target="_blank"> 毛巾浴巾</a>
                                        <a href="/Home/Goods/goodsList/id/277.html" target="_blank"> 地毯地垫</a>
                                        <a href="/Home/Goods/goodsList/id/278.html" target="_blank"> 床垫</a>
                                        <a href="/Home/Goods/goodsList/id/279.html" target="_blank"> 毯子</a>
                                        <a href="/Home/Goods/goodsList/id/280.html" target="_blank"> 抱枕靠垫</a>
                                        <a href="/Home/Goods/goodsList/id/281.html" target="_blank"> 窗帘 / 窗纱</a>
                                        <a href="/Home/Goods/goodsList/id/282.html" target="_blank"> 床单</a>
                                        <a href="/Home/Goods/goodsList/id/283.html" target="_blank"> 被套</a>
                                        <a href="/Home/Goods/goodsList/id/284.html" target="_blank"> 电热垫</a>
                                        <a href="/Home/Goods/goodsList/id/285.html" target="_blank"> 桌布 / 罩件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/48.html" target="_blank"> 灯具</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/291.html" target="_blank"> 吸顶灯</a>
                                        <a href="/Home/Goods/goodsList/id/292.html" target="_blank"> 吊灯</a>
                                        <a href="/Home/Goods/goodsList/id/293.html" target="_blank"> 台灯</a>
                                        <a href="/Home/Goods/goodsList/id/294.html" target="_blank"> 筒灯射灯</a>
                                        <a href="/Home/Goods/goodsList/id/295.html" target="_blank"> 装饰灯</a>
                                        <a href="/Home/Goods/goodsList/id/296.html" target="_blank"> LED灯</a>
                                        <a href="/Home/Goods/goodsList/id/297.html" target="_blank"> 氛围照明</a>
                                        <a href="/Home/Goods/goodsList/id/298.html" target="_blank"> 落地灯</a>
                                        <a href="/Home/Goods/goodsList/id/299.html" target="_blank"> 庭院灯</a>
                                        <a href="/Home/Goods/goodsList/id/300.html" target="_blank"> 节能灯</a>
                                        <a href="/Home/Goods/goodsList/id/301.html" target="_blank"> 应急灯 / 手电</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/49.html" target="_blank"> 家具</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/302.html" target="_blank"> 卧室家具</a>
                                        <a href="/Home/Goods/goodsList/id/303.html" target="_blank"> 客厅家具</a>
                                        <a href="/Home/Goods/goodsList/id/304.html" target="_blank"> 餐厅家具</a>
                                        <a href="/Home/Goods/goodsList/id/305.html" target="_blank"> 书房家具</a>
                                        <a href="/Home/Goods/goodsList/id/306.html" target="_blank"> 儿童家具</a>
                                        <a href="/Home/Goods/goodsList/id/307.html" target="_blank"> 储物家具</a>
                                        <a href="/Home/Goods/goodsList/id/308.html" target="_blank"> 阳台 / 户外</a>
                                        <a href="/Home/Goods/goodsList/id/309.html" target="_blank"> 办公家具</a>
                                        <a href="/Home/Goods/goodsList/id/310.html" target="_blank"> 床</a>
                                        <a href="/Home/Goods/goodsList/id/311.html" target="_blank"> 床垫</a>
                                        <a href="/Home/Goods/goodsList/id/312.html" target="_blank"> 沙发</a>
                                        <a href="/Home/Goods/goodsList/id/313.html" target="_blank"> 电脑椅</a>
                                        <a href="/Home/Goods/goodsList/id/314.html" target="_blank"> 衣柜</a>
                                        <a href="/Home/Goods/goodsList/id/315.html" target="_blank"> 电视柜</a>
                                        <a href="/Home/Goods/goodsList/id/316.html" target="_blank"> 餐桌</a>
                                        <a href="/Home/Goods/goodsList/id/317.html" target="_blank"> 电脑桌</a>
                                        <a href="/Home/Goods/goodsList/id/318.html" target="_blank"> 鞋架 / 衣帽椅</a>
                                        <a href="/Home/Goods/goodsList/id/319.html" target="_blank"> 儿童桌椅</a>
                                        <a href="/Home/Goods/goodsList/id/320.html" target="_blank"> 儿童床</a>
                                        <a href="/Home/Goods/goodsList/id/321.html" target="_blank"> 晾衣架</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/47.html" target="_blank"> 生活日品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/286.html" target="_blank"> 收纳用品</a>
                                        <a href="/Home/Goods/goodsList/id/287.html" target="_blank"> 净化除味</a>
                                        <a href="/Home/Goods/goodsList/id/288.html" target="_blank"> 浴室用品</a>
                                        <a href="/Home/Goods/goodsList/id/289.html" target="_blank"> 缝纫 / 针织用品</a>
                                        <a href="/Home/Goods/goodsList/id/290.html" target="_blank"> 清洁工具</a>
                                        <a href="/Home/Goods/goodsList/id/106.html" target="_blank"> 雨伞雨具</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/50.html" target="_blank"> 家装主材</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/324.html" target="_blank"> 瓷砖</a>
                                        <a href="/Home/Goods/goodsList/id/325.html" target="_blank"> 地板</a>
                                        <a href="/Home/Goods/goodsList/id/326.html" target="_blank"> 油漆涂料</a>
                                        <a href="/Home/Goods/goodsList/id/327.html" target="_blank"> 壁纸</a>
                                        <a href="/Home/Goods/goodsList/id/329.html" target="_blank"> 涂刷辅料</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/51.html" target="_blank"> 厨房卫浴</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/328.html" target="_blank"> 水槽</a>
                                        <a href="/Home/Goods/goodsList/id/330.html" target="_blank"> 龙头</a>
                                        <a href="/Home/Goods/goodsList/id/331.html" target="_blank"> 马桶</a>
                                        <a href="/Home/Goods/goodsList/id/332.html" target="_blank"> 智能马桶盖</a>
                                        <a href="/Home/Goods/goodsList/id/333.html" target="_blank"> 浴室柜</a>
                                        <a href="/Home/Goods/goodsList/id/334.html" target="_blank"> 垃圾处理器</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/323.html" target="_blank"> 装修定制</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/335.html" target="_blank"> 装修设计</a>
                                        <a href="/Home/Goods/goodsList/id/336.html" target="_blank"> 全包装修</a>
                                        <a href="/Home/Goods/goodsList/id/337.html" target="_blank"> 局部装修</a>
                                        <a href="/Home/Goods/goodsList/id/338.html" target="_blank"> 橱柜</a>
                                        <a href="/Home/Goods/goodsList/id/339.html" target="_blank"> 门窗</a>
                                        <a href="/Home/Goods/goodsList/id/340.html" target="_blank"> 散热器</a>
                                        <a href="/Home/Goods/goodsList/id/341.html" target="_blank"> 安装服务</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/a4129d96e71c30563c724aecd5d9e44b.jpg" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-4"></i>
                                <a href="/Home/Goods/goodsList/id/52.html" title="电器"> 电器工具</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>

                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/109.html" target="_blank"> 电视</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/351.html" target="_blank"> 曲面电视</a>
                                        <a href="/Home/Goods/goodsList/id/352.html" target="_blank"> 超薄电视</a>
                                        <a href="/Home/Goods/goodsList/id/353.html" target="_blank"> HDR电视</a>
                                        <a href="/Home/Goods/goodsList/id/354.html" target="_blank"> 4K超清电视 </a>
                                        <a href="/Home/Goods/goodsList/id/355.html" target="_blank"> 人工智能电视</a>
                                        <a href="/Home/Goods/goodsList/id/356.html" target="_blank"> 55英寸 </a>
                                        <a href="/Home/Goods/goodsList/id/357.html" target="_blank"> 65英寸 </a>
                                        <a href="/Home/Goods/goodsList/id/358.html" target="_blank"> 电视配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/54.html" target="_blank"> 洗衣机</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/372.html" target="_blank"> 滚筒洗衣机</a>
                                        <a href="/Home/Goods/goodsList/id/373.html" target="_blank"> 洗烘一体机</a>
                                        <a href="/Home/Goods/goodsList/id/374.html" target="_blank"> 波轮洗衣机</a>
                                        <a href="/Home/Goods/goodsList/id/375.html" target="_blank"> 迷你洗衣机</a>
                                        <a href="/Home/Goods/goodsList/id/376.html" target="_blank"> 烘干机</a>
                                        <a href="/Home/Goods/goodsList/id/377.html" target="_blank"> 洗衣机配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/342.html" target="_blank"> 空调</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/343.html" target="_blank"> 壁挂试空调</a>
                                        <a href="/Home/Goods/goodsList/id/344.html" target="_blank"> 柜试空调</a>
                                        <a href="/Home/Goods/goodsList/id/345.html" target="_blank"> 中央空调</a>
                                        <a href="/Home/Goods/goodsList/id/346.html" target="_blank"> 节能空调</a>
                                        <a href="/Home/Goods/goodsList/id/347.html" target="_blank"> 智能空调</a>
                                        <a href="/Home/Goods/goodsList/id/348.html" target="_blank"> 变频空调</a>
                                        <a href="/Home/Goods/goodsList/id/349.html" target="_blank"> 以旧换新</a>
                                        <a href="/Home/Goods/goodsList/id/350.html" target="_blank"> 空调配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/378.html" target="_blank"> 冰箱</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/379.html" target="_blank"> 多门</a>
                                        <a href="/Home/Goods/goodsList/id/380.html" target="_blank"> 对开门</a>
                                        <a href="/Home/Goods/goodsList/id/382.html" target="_blank"> 冷柜 / 冰吧</a>
                                        <a href="/Home/Goods/goodsList/id/383.html" target="_blank"> 冰箱配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/384.html" target="_blank"> 厨房小电</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/385.html" target="_blank"> 油烟机</a>
                                        <a href="/Home/Goods/goodsList/id/386.html" target="_blank"> 电饭煲</a>
                                        <a href="/Home/Goods/goodsList/id/387.html" target="_blank"> 电压力锅</a>
                                        <a href="/Home/Goods/goodsList/id/388.html" target="_blank"> 咖啡机</a>
                                        <a href="/Home/Goods/goodsList/id/389.html" target="_blank"> 豆浆机</a>
                                        <a href="/Home/Goods/goodsList/id/390.html" target="_blank"> 料理机</a>
                                        <a href="/Home/Goods/goodsList/id/391.html" target="_blank"> 电水壶</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/53.html" target="_blank"> 生活电器</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/359.html" target="_blank"> 吸尘器</a>
                                        <a href="/Home/Goods/goodsList/id/360.html" target="_blank"> 空气净化器</a>
                                        <a href="/Home/Goods/goodsList/id/361.html" target="_blank"> 电风扇</a>
                                        <a href="/Home/Goods/goodsList/id/362.html" target="_blank"> 扫地机器人</a>
                                        <a href="/Home/Goods/goodsList/id/363.html" target="_blank"> 蒸汽拖把</a>
                                        <a href="/Home/Goods/goodsList/id/364.html" target="_blank"> 干衣机</a>
                                        <a href="/Home/Goods/goodsList/id/365.html" target="_blank"> 电话机</a>
                                        <a href="/Home/Goods/goodsList/id/366.html" target="_blank"> 饮水机</a>
                                        <a href="/Home/Goods/goodsList/id/367.html" target="_blank"> 净水器</a>
                                        <a href="/Home/Goods/goodsList/id/368.html" target="_blank"> 除湿器</a>
                                        <a href="/Home/Goods/goodsList/id/369.html" target="_blank"> 加湿器</a>
                                        <a href="/Home/Goods/goodsList/id/370.html" target="_blank"> 冷风扇</a>
                                        <a href="/Home/Goods/goodsList/id/371.html" target="_blank"> 生活电器配件</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/2a748189faba2a989ac0c9271318824c.jpg" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-5"></i>
                                <a href="/Home/Goods/goodsList/id/55.html" title="食品"> 食品生鲜</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>

                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/433.html" target="_blank"> 进口食品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/434.html" target="_blank"> 牛奶</a>
                                        <a href="/Home/Goods/goodsList/id/435.html" target="_blank"> 零食</a>
                                        <a href="/Home/Goods/goodsList/id/436.html" target="_blank"> 饮料</a>
                                        <a href="/Home/Goods/goodsList/id/437.html" target="_blank"> 咖啡粉</a>
                                        <a href="/Home/Goods/goodsList/id/438.html" target="_blank"> 方便食品</a>
                                        <a href="/Home/Goods/goodsList/id/439.html" target="_blank"> 水</a>
                                        <a href="/Home/Goods/goodsList/id/440.html" target="_blank"> 糖 / 巧克力</a>
                                        <a href="/Home/Goods/goodsList/id/441.html" target="_blank"> 冲调品</a>
                                        <a href="/Home/Goods/goodsList/id/442.html" target="_blank"> 油</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/116.html" target="_blank"> 新鲜水果</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/392.html" target="_blank"> 苹果</a>
                                        <a href="/Home/Goods/goodsList/id/393.html" target="_blank"> 香蕉</a>
                                        <a href="/Home/Goods/goodsList/id/394.html" target="_blank"> 梨</a>
                                        <a href="/Home/Goods/goodsList/id/395.html" target="_blank"> 橙子</a>
                                        <a href="/Home/Goods/goodsList/id/396.html" target="_blank"> 奇异果</a>
                                        <a href="/Home/Goods/goodsList/id/397.html" target="_blank"> 火龙果</a>
                                        <a href="/Home/Goods/goodsList/id/398.html" target="_blank"> 榴莲</a>
                                        <a href="/Home/Goods/goodsList/id/399.html" target="_blank"> 百香果</a>
                                        <a href="/Home/Goods/goodsList/id/400.html" target="_blank"> 国产水果</a>
                                        <a href="/Home/Goods/goodsList/id/401.html" target="_blank"> 进口水果</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/117.html" target="_blank"> 休闲零食</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/402.html" target="_blank"> 营养零食</a>
                                        <a href="/Home/Goods/goodsList/id/403.html" target="_blank"> 坚果炒货</a>
                                        <a href="/Home/Goods/goodsList/id/404.html" target="_blank"> 糖果 / 巧克力</a>
                                        <a href="/Home/Goods/goodsList/id/405.html" target="_blank"> 饼干蛋糕</a>
                                        <a href="/Home/Goods/goodsList/id/406.html" target="_blank"> 肉干</a>
                                        <a href="/Home/Goods/goodsList/id/407.html" target="_blank"> 熟食腊味</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/118.html" target="_blank"> 蔬菜蛋品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/408.html" target="_blank"> 蛋品</a>
                                        <a href="/Home/Goods/goodsList/id/409.html" target="_blank"> 叶菜类</a>
                                        <a href="/Home/Goods/goodsList/id/410.html" target="_blank"> 葱姜蒜</a>
                                        <a href="/Home/Goods/goodsList/id/411.html" target="_blank"> 玉米</a>
                                        <a href="/Home/Goods/goodsList/id/412.html" target="_blank"> 山药</a>
                                        <a href="/Home/Goods/goodsList/id/413.html" target="_blank"> 地瓜 / 红薯</a>
                                        <a href="/Home/Goods/goodsList/id/414.html" target="_blank"> 鲜菌菇</a>
                                        <a href="/Home/Goods/goodsList/id/415.html" target="_blank"> 瓜类</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/119.html" target="_blank"> 精选肉类</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/416.html" target="_blank"> 猪肉</a>
                                        <a href="/Home/Goods/goodsList/id/417.html" target="_blank"> 牛肉</a>
                                        <a href="/Home/Goods/goodsList/id/418.html" target="_blank"> 羊肉</a>
                                        <a href="/Home/Goods/goodsList/id/419.html" target="_blank"> 鸡肉</a>
                                        <a href="/Home/Goods/goodsList/id/420.html" target="_blank"> 鸭肉</a>
                                        <a href="/Home/Goods/goodsList/id/421.html" target="_blank"> 冷鲜肉</a>
                                        <a href="/Home/Goods/goodsList/id/422.html" target="_blank"> 特色肉类</a>
                                        <a href="/Home/Goods/goodsList/id/423.html" target="_blank"> 牛排</a>
                                        <a href="/Home/Goods/goodsList/id/424.html" target="_blank"> 鸡翅</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/120.html" target="_blank"> 中外名酒</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/425.html" target="_blank"> 白酒</a>
                                        <a href="/Home/Goods/goodsList/id/426.html" target="_blank"> 葡萄酒</a>
                                        <a href="/Home/Goods/goodsList/id/427.html" target="_blank"> 洋酒</a>
                                        <a href="/Home/Goods/goodsList/id/428.html" target="_blank"> 啤酒</a>
                                        <a href="/Home/Goods/goodsList/id/429.html" target="_blank"> 收藏酒 / 陈年老酒</a>
                                        <a href="/Home/Goods/goodsList/id/430.html" target="_blank"> 保健酒</a>
                                        <a href="/Home/Goods/goodsList/id/431.html" target="_blank"> 配制酒</a>
                                        <a href="/Home/Goods/goodsList/id/432.html" target="_blank"> 黄酒</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="upload/ad/2018/04-12/5ccf5393abe9e19814d40865cec2c491.jpg" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-6"></i>
                                <a href="/Home/Goods/goodsList/id/56.html" title="鞋类"> 鞋类配饰</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>

                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/57.html" target="_blank"> 时尚女鞋</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/443.html" target="_blank"> 新品推荐</a>
                                        <a href="/Home/Goods/goodsList/id/444.html" target="_blank"> 单鞋</a>
                                        <a href="/Home/Goods/goodsList/id/445.html" target="_blank"> 休闲鞋</a>
                                        <a href="/Home/Goods/goodsList/id/446.html" target="_blank"> 帆布鞋</a>
                                        <a href="/Home/Goods/goodsList/id/447.html" target="_blank"> 布鞋 / 绣花鞋</a>
                                        <a href="/Home/Goods/goodsList/id/448.html" target="_blank"> 女靴</a>
                                        <a href="/Home/Goods/goodsList/id/449.html" target="_blank"> 马丁靴</a>
                                        <a href="/Home/Goods/goodsList/id/450.html" target="_blank"> 高跟鞋</a>
                                        <a href="/Home/Goods/goodsList/id/451.html" target="_blank"> 运动鞋</a>
                                        <a href="/Home/Goods/goodsList/id/452.html" target="_blank"> 凉鞋</a>
                                        <a href="/Home/Goods/goodsList/id/453.html" target="_blank"> 内增高</a>
                                        <a href="/Home/Goods/goodsList/id/454.html" target="_blank"> 防水台</a>
                                        <a href="/Home/Goods/goodsList/id/455.html" target="_blank"> 鞋配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/58.html" target="_blank"> 潮流女包</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/456.html" target="_blank"> 真皮包</a>
                                        <a href="/Home/Goods/goodsList/id/457.html" target="_blank"> 女士钱包</a>
                                        <a href="/Home/Goods/goodsList/id/458.html" target="_blank"> 单肩包</a>
                                        <a href="/Home/Goods/goodsList/id/459.html" target="_blank"> 斜跨包</a>
                                        <a href="/Home/Goods/goodsList/id/460.html" target="_blank"> 手提包</a>
                                        <a href="/Home/Goods/goodsList/id/461.html" target="_blank"> 腰包</a>
                                        <a href="/Home/Goods/goodsList/id/462.html" target="_blank"> 化妆包</a>
                                        <a href="/Home/Goods/goodsList/id/463.html" target="_blank"> 钥匙包</a>
                                        <a href="/Home/Goods/goodsList/id/464.html" target="_blank"> 双肩包</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/570.html" target="_blank"> 男士鞋子</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/571.html" target="_blank"> 新品推荐</a>
                                        <a href="/Home/Goods/goodsList/id/572.html" target="_blank"> 当季热卖</a>
                                        <a href="/Home/Goods/goodsList/id/573.html" target="_blank"> 运动鞋</a>
                                        <a href="/Home/Goods/goodsList/id/575.html" target="_blank"> 休闲鞋</a>
                                        <a href="/Home/Goods/goodsList/id/576.html" target="_blank"> 凉鞋</a>
                                        <a href="/Home/Goods/goodsList/id/577.html" target="_blank"> 棉拖鞋</a>
                                        <a href="/Home/Goods/goodsList/id/578.html" target="_blank"> 牛皮鞋</a>
                                        <a href="/Home/Goods/goodsList/id/579.html" target="_blank"> 布帆鞋</a>
                                        <a href="/Home/Goods/goodsList/id/580.html" target="_blank"> 解放鞋</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/465.html" target="_blank"> 精品男包</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/466.html" target="_blank"> 男士钱包</a>
                                        <a href="/Home/Goods/goodsList/id/467.html" target="_blank"> 双肩包</a>
                                        <a href="/Home/Goods/goodsList/id/468.html" target="_blank"> 单肩 / 斜跨包</a>
                                        <a href="/Home/Goods/goodsList/id/469.html" target="_blank"> 商务公文包</a>
                                        <a href="/Home/Goods/goodsList/id/470.html" target="_blank"> 男士手包</a>
                                        <a href="/Home/Goods/goodsList/id/471.html" target="_blank"> 钥匙包</a>
                                        <a href="/Home/Goods/goodsList/id/472.html" target="_blank"> 腰包</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/473.html" target="_blank"> 功能箱包</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/474.html" target="_blank"> 旅行箱</a>
                                        <a href="/Home/Goods/goodsList/id/475.html" target="_blank"> 万向轮箱</a>
                                        <a href="/Home/Goods/goodsList/id/476.html" target="_blank"> 旅行袋</a>
                                        <a href="/Home/Goods/goodsList/id/477.html" target="_blank"> 拉杆箱</a>
                                        <a href="/Home/Goods/goodsList/id/478.html" target="_blank"> 电脑包</a>
                                        <a href="/Home/Goods/goodsList/id/479.html" target="_blank"> 休闲运动包</a>
                                        <a href="/Home/Goods/goodsList/id/481.html" target="_blank"> 登山包</a>
                                        <a href="/Home/Goods/goodsList/id/482.html" target="_blank"> 相机包</a>
                                        <a href="/Home/Goods/goodsList/id/483.html" target="_blank"> 妈咪包</a>
                                        <a href="/Home/Goods/goodsList/id/484.html" target="_blank"> 旅行配件</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/485.html" target="_blank"> 珠宝首饰</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/486.html" target="_blank"> 黄金</a>
                                        <a href="/Home/Goods/goodsList/id/487.html" target="_blank"> K金</a>
                                        <a href="/Home/Goods/goodsList/id/488.html" target="_blank"> 时尚饰品</a>
                                        <a href="/Home/Goods/goodsList/id/489.html" target="_blank"> 砖石</a>
                                        <a href="/Home/Goods/goodsList/id/490.html" target="_blank"> 银饰</a>
                                        <a href="/Home/Goods/goodsList/id/491.html" target="_blank"> 铂金</a>
                                        <a href="/Home/Goods/goodsList/id/492.html" target="_blank"> 珍珠</a>
                                        <a href="/Home/Goods/goodsList/id/493.html" target="_blank"> 发饰</a>
                                        <a href="/Home/Goods/goodsList/id/494.html" target="_blank"> 水晶玛瑙</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/495.html" target="_blank"> 时尚钟表</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/512.html" target="_blank"> 钟表配件</a>
                                        <a href="/Home/Goods/goodsList/id/498.html" target="_blank"> DW</a>
                                        <a href="/Home/Goods/goodsList/id/499.html" target="_blank"> 浪琴</a>
                                        <a href="/Home/Goods/goodsList/id/500.html" target="_blank"> 卡西欧</a>
                                        <a href="/Home/Goods/goodsList/id/501.html" target="_blank"> 西铁城</a>
                                        <a href="/Home/Goods/goodsList/id/502.html" target="_blank"> 天王</a>
                                        <a href="/Home/Goods/goodsList/id/503.html" target="_blank"> 瑞表</a>
                                        <a href="/Home/Goods/goodsList/id/504.html" target="_blank"> 国表</a>
                                        <a href="/Home/Goods/goodsList/id/505.html" target="_blank"> 日韩表</a>
                                        <a href="/Home/Goods/goodsList/id/506.html" target="_blank"> 欧美表</a>
                                        <a href="/Home/Goods/goodsList/id/507.html" target="_blank"> 儿童手表</a>
                                        <a href="/Home/Goods/goodsList/id/508.html" target="_blank"> 智能手表</a>
                                        <a href="/Home/Goods/goodsList/id/509.html" target="_blank"> 闹钟</a>
                                        <a href="/Home/Goods/goodsList/id/510.html" target="_blank"> 挂钟</a>
                                        <a href="/Home/Goods/goodsList/id/511.html" target="_blank"> 座钟</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>
                <div class="item">
                    <div class="item-left">
                        <h3 class="cata-nav-name">
                            <div class="cata-nav-wrap">
                                <i class="ico ico-nav-7"></i>
                                <a href="/Home/Goods/goodsList/id/59.html" title="艺术"> 艺术鲜花</a>
                            </div>
                            <!--<a href = "" > 手机店</a > -->
                        </h3>
                    </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            <!--如果没有热门分类就隐藏 -->
                            <div class="cata-layer-title" style="display:none">
                            </div>

                            <div class="subitems">
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/513.html" target="_blank"> 精美礼品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/521.html" target="_blank"> 创意礼品</a>
                                        <a href="/Home/Goods/goodsList/id/522.html" target="_blank"> 电子礼品</a>
                                        <a href="/Home/Goods/goodsList/id/523.html" target="_blank"> 工艺礼品</a>
                                        <a href="/Home/Goods/goodsList/id/524.html" target="_blank"> 美妆礼品</a>
                                        <a href="/Home/Goods/goodsList/id/525.html" target="_blank"> 婚庆节庆</a>
                                        <a href="/Home/Goods/goodsList/id/526.html" target="_blank"> 礼盒礼券</a>
                                        <a href="/Home/Goods/goodsList/id/527.html" target="_blank"> 礼品定制</a>
                                        <a href="/Home/Goods/goodsList/id/528.html" target="_blank"> 古董文玩</a>
                                        <a href="/Home/Goods/goodsList/id/529.html" target="_blank"> 收藏品</a>
                                        <a href="/Home/Goods/goodsList/id/530.html" target="_blank"> 礼品文具</a>
                                        <a href="/Home/Goods/goodsList/id/531.html" target="_blank"> 熏香</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/532.html" target="_blank"> 鲜花速递</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/536.html" target="_blank"> 鲜花</a>
                                        <a href="/Home/Goods/goodsList/id/537.html" target="_blank"> 每周一花</a>
                                        <a href="/Home/Goods/goodsList/id/538.html" target="_blank"> 永生花</a>
                                        <a href="/Home/Goods/goodsList/id/539.html" target="_blank"> 香皂花</a>
                                        <a href="/Home/Goods/goodsList/id/540.html" target="_blank"> 卡通花束</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/533.html" target="_blank"> 绿植园艺</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/541.html" target="_blank"> 桌面绿植</a>
                                        <a href="/Home/Goods/goodsList/id/542.html" target="_blank"> 苗木</a>
                                        <a href="/Home/Goods/goodsList/id/543.html" target="_blank"> 绿植盘栽</a>
                                        <a href="/Home/Goods/goodsList/id/544.html" target="_blank"> 多肉植物</a>
                                        <a href="/Home/Goods/goodsList/id/545.html" target="_blank"> 花卉</a>
                                        <a href="/Home/Goods/goodsList/id/546.html" target="_blank"> 种子种球</a>
                                        <a href="/Home/Goods/goodsList/id/547.html" target="_blank"> 园艺土肥</a>
                                        <a href="/Home/Goods/goodsList/id/548.html" target="_blank"> 园艺工具</a>
                                        <a href="/Home/Goods/goodsList/id/549.html" target="_blank"> 花盆花器</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/535.html" target="_blank"> 畜牧养殖</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/554.html" target="_blank"> 中兽药</a>
                                        <a href="/Home/Goods/goodsList/id/555.html" target="_blank"> 西兽药</a>
                                        <a href="/Home/Goods/goodsList/id/556.html" target="_blank"> 农缩料</a>
                                        <a href="/Home/Goods/goodsList/id/557.html" target="_blank"> 全价料</a>
                                        <a href="/Home/Goods/goodsList/id/558.html" target="_blank"> 养殖场专用</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/60.html" target="_blank"> 艺术品</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/514.html" target="_blank"> 油画</a>
                                        <a href="/Home/Goods/goodsList/id/515.html" target="_blank"> 版画</a>
                                        <a href="/Home/Goods/goodsList/id/516.html" target="_blank"> 水墨画</a>
                                        <a href="/Home/Goods/goodsList/id/517.html" target="_blank"> 书法</a>
                                        <a href="/Home/Goods/goodsList/id/518.html" target="_blank"> 雕塑</a>
                                        <a href="/Home/Goods/goodsList/id/519.html" target="_blank"> 艺术画册</a>
                                        <a href="/Home/Goods/goodsList/id/520.html" target="_blank"> 艺术衍生品</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/534.html" target="_blank"> 种子</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/550.html" target="_blank"> 花草林木类</a>
                                        <a href="/Home/Goods/goodsList/id/551.html" target="_blank"> 蔬菜 / 菌类</a>
                                        <a href="/Home/Goods/goodsList/id/552.html" target="_blank"> 瓜果类</a>
                                        <a href="/Home/Goods/goodsList/id/553.html" target="_blank"> 大田作物类</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/559.html" target="_blank"> 农药</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/560.html" target="_blank"> 杀虫剂</a>
                                        <a href="/Home/Goods/goodsList/id/561.html" target="_blank"> 杀菌剂</a>
                                        <a href="/Home/Goods/goodsList/id/562.html" target="_blank"> 除草剂</a>
                                        <a href="/Home/Goods/goodsList/id/563.html" target="_blank"> 植物生长调节剂</a>
                                    </dd>
                                </dl>
                                <dl class="clearfix">
                                    <dt><a href="/Home/Goods/goodsList/id/564.html" target="_blank"> 肥料</a></dt>
                                    <dd class="clearfix">
                                        <a href="/Home/Goods/goodsList/id/565.html" target="_blank"> 碳 / 磷 / 钾肥</a>
                                        <a href="/Home/Goods/goodsList/id/566.html" target="_blank"> 复合肥</a>
                                        <a href="/Home/Goods/goodsList/id/567.html" target="_blank"> 生物菌肥</a>
                                        <a href="/Home/Goods/goodsList/id/568.html" target="_blank"> 水溶 / 叶面肥</a>
                                        <a href="/Home/Goods/goodsList/id/569.html" target="_blank"> 有机肥</a>
                                    </dd>
                                </dl>
                            </div>
                        </div>
                        <div class="advertisement_down">
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg"
                                 title="">
                        </a>
                    </div>
                </div>

            </div>
            <script>
                $('#cata-nav').find('.item').hover(function () {
                        $(this).addClass('nav-active').siblings().removeClass('nav-active');
                    }, function () {
                        $(this).removeClass('nav-active');
                    }
                )
            </script>
        </div>
        <!--全部商品分类-e-->
    </div>
    <ul class="navitems clearfix" id="navitems">
        <li class="selected"><a href="/home/Index/index.html"> 首页</a></li>
        <li>
            <a href="/index.php/Home/Goods/goodsList/id/31"> 手机通讯</a>
        </li>
        <li>
            <a href="/index.php?m=Home&amp;c=Goods&amp;a=integralMall"> 积分商城</a>
        </li>
        <li>
            <a href="/index.php/Home/Goods/goodsList/id/12"> 女装</a>
        </li>
        <li>
            <a href="/index.php/Home/Goods/goodsList/id/32"> 手机通讯</a>
        </li>
    </ul>
</div>
</div>
