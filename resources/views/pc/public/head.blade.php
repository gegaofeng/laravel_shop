<div class="top-hander">
    <div class="w1224 pr clearfix">
        <div class="fl">
            <link rel="stylesheet" href="{{url('home/css/location.css')}}" type="text/css"><!-- 收货地址，物流运费 -->
            <div class="sendaddress pr fl">
                <span>送货至：</span>
                <!-- <span>深圳<i class="share-a_a1"></i></span>-->
                <span>
                    <ul class="list1">
                                  <li class="summary-stock though-line">
                                      <div class="dd" style="border-right:0px;width:200px;">
                                          <div class="store-selector add_cj_p">
                                              <div class="text">
                                                  <div></div>
                                                  <b></b>
                                              </div>
                                              <div onclick="$(this).parent().removeClass('hover')" class="close"></div>
                                          </div>
                                      </div>
                                  </li>
                              </ul>
                          </span>
            </div>
            <script src="{{url('home/js/locationJson.js')}}"></script>
            <script src="{{url('home/js/location.js')}}"></script>
            <script>doInitRegion();</script>
            <div class="fl nologin">
                <a class="red" href="{{url('login')}}">登录</a>
                <a href="{{url('register')}}">注册</a>
            </div>
            <div class="fl islogin hide">
                <a class="red userinfo" href="/Home/user/index.html"></a>
                <a href="/Home/user/logout.html" title="退出" target="_self">安全退出</a>
            </div>
        </div>
        <ul class="top-ri-header fr clearfix">
            <li><a target="_blank" href="{{url('order/list')}}">我的订单</a></li>
            <li class="spacer"></li>
            <li><a target="_blank" href="{{url('user/visit')}}">我的浏览</a></li>
            <li class="spacer"></li>
            <li><a target="_blank" href="{{url('user/collection')}}">我的收藏</a></li>
            <li class="spacer"></li>
            <li><a target="_blank" href="{{url('help')}}">帮助中心</a></li>
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
    <a class="ecsc-logo" href="{{url('/')}}">
        <img src="{{url('upload/logo/2018/04-09/814d7e9a0eddcf3754f2e8373a50a19c.png')}}"
             style="width: 159px;height: 58px;">
    </a>
    <div class="ecsc-search">
        <form id="searchForm" name="" method="get" action="{{url('search')}}" class="ecsc-search-form">
            <input autocomplete="off" name="q" id="q" type="text" value="" class="ecsc-search-input"
                   placeholder="请输入搜索关键字...">
            <button type="submit" class="ecsc-search-button"> 搜索</button>
            <div class="candidate p">
                <ul id="search_list"></ul>
            </div>
            <script type="text/javascript">
                (function ($) {
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
        <a href="{{url('cart')}}">
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
    <script src="{{asset('home/js/common.js')}}"></script>
</div>
<div class="nav w1224 clearfix">
    <div class="categorys home_categorys">
        <div class="dt">
            <a href="" target="_blank"><i class="share-a_a2"></i> 全部商品分类</a>
        </div>
        <!--全部商品分类-s-->
        <div class="dd" style="">
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
                                     src="{{url('upload/ad/2018/04-13/4335611d9ab78af07e93ff2a31d2c895.jpg')}}" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="{{url('upload/ad/2018/04-13/382052a07ca4795bf95f8067b88991b0.pn')}}g" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="{{url('upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg')}}"
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
                                     src="{{url('upload/ad/2018/04-12/3181c862e182923170dcf1e15bc0a2cc.jpg')}}" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="{{url('upload/ad/2018/04-13/0051c20be128541be1f4cfa41316b1ca.png')}}" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="{{url('upload/ad/2018/04-12/3181c862e182923170dcf1e15bc0a2cc.jpg')}}" title="">
                            </a>
                            <a href="javascript:void(0);">
                                <img class="w-100"
                                     src="{{url('upload/ad/2018/04-13/cd8a548bcc78a0a2fcc855a644c0e92f.jpg')}}" title="">
                            </a>
                        </div>
                        <a href="javascript:void(0);" class="cata-nav-rigth">
                            <img class="w-100" src="{{url('upload/ad/2018/04-09/6ef2f9b7347fe73acbe067ea77327778.jpg')}}"
                                 title="">
                        </a>
                    </div>
                </div>
                @foreach($goods_category_tree as $key=>$goods_category)
                <div class="item">
                    {{--一级分类--}}
                        <div class="item-left">
                            <h3 class="cata-nav-name">
                                <div class="cata-nav-wrap">
                                    <i class="ico ico-nav-{{$key}}"></i>
                                    <a href="{{url('goodslist/id',$goods_category['id'])}}">{{$goods_category['mobile_name']}}</a>
                                </div>
                            </h3>
                        </div>
                    <div class="cata-nav-layer">
                        <div class="cata-nav-left">
                            {{--热门分类内容推荐--}}


                            {{--二级分类--}}
                            <div class="subitems">
                                @foreach($goods_category['tmenu'] as $tmenu)
                                    <dl class="clearfix">
                                        <dt>
                                            <a href="{{url('goodslist/id',$tmenu['id'])}}">{{$tmenu['name']}}</a>
                                        </dt>
                                        <dd class="clearfix">
                                            @foreach($tmenu['sub_menu'] as $sub_mune)
                                                <a href="{{url('goodslist/id',$sub_mune['id'])}}">{{$sub_mune['name']}}</a>
                                            @endforeach
                                        </dd>
                                    </dl>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
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
        <!--全部商品分类-end-->
    </div>
    <ul class="navitems clearfix" id="navitems">
        <li class="selected"><a href="{{url('/')}}"> 首页</a></li>
        @foreach($navigation as $value)
            <li class="selected">
                <a href="{{$value['url']}}">{{$value['name']}}</a>
            </li>
            @endforeach
    </ul>
</div>
</div>
