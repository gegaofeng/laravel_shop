
@extends('pc.layouts.home')
@section('personal_style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pc/index.css')}}">
    @endsection
@section('body')
<body class="gray_f5">
<!--header-s-->
<link rel="stylesheet" type="text/css" href="{{asset('css/pc/base.css')}}">
<link rel="shortcut icon" type="image/x-icon" href="upload/logo/2018/04-09/516bc70315079d81dc3726991672b4af.png"
      media="screen">
@include('pc/particals/head')


<!--header-e-->
<div id="myCarousel" class="carousel clearfix">
    <ul class="carousel-inner" style="width: 9352px; left: -1336px;">
        <li class="item" style="background: rgb(0, 0, 0); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-24/44aa330b056f5b090b6d6ac8a9a072dd.jpg" title=""
                     alt=""></a>
        </li>
        <li class="item slide-active" style="background: rgb(255, 128, 0); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-25/93bf5c1ebdf4c4359253a107bcbdbe98.jpg" title=""
                     alt=""></a>
        </li>
        <li class="item" style="background: rgb(254, 168, 193); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-13/6eeaa63e76c946927d0c1e67f6cf4f4f.jpg" title=""
                     alt=""></a>
        </li>
        <li class="item" style="background: rgb(241, 230, 210); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-13/8099744a886c2cfad7c837e28aee9d52.jpg" title=""
                     alt=""></a>
        </li>
        <li class="item" style="background: rgb(241, 220, 247); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-13/7009c820b93bcf31d3e42df31d78ed71.jpg" title=""
                     alt=""></a>
        </li>
        <li class="item" style="background: rgb(0, 0, 0); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-24/44aa330b056f5b090b6d6ac8a9a072dd.jpg" title=""
                     alt=""></a>
        </li>
        <li class="item" style="background: rgb(255, 128, 0); width: 1336px;">
            <a class="item-pic" href="javascript:void(0);">
                <img class="w-100" src="upload/ad/2018/04-25/93bf5c1ebdf4c4359253a107bcbdbe98.jpg" title=""
                     alt=""></a>
        </li>
    </ul>
    <div class="pagination">

        <span class="pagination-item active"></span><span class="pagination-item"></span><span
                class="pagination-item"></span><span class="pagination-item"></span><span
                class="pagination-item"></span></div>
    <a class="carousel-control left-btn t-all" href="javascript:;" data - slide="prev"></a>
    <a class="carousel-control right-btn t-all" href="javascript:;" data - slide="next"></a>
    <script>
        $(function () {
            function banner() {
                var
                    windowWidth = $(window).width();  //获取轮播图的宽度（这里是全屏）
                window.onresize = function () {  //屏幕大小改变时 自适应
                    windowWidth = $(window).width();
                    $_banner.css({'width': windowWidth * (length + 2), left: -windowWidth});
                    $_banner.find('.item').css('width', windowWidth);
                };
                var
                    $_bannerWrap = $('#myCarousel');
                var
                    $_banner = $_bannerWrap.find('.carousel-inner');
                var
                    length = $_banner.find('.item').length;
                var
                    first = $_banner.find('.item').eq(0).clone();
                var
                    last = $_banner.find('.item:last').clone();
                var
                    timer; //定时器
                $_banner.append(first);
                $_banner.prepend(last);
                //初始化 轮播图列表宽度和列表项宽度
                $_banner.css({'width': windowWidth * (length + 2), left: -windowWidth});
                $_banner.find('.item').css('width', windowWidth);

                var $_pagination = $_bannerWrap.find('.pagination');
                for (var i = 0; i < length; i++) {  //自动增加白色索引点击点
                    $_pagination.append('<span class="pagination-item"></span>');
                }
                var iNow = 1; //索引记录标志
                hoverActive(iNow); //初始化状态标记
                $_bannerWrap.find('.left-btn').click(function () {
                        clearInterval(timer);
                        iNow--;
                        bannerRun();
                    }
                );
                $_bannerWrap.find('.right-btn').click(function () {
                        clearInterval(timer);
                        iNow++;
                        bannerRun();
                    }
                );
                $_pagination.find('.pagination-item').click(function () {
                        iNow = $(this).index() + 1;
                        $_banner.finish().animate({left: -iNow * windowWidth}, 500);
                        hoverActive(iNow);
                    }
                );

                function bannerAutoRun() {  //轮播图自动循环播放 间隔4秒
                    timer = setInterval(function () {
                            iNow++;
                            bannerRun();
                        }, 4000
                    )
                }

                bannerAutoRun();

                //移动上面去停止，移动出来继续轮播
                function hoverChangeRun(ele) {
                    ele.hover(function () {
                            clearInterval(timer);
                        }, function () {
                            bannerAutoRun();
                        }
                    );
                }

                hoverChangeRun($_banner.find('.item-pic'));
                hoverChangeRun($_pagination.find('.pagination-item'));
                hoverChangeRun($_bannerWrap.find('.carousel-control'));

                function hoverActive(index) { //切换时改变状态
                    $_banner.find('.item').eq(index).addClass('slide-active').siblings().removeClass('slide-active');
                    $_pagination.find('.pagination-item').eq(index - 1).addClass('active').siblings().removeClass('active');
                }

                function bannerRun() { //点击切换图片
                    if (iNow > length) {
                        $_banner.finish().animate({left: -iNow * windowWidth}, 300, function () {
                            $_banner.css({left: -1 * windowWidth});
                        });
                        iNow = 1;
                    } else if (iNow < 1) {
                        $_banner.finish().animate({left: -iNow * windowWidth}, 500, function () {
                            $_banner.css({left: -length * windowWidth});
                        });
                        iNow = length;
                    } else {
                        $_banner.finish().animate({left: -iNow * windowWidth}, 300);
                    }
                    hoverActive(iNow);
                }
            }

            banner();
        })
    </script>
    <div class="banner-right-box">
        <a class="banner-right-item t-all" href="javascript:void(0);"><img
                    src="upload/ad/2018/04-09/26c1fa2220802a0d27beee0991d8c4d1.jpg" alt=""></a>
        <a class="banner-right-item t-all" href="javascript:void(0);"><img
                    src="upload/ad/2018/04-09/8163831b208ddd86d7f12f97277b4dc4.jpg" alt=""></a>
    </div>
</div>

<div class="adv3 w1224 clearfix">
    <a class="recommend-brand t-all" href="javascript:void(0);">
        <img class="w-100" src="upload/ad/2018/04-09/1109cd61a047c0a79b52e70669f2abe4.jpg" alt="" title="">
    </a>
    <a class="recommend-brand t-all" href="javascript:void(0);">
        <img class="w-100" src="upload/ad/2018/04-09/9d765b024000406a13f0f229ef9822e4.jpg" alt="" title="">
    </a>
    <a class="recommend-brand t-all" href="javascript:void(0);">
        <img class="w-100" src="upload/ad/2018/04-26/c1f8608955dfdc853c86c8d4679a550f.jpg" alt="" title="">
    </a>
</div>

<a href="javascript:void(0);" class="adver_line">
    <img class="w-100" src="upload/ad/2018/07-05/4e2631e39c39b248343c27bb1897b1ba.jpg" alt="">
</a>
<div class="floor floor1 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 手机</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/32.html"> 手机通讯</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/33.html"> 运营商</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/34.html"> 手机配件</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/35.html"> 摄影摄像</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/36.html"> 数码配件</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/168.html"> 影音娱乐</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/177.html"> 电子教育</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/31.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-12/7e4c3ba078ec31d9bcd676ea617b2565.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/d5efa73bcea8524473e48bdef5bb1b17.jpg"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/1.html">
                <div class="googs-title ellipsis-1"> vivoX21 6GB + 128GB 4G...</div>
                <div class="googs-price ellipsis-1"> ￥2999.00</div>
                <div class="goods-pic"><img class="w-100" src="upload/goods/thumb/1/goods_thumb_1_0_400_400.png"
                                            alt=""></div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/13.html">
                <div class="googs-title ellipsis-1"> 【套餐赠耳机】HUAWEI / 华为 畅享8...</div>
                <div class="googs-price ellipsis-1"> ￥1699.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/13/goods_thumb_13_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/16.html">
                <div class="googs-title ellipsis-1"> 华为耳机原装手机 荣耀9 / 8 / v9 / p9...</div>
                <div class="googs-price ellipsis-1"> ￥48.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/16/goods_thumb_16_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/25.html">
                <div class="googs-title ellipsis-1"> 直降200元◆vivo Y85全面屏手机...</div>
                <div class="googs-price ellipsis-1"> ￥1598.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/25/goods_thumb_25_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/27.html">
                <div class="googs-title ellipsis-1"> Sony / 索尼 MDR - EX155AP ...</div>
                <div class="googs-price ellipsis-1"> ￥125.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/27/goods_thumb_27_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/28.html">
                <div class="googs-title ellipsis-1"> Apple 苹果 iPhone 6 手机...</div>
                <div class="googs-price ellipsis-1"> ￥1988.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/28/goods_thumb_28_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/30.html">
                <div class="googs-title ellipsis-1"> 中国移动 移动流量卡4g全国通用无限流量...</div>
                <div class="googs-price ellipsis-1"> ￥38.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/30/goods_thumb_30_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/34.html">
                <div class="googs-title ellipsis-1"> KOOLIFE 畅享6S手机壳 透明保护...</div>
                <div class="googs-price ellipsis-1"> ￥15.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/34/goods_thumb_34_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/35.html">
                <div class="googs-title ellipsis-1"> GoPro HERO 6 Black 运...</div>
                <div class="googs-price ellipsis-1"> ￥3398.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/35/goods_thumb_35_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/48.html">
                <div class="googs-title ellipsis-1"> 国家地理（National Geogra...</div>
                <div class="googs-price ellipsis-1"> ￥1699.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/48/goods_thumb_48_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/49.html">
                <div class="googs-title ellipsis-1"> 三星（SAMSUNG）存储卡128GB ...</div>
                <div class="googs-price ellipsis-1"> ￥219.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/49/goods_thumb_49_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/52.html">
                <div class="googs-title ellipsis-1"> 【官方旗舰店】广州电信光纤宽带新装100...</div>
                <div class="googs-price ellipsis-1"> ￥399.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/52/goods_thumb_52_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/54.html">
                <div class="googs-title ellipsis-1"> 【北京移动】7天芒果TV会员 1GB流量...</div>
                <div class="googs-price ellipsis-1"> ￥9.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/54/goods_thumb_54_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/55.html">
                <div class="googs-title ellipsis-1"> 中国移动198号段 免预存 198号码1...</div>
                <div class="googs-price ellipsis-1"> ￥58.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/55/goods_thumb_55_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/59.html">
                <div class="googs-title ellipsis-1"> 亿色（ESR）华为p10钢化膜 p10手...</div>
                <div class="googs-price ellipsis-1"> ￥19.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/59/goods_thumb_59_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/62.html">
                <div class="googs-title ellipsis-1"> 闪迪（SanDisk）A1 32GB 读...</div>
                <div class="googs-price ellipsis-1"> ￥69.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/62/goods_thumb_62_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/65.html">
                <div class="googs-title ellipsis-1"> 绿联Type - C转HDMI / VGA转换器...</div>
                <div class="googs-price ellipsis-1"> ￥399.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/65/goods_thumb_65_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/69.html">
                <div class="googs-title ellipsis-1"> 罗马仕（ROMOSS）HO20锂聚合物 ...</div>
                <div class="googs-price ellipsis-1"> ￥99.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/69/goods_thumb_69_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/70.html">
                <div class="googs-title ellipsis-1"> 索尼（SONY）黑卡DSC - RX100M...</div>
                <div class="googs-price ellipsis-1"> ￥5789.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/70/goods_thumb_70_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/71.html">
                <div class="googs-title ellipsis-1"> 佳能（Canon）EOS 80D 单反套...</div>
                <div class="googs-price ellipsis-1"> ￥8498.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/71/goods_thumb_71_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/73.html">
                <div class="googs-title ellipsis-1"> 爱国者（aigo） 数码相框DPF83 ...</div>
                <div class="googs-price ellipsis-1"> ￥299.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/73/goods_thumb_73_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/74.html">
                <div class="googs-title ellipsis-1"> 广西移动 手机 话费充值 50元 快充直...</div>
                <div class="googs-price ellipsis-1"> ￥9.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/74/goods_thumb_74_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/75.html">
                <div class="googs-title ellipsis-1"> 大疆 DJI Ronin - M 新如影 三...</div>
                <div class="googs-price ellipsis-1"> ￥6999.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/75/goods_thumb_75_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/79.html">
                <div class="googs-title ellipsis-1"> 【新品上市】Samsung / 三星 Gal...</div>
                <div class="googs-price ellipsis-1"> ￥2999.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/79/goods_thumb_79_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/114.html">
                <div class="googs-title ellipsis-1"> 荣耀 畅玩6 2GB + 16GB 金色 全...</div>
                <div class="googs-price ellipsis-1"> ￥599.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/114/goods_thumb_114_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/141.html">
                <div class="googs-title ellipsis-1"> 广西移动官方 话费充值 30元 快充 直...</div>
                <div class="googs-price ellipsis-1"> ￥29.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/141/goods_thumb_141_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/142.html">
                <div class="googs-title ellipsis-1"> 广东联通官方充值全国手机话费100元快速...</div>
                <div class="googs-price ellipsis-1"> ￥99.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/142/goods_thumb_142_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/147.html">
                <div class="googs-title ellipsis-1"> 掌阅iReader plus6.8英寸墨...</div>
                <div class="googs-price ellipsis-1"> ￥999.99</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/147/goods_thumb_147_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/210.html">
                <div class="googs-title ellipsis-1"> 苹果7钢化膜iphone8plus手机7...</div>
                <div class="googs-price ellipsis-1"> ￥13.80</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/210/goods_thumb_210_0_400_400.jpeg" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -2336.74px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/1.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/1/goods_thumb_1_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> vivoX21 6GB + 128. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/16.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/16/goods_thumb_16_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 华为耳机原装手机 荣耀9 / 8 /...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 48.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/25.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/25/goods_thumb_25_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 直降200元◆vivo Y85...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1598.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/28.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/28/goods_thumb_28_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Apple 苹果 iPhone...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1988.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/34.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/34/goods_thumb_34_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> KOOLIFE 畅享6S手机壳...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 15.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/39.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/39/goods_thumb_39_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 自动发货 steam 充值卡5...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 100.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/48.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/48/goods_thumb_48_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 国家地理（National G...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/49.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/49/goods_thumb_49_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 三星（SAMSUNG）存储卡1...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 219.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/54.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/54/goods_thumb_54_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【北京移动】7天芒果TV会员 ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 9.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/59.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/59/goods_thumb_59_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 亿色（ESR）华为p10钢化膜...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 19.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/62.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/62/goods_thumb_62_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 闪迪（SanDisk）A1 3. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 69.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/65.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/65/goods_thumb_65_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 绿联Type - C转HDMI / V...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/69.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/69/goods_thumb_69_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 罗马仕（ROMOSS）HO20...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/71.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/71/goods_thumb_71_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 佳能（Canon）EOS 80. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 8498.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/73.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/73/goods_thumb_73_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 爱国者（aigo） 数码相框D...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 299.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/74.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/74/goods_thumb_74_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 广西移动 手机 话费充值 50. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 9.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/75.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/75/goods_thumb_75_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 大疆 DJI Ronin - M ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 6999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/79.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/79/goods_thumb_79_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【新品上市】Samsung / 三...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/141.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/141/goods_thumb_141_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 广西移动官方 话费充值 30元...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 29.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/142.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/142/goods_thumb_142_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 广东联通官方充值全国手机话费1...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/145.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/145/goods_thumb_145_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Huawei / 华为 nova ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2599.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/147.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/147/goods_thumb_147_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 掌阅iReader plus6...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 999.99</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/210.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/210/goods_thumb_210_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 苹果7钢化膜iphone8pl...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 13.80</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/1.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/1/goods_thumb_1_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> vivoX21 6GB + 128. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/16.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/16/goods_thumb_16_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 华为耳机原装手机 荣耀9 / 8 /...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 48.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/25.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/25/goods_thumb_25_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 直降200元◆vivo Y85...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1598.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/28.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/28/goods_thumb_28_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Apple 苹果 iPhone...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1988.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/34.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/34/goods_thumb_34_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> KOOLIFE 畅享6S手机壳...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 15.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/39.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/39/goods_thumb_39_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 自动发货 steam 充值卡5...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 100.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/48.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/48/goods_thumb_48_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 国家地理（National G...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/49.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/49/goods_thumb_49_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 三星（SAMSUNG）存储卡1...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 219.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/54.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/54/goods_thumb_54_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【北京移动】7天芒果TV会员 ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 9.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/59.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/59/goods_thumb_59_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 亿色（ESR）华为p10钢化膜...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 19.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/62.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/62/goods_thumb_62_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 闪迪（SanDisk）A1 3. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 69.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/65.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/65/goods_thumb_65_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 绿联Type - C转HDMI / V...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/69.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/69/goods_thumb_69_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 罗马仕（ROMOSS）HO20...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/71.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/71/goods_thumb_71_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 佳能（Canon）EOS 80. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 8498.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/73.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/73/goods_thumb_73_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 爱国者（aigo） 数码相框D...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 299.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/74.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/74/goods_thumb_74_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 广西移动 手机 话费充值 50. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 9.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/75.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/75/goods_thumb_75_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 大疆 DJI Ronin - M ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 6999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/79.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/79/goods_thumb_79_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【新品上市】Samsung / 三...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/141.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/141/goods_thumb_141_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 广西移动官方 话费充值 30元...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 29.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/142.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/142/goods_thumb_142_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 广东联通官方充值全国手机话费1...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/145.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/145/goods_thumb_145_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Huawei / 华为 nova ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2599.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/147.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/147/goods_thumb_147_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 掌阅iReader plus6...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 999.99</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/210.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/210/goods_thumb_210_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 苹果7钢化膜iphone8pl...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 13.80</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/31.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
<div class="floor floor2 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 服饰</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/13.html"> 女装</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/23.html"> 男装</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/26.html"> 内衣</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/27.html"> 配饰</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/28.html"> 童装</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/12.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-13/4335611d9ab78af07e93ff2a31d2c895.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/5bd662f577fa35e1ab93d1b55c9e89ba.jpg"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/7.html">
                <div class="googs-title ellipsis-1"> 哥弟女装2018春季新款口袋趣味图案贴标...</div>
                <div class="googs-price ellipsis-1"> ￥480.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/7/goods_thumb_7_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/21.html">
                <div class="googs-title ellipsis-1"> 花花公子韩版裤子男潮原宿风bf百搭青少年...</div>
                <div class="googs-price ellipsis-1"> ￥130.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/21/goods_thumb_21_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/23.html">
                <div class="googs-title ellipsis-1"> 帕森（PARZIN）太阳镜女款墨镜 复古...</div>
                <div class="googs-price ellipsis-1"> ￥89.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/23/goods_thumb_23_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/66.html">
                <div class="googs-title ellipsis-1"> 图片上传123</div>
                <div class="googs-price ellipsis-1"> ￥90.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/66/goods_thumb_66_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/94.html">
                <div class="googs-title ellipsis-1"> 芈儿2018新款春季女装百搭修身显瘦纯棉...</div>
                <div class="googs-price ellipsis-1"> ￥79.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/94/goods_thumb_94_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/95.html">
                <div class="googs-title ellipsis-1"> 2018新款大码女装春装修身显瘦中长款时...</div>
                <div class="googs-price ellipsis-1"> ￥268.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/95/goods_thumb_95_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/96.html">
                <div class="googs-title ellipsis-1"> 花花公子长袖衬衫男韩版修身免烫纯色潮流工...</div>
                <div class="googs-price ellipsis-1"> ￥259.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/96/goods_thumb_96_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/97.html">
                <div class="googs-title ellipsis-1"> 艾路丝婷短袖T恤女上衣印花圆领女士体恤衫...</div>
                <div class="googs-price ellipsis-1"> ￥89.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/97/goods_thumb_97_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/98.html">
                <div class="googs-title ellipsis-1"> 茵曼女装秋冬新款纯棉文艺范七分袖宽松衬衣...</div>
                <div class="googs-price ellipsis-1"> ￥159.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/98/goods_thumb_98_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/99.html">
                <div class="googs-title ellipsis-1"> 2018夏装新款女上衣系带印花喇叭袖粉色...</div>
                <div class="googs-price ellipsis-1"> ￥189.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/99/goods_thumb_99_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/100.html">
                <div class="googs-title ellipsis-1"> 迪尔绒莎夏季宽松百搭防晒衣女大码长袖薄款...</div>
                <div class="googs-price ellipsis-1"> ￥118.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/100/goods_thumb_100_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/101.html">
                <div class="googs-title ellipsis-1"> 花花公子休闲裤男春秋修身直筒裤子男士休闲...</div>
                <div class="googs-price ellipsis-1"> ￥139.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/101/goods_thumb_101_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/119.html">
                <div class="googs-title ellipsis-1"> 南极人 牛仔短裤女2018夏季新款韩版高...</div>
                <div class="googs-price ellipsis-1"> ￥89.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/119/goods_thumb_119_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/125.html">
                <div class="googs-title ellipsis-1"> 面料菱形肌理感针织连衣裙</div>
                <div class="googs-price ellipsis-1"> ￥1490.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/125/goods_thumb_125_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/128.html">
                <div class="googs-title ellipsis-1"> 男士速干抗皱抽象字母印花短袖T恤</div>
                <div class="googs-price ellipsis-1"> ￥78.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/128/goods_thumb_128_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/129.html">
                <div class="googs-title ellipsis-1"> 优洛莎 2018夏季新款时尚百搭蕾丝镂空...</div>
                <div class="googs-price ellipsis-1"> ￥88.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/129/goods_thumb_129_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/135.html">
                <div class="googs-title ellipsis-1"> 月缦 2018新款礼服A字裙短袖少女中国...</div>
                <div class="googs-price ellipsis-1"> ￥218.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/135/goods_thumb_135_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/140.html">
                <div class="googs-title ellipsis-1"> 歆觅带胸垫吊带背心女修身瑜伽运动无钢圈吊...</div>
                <div class="googs-price ellipsis-1"> ￥59.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/140/goods_thumb_140_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/144.html">
                <div class="googs-title ellipsis-1"> 高梵羽绒服女中长款2017冬季韩版修身女...</div>
                <div class="googs-price ellipsis-1"> ￥459.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/144/goods_thumb_144_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/146.html">
                <div class="googs-title ellipsis-1"> 恒源祥女装风衣女长款2017秋季新款英伦...</div>
                <div class="googs-price ellipsis-1"> ￥439.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/146/goods_thumb_146_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/151.html">
                <div class="googs-title ellipsis-1"> 私柜 情趣内衣女骚性感睡衣制服诱惑套装蕾...</div>
                <div class="googs-price ellipsis-1"> ￥89.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/151/goods_thumb_151_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/153.html">
                <div class="googs-title ellipsis-1"> 积分兑换维尼小熊手套</div>
                <div class="googs-price ellipsis-1"> ￥99.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/153/goods_thumb_153_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/155.html">
                <div class="googs-title ellipsis-1"> 保安服衬衣衬衫长袖 夏装上衣警服 警卫酒...</div>
                <div class="googs-price ellipsis-1"> ￥99.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/155/goods_thumb_155_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/157.html">
                <div class="googs-title ellipsis-1"> 霁蓝 牛仔裤男2018春季新款长裤韩版猫...</div>
                <div class="googs-price ellipsis-1"> ￥136.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/157/goods_thumb_157_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/162.html">
                <div class="googs-title ellipsis-1"> 北极绒牛仔短裤男七分裤破洞韩版修身夏天直...</div>
                <div class="googs-price ellipsis-1"> ￥89.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/162/goods_thumb_162_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/165.html">
                <div class="googs-title ellipsis-1"> 红豆（Hodo）夹克男外套男春款时尚休闲...</div>
                <div class="googs-price ellipsis-1"> ￥199.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/165/goods_thumb_165_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/169.html">
                <div class="googs-title ellipsis-1"> 花花公子PLAYBOY 风衣男士秋冬时尚...</div>
                <div class="googs-price ellipsis-1"> ￥186.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/169/goods_thumb_169_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/170.html">
                <div class="googs-title ellipsis-1"> 吉普盾 秋季薄款休闲摄影钓鱼马甲男背心马...</div>
                <div class="googs-price ellipsis-1"> ￥89.10</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/170/goods_thumb_170_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/171.html">
                <div class="googs-title ellipsis-1"> 睡衣女士纯棉短袖夏季红豆居家春大码全棉甜...</div>
                <div class="googs-price ellipsis-1"> ￥128.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/171/goods_thumb_171_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/173.html">
                <div class="googs-title ellipsis-1"> 杉杉（FIRS）男士免烫商务防皱韩版修身...</div>
                <div class="googs-price ellipsis-1"> ￥179.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/173/goods_thumb_173_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/175.html">
                <div class="googs-title ellipsis-1"> 红豆（Hodo）毛衣男V领套头加厚 冬季...</div>
                <div class="googs-price ellipsis-1"> ￥299.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/175/goods_thumb_175_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/177.html">
                <div class="googs-title ellipsis-1"> GENANX闪电潮牌男士拼接格子短袖衬衫...</div>
                <div class="googs-price ellipsis-1"> ￥198.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/177/goods_thumb_177_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/179.html">
                <div class="googs-title ellipsis-1"> BXMAN宽松男士内裤平角裤纯棉梭织阿罗...</div>
                <div class="googs-price ellipsis-1"> ￥99.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/179/goods_thumb_179_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/183.html">
                <div class="googs-title ellipsis-1"> 幻薇少女文胸运动文胸学生内衣发育期初中生...</div>
                <div class="googs-price ellipsis-1"> ￥59.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/183/goods_thumb_183_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/185.html">
                <div class="googs-title ellipsis-1"> 恒源祥袜子 男士6双装 男士纯棉四季款 ...</div>
                <div class="googs-price ellipsis-1"> ￥49.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/185/goods_thumb_185_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/187.html">
                <div class="googs-title ellipsis-1"> 3对硅胶游泳防水透气乳头贴防凸点胸贴防走...</div>
                <div class="googs-price ellipsis-1"> ￥14.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/187/goods_thumb_187_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/191.html">
                <div class="googs-title ellipsis-1"> 南极人保暖内衣男女士蓄热加厚加绒黄金暖绒...</div>
                <div class="googs-price ellipsis-1"> ￥86.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/191/goods_thumb_191_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/192.html">
                <div class="googs-title ellipsis-1"> 桑扶兰 薄款高侧比大罩杯聚拢性感文胸双胶...</div>
                <div class="googs-price ellipsis-1"> ￥159.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/192/goods_thumb_192_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/196.html">
                <div class="googs-title ellipsis-1"> 花花公子短袖t恤男棉质翻领半袖衫中年男士...</div>
                <div class="googs-price ellipsis-1"> ￥199.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/196/goods_thumb_196_0_400_400.jpeg" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -3955.1px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/20.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/20/goods_thumb_20_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 无钢圈文胸少女发育期胸罩初中高...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 14.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/21.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/21/goods_thumb_21_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 花花公子韩版裤子男潮原宿风bf...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 130.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/23.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/23/goods_thumb_23_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 帕森（PARZIN）太阳镜女款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/33.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/33/goods_thumb_33_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 欧莱雅(LOREAL)男士8重...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/94.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/94/goods_thumb_94_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 芈儿2018新款春季女装百搭修...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 79.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/99.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/99/goods_thumb_99_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 2018夏装新款女上衣系带印花...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 189.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/113.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/113/goods_thumb_113_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 南极人 polo衫男 翻领短袖...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 129.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/117.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/117/goods_thumb_117_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 套头卫衣女秋装新款短纯色连帽衫...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 125.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/119.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/119/goods_thumb_119_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 南极人 牛仔短裤女2018夏季...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/124.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/124/goods_thumb_124_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 荻尼菲夏季牛仔裤女2018新款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 86.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/125.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/125/goods_thumb_125_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 面料菱形肌理感针织连衣裙</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1490.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/126.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/126/goods_thumb_126_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 水墨佳人中老年女装2018春装...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 169.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/128.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/128/goods_thumb_128_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 男士速干抗皱抽象字母印花短袖T...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 78.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/131.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/131/goods_thumb_131_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 子婳打底裤女2018新款大码春...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 79.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/138.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/138/goods_thumb_138_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 模丽秀婚纱2017新款韩版一字...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 368.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/144.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/144/goods_thumb_144_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 高梵羽绒服女中长款2017冬季...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 459.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/149.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/149/goods_thumb_149_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 依曼柔文胸套装 无钢圈无痕女士...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/150.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/150/goods_thumb_150_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 维慕诗情侣纯棉 睡衣女秋 长袖...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 108.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/153.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/153/goods_thumb_153_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 积分兑换维尼小熊手套</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/155.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/155/goods_thumb_155_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 保安服衬衣衬衫长袖 夏装上衣警...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/156.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/156/goods_thumb_156_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 森马 Semir T恤 短袖T...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 79.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/157.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/157/goods_thumb_157_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 霁蓝 牛仔裤男2018春季新款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 136.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/160.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/160/goods_thumb_160_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 美特斯邦威 Meters Bo...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 119.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/164.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/164/goods_thumb_164_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 2017年新款花花公子时尚休闲...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 188.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/166.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/166/goods_thumb_166_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 美特斯邦威Metersbonw...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 129.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/169.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/169/goods_thumb_169_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 花花公子PLAYBOY 风衣男...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 186.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/170.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/170/goods_thumb_170_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 吉普盾 秋季薄款休闲摄影钓鱼马...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.10</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/172.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/172/goods_thumb_172_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 七匹狼休闲单西 春季新款 男士...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/174.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/174/goods_thumb_174_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 茵曼A字半身裙</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 98.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/175.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/175/goods_thumb_175_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 红豆（Hodo）毛衣男V领套头...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 299.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/176.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/176/goods_thumb_176_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 花花公子夏季中老年人男装短袖t...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 158.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/177.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/177/goods_thumb_177_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> GENANX闪电潮牌男士拼接格...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 198.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/178.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/178/goods_thumb_178_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雅鹿中老年男士羽绒裤秋冬季保暖...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 298.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/179.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/179/goods_thumb_179_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> BXMAN宽松男士内裤平角裤纯...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/182.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/182/goods_thumb_182_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 浪莎（LangSha）女士内裤...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 55.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/183.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/183/goods_thumb_183_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 幻薇少女文胸运动文胸学生内衣发...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 59.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/186.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/186/goods_thumb_186_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 恒源祥打底裤袜女连脚【2条装】...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 49.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/187.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/187/goods_thumb_187_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 3对硅胶游泳防水透气乳头贴防凸...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 14.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/188.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/188/goods_thumb_188_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 欧迪鸟品牌比基尼三件套2018...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1759.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/190.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/190/goods_thumb_190_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 三枪秋衣秋裤男女情侣纯棉加厚圆...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/192.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/192/goods_thumb_192_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 桑扶兰 薄款高侧比大罩杯聚拢性...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 159.00</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/20.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/20/goods_thumb_20_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 无钢圈文胸少女发育期胸罩初中高...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 14.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/21.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/21/goods_thumb_21_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 花花公子韩版裤子男潮原宿风bf...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 130.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/23.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/23/goods_thumb_23_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 帕森（PARZIN）太阳镜女款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/33.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/33/goods_thumb_33_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 欧莱雅(LOREAL)男士8重...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/94.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/94/goods_thumb_94_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 芈儿2018新款春季女装百搭修...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 79.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/99.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/99/goods_thumb_99_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 2018夏装新款女上衣系带印花...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 189.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/113.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/113/goods_thumb_113_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 南极人 polo衫男 翻领短袖...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 129.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/117.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/117/goods_thumb_117_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 套头卫衣女秋装新款短纯色连帽衫...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 125.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/119.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/119/goods_thumb_119_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 南极人 牛仔短裤女2018夏季...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/124.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/124/goods_thumb_124_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 荻尼菲夏季牛仔裤女2018新款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 86.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/125.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/125/goods_thumb_125_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 面料菱形肌理感针织连衣裙</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1490.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/126.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/126/goods_thumb_126_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 水墨佳人中老年女装2018春装...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 169.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/128.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/128/goods_thumb_128_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 男士速干抗皱抽象字母印花短袖T...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 78.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/131.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/131/goods_thumb_131_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 子婳打底裤女2018新款大码春...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 79.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/138.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/138/goods_thumb_138_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 模丽秀婚纱2017新款韩版一字...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 368.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/144.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/144/goods_thumb_144_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 高梵羽绒服女中长款2017冬季...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 459.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/149.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/149/goods_thumb_149_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 依曼柔文胸套装 无钢圈无痕女士...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/150.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/150/goods_thumb_150_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 维慕诗情侣纯棉 睡衣女秋 长袖...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 108.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/153.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/153/goods_thumb_153_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 积分兑换维尼小熊手套</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/155.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/155/goods_thumb_155_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 保安服衬衣衬衫长袖 夏装上衣警...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/156.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/156/goods_thumb_156_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 森马 Semir T恤 短袖T...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 79.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/157.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/157/goods_thumb_157_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 霁蓝 牛仔裤男2018春季新款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 136.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/160.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/160/goods_thumb_160_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 美特斯邦威 Meters Bo...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 119.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/164.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/164/goods_thumb_164_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 2017年新款花花公子时尚休闲...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 188.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/166.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/166/goods_thumb_166_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 美特斯邦威Metersbonw...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 129.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/169.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/169/goods_thumb_169_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 花花公子PLAYBOY 风衣男...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 186.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/170.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/170/goods_thumb_170_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 吉普盾 秋季薄款休闲摄影钓鱼马...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.10</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/172.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/172/goods_thumb_172_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 七匹狼休闲单西 春季新款 男士...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/174.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/174/goods_thumb_174_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 茵曼A字半身裙</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 98.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/175.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/175/goods_thumb_175_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 红豆（Hodo）毛衣男V领套头...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 299.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/176.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/176/goods_thumb_176_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 花花公子夏季中老年人男装短袖t...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 158.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/177.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/177/goods_thumb_177_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> GENANX闪电潮牌男士拼接格...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 198.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/178.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/178/goods_thumb_178_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雅鹿中老年男士羽绒裤秋冬季保暖...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 298.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/179.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/179/goods_thumb_179_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> BXMAN宽松男士内裤平角裤纯...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/182.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/182/goods_thumb_182_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 浪莎（LangSha）女士内裤...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 55.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/183.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/183/goods_thumb_183_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 幻薇少女文胸运动文胸学生内衣发...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 59.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/186.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/186/goods_thumb_186_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 恒源祥打底裤袜女连脚【2条装】...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 49.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/187.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/187/goods_thumb_187_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 3对硅胶游泳防水透气乳头贴防凸...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 14.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/188.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/188/goods_thumb_188_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 欧迪鸟品牌比基尼三件套2018...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1759.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/190.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/190/goods_thumb_190_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 三枪秋衣秋裤男女情侣纯棉加厚圆...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/192.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/192/goods_thumb_192_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 桑扶兰 薄款高侧比大罩杯聚拢性...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 159.00</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/12.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
<div class="floor floor3 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 电脑</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/38.html"> 电脑整机</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/39.html"> 电脑配件</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/40.html"> 外设产品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/41.html"> 游戏设备</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/42.html"> 网络产品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/43.html"> 办公设备</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/44.html"> 文具耗材</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/37.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-12/3181c862e182923170dcf1e15bc0a2cc.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/2174905d797ce41bd4191269dae63118.jpg"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/37.html">
                <div class="googs-title ellipsis-1"> 罗技（Logitech）G502 炫光自...</div>
                <div class="googs-price ellipsis-1"> ￥399.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/37/goods_thumb_37_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/38.html">
                <div class="googs-title ellipsis-1"> 雷蛇（Razer）BlackWidow ...</div>
                <div class="googs-price ellipsis-1"> ￥599.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/38/goods_thumb_38_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/51.html">
                <div class="googs-title ellipsis-1"> Asus / 华硕 商务本 _A580ur笔...</div>
                <div class="googs-price ellipsis-1"> ￥3999.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/51/goods_thumb_51_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/58.html">
                <div class="googs-title ellipsis-1"> GPD win10掌上游戏机PSP掌机P...</div>
                <div class="googs-price ellipsis-1"> ￥1999.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/58/goods_thumb_58_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/60.html">
                <div class="googs-title ellipsis-1"> GPD XD plus翻盖掌机PSP安卓...</div>
                <div class="googs-price ellipsis-1"> ￥1069.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/60/goods_thumb_60_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/72.html">
                <div class="googs-title ellipsis-1"> 宁美国度 AOC I2479VXHD 2. ..</div>
                <div class="googs-price ellipsis-1"> ￥1599.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/72/goods_thumb_72_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/76.html">
                <div class="googs-title ellipsis-1"> 戴尔（DELL） U2417H 23.8...</div>
                <div class="googs-price ellipsis-1"> ￥1399.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/76/goods_thumb_76_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/78.html">
                <div class="googs-title ellipsis-1"> 华硕（ASUS）PRIME Z370 - A...</div>
                <div class="googs-price ellipsis-1"> ￥1699.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/78/goods_thumb_78_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/82.html">
                <div class="googs-title ellipsis-1"> 和冠（Wacom）PTH - 660 / K0 -...</div>
                <div class="googs-price ellipsis-1"> ￥2099.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/82/goods_thumb_82_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/84.html">
                <div class="googs-title ellipsis-1"> 罗技（Logitech）Pro C920...</div>
                <div class="googs-price ellipsis-1"> ￥399.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/84/goods_thumb_84_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/85.html">
                <div class="googs-title ellipsis-1"> 索尼（SONY）【PS4 Pro国行主机...</div>
                <div class="googs-price ellipsis-1"> ￥3499.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/85/goods_thumb_85_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/86.html">
                <div class="googs-title ellipsis-1"> 达尔优（dareu）EH722电竞版 头...</div>
                <div class="googs-price ellipsis-1"> ￥119.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/86/goods_thumb_86_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/89.html">
                <div class="googs-title ellipsis-1"> TP - LINK TL - WDR5620 1. ..</div>
                <div class="googs-price ellipsis-1"> ￥109.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/89/goods_thumb_89_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/90.html">
                <div class="googs-title ellipsis-1"> 爱普生（EPSON）CB - S41 办公 ...</div>
                <div class="googs-price ellipsis-1"> ￥2599.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/90/goods_thumb_90_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/115.html">
                <div class="googs-title ellipsis-1"> 包材商城 TRULY信利SC 991ES...</div>
                <div class="googs-price ellipsis-1"> ￥19.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/115/goods_thumb_115_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/217.html">
                <div class="googs-title ellipsis-1"> 多版本多规格苹果电脑</div>
                <div class="googs-price ellipsis-1"> ￥7788.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/217/goods_thumb_217_0_400_400.jpeg" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -172.452px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/2.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/2/goods_thumb_2_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 联想(Lenovo)一体机电脑...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 4999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/14.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/14/goods_thumb_14_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 戴尔(DELL)灵越AIO 2. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/51.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/51/goods_thumb_51_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Asus / 华硕 商务本 _A5...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/76.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/76/goods_thumb_76_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 戴尔（DELL） U2417H...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/78.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/78/goods_thumb_78_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 华硕（ASUS）PRIME Z...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/84.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/84/goods_thumb_84_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 罗技（Logitech）Pro...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/85.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/85/goods_thumb_85_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 索尼（SONY）【PS4 Pr...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3499.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/89.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/89/goods_thumb_89_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> TP - LINK TL - WDR5...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 109.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/91.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/91/goods_thumb_91_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 绍泽文化 文房四宝毛笔书法套装...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/217.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/217/goods_thumb_217_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 多版本多规格苹果电脑</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 7788.00</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/2.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/2/goods_thumb_2_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 联想(Lenovo)一体机电脑...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 4999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/14.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/14/goods_thumb_14_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 戴尔(DELL)灵越AIO 2. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/51.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/51/goods_thumb_51_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Asus / 华硕 商务本 _A5...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/76.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/76/goods_thumb_76_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 戴尔（DELL） U2417H...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/78.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/78/goods_thumb_78_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 华硕（ASUS）PRIME Z...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/84.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/84/goods_thumb_84_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 罗技（Logitech）Pro...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/85.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/85/goods_thumb_85_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 索尼（SONY）【PS4 Pr...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3499.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/89.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/89/goods_thumb_89_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> TP - LINK TL - WDR5...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 109.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/91.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/91/goods_thumb_91_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 绍泽文化 文房四宝毛笔书法套装...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/217.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/217/goods_thumb_217_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 多版本多规格苹果电脑</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 7788.00</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/37.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
<div class="floor floor4 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 家居</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/45.html"> 厨具</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/46.html"> 家纺</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/48.html"> 灯具</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/49.html"> 家具</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/47.html"> 生活日品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/50.html"> 家装主材</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/51.html"> 厨房卫浴</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/323.html"> 装修定制</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/30.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-12/0709c98a383426ecef6bec431a1fee1f.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/bf516c7032ac6e700b658dc71cb0daed.png"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/26.html">
                <div class="googs-title ellipsis-1"> 雷士（NVC） 【满1699减550】雷...</div>
                <div class="googs-price ellipsis-1"> ￥3099.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/26/goods_thumb_26_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/41.html">
                <div class="googs-title ellipsis-1"> 天堂伞 全遮光黑胶转印宇宙星空三折晴雨伞...</div>
                <div class="googs-price ellipsis-1"> ￥59.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/41/goods_thumb_41_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/44.html">
                <div class="googs-title ellipsis-1"> LUOLAI罗莱家纺 229纱支纯棉四件...</div>
                <div class="googs-price ellipsis-1"> ￥999.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/44/goods_thumb_44_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/46.html">
                <div class="googs-title ellipsis-1"> 雅琼 沙发北欧布艺沙发可拆洗小户型三人位...</div>
                <div class="googs-price ellipsis-1"> ￥1699.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/46/goods_thumb_46_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/47.html">
                <div class="googs-title ellipsis-1"> 巢里巢外 电表箱装饰画推拉式 配电箱定制...</div>
                <div class="googs-price ellipsis-1"> ￥208.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/47/goods_thumb_47_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/195.html">
                <div class="googs-title ellipsis-1"> 贝尔（BBL） 贝尔地板 实木 地板 东...</div>
                <div class="googs-price ellipsis-1"> ￥209.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/195/goods_thumb_195_0_400_400.png" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -171.785px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/4.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/4/goods_thumb_4_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 苏泊尔28cm玻璃盖火红点煎锅...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 169.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/26.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/26/goods_thumb_26_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雷士（NVC） 【满1699减...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3099.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/41.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/41/goods_thumb_41_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 天堂伞 全遮光黑胶转印宇宙星空...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 59.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/44.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/44/goods_thumb_44_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> LUOLAI罗莱家纺 229纱...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/46.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/46/goods_thumb_46_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雅琼 沙发北欧布艺沙发可拆洗小...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/194.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/194/goods_thumb_194_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 尚品宅配橱柜定制 欧式风格整体...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2000.00</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/4.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/4/goods_thumb_4_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 苏泊尔28cm玻璃盖火红点煎锅...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 169.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/26.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/26/goods_thumb_26_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雷士（NVC） 【满1699减...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 3099.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/41.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/41/goods_thumb_41_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 天堂伞 全遮光黑胶转印宇宙星空...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 59.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/44.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/44/goods_thumb_44_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> LUOLAI罗莱家纺 229纱...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 999.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/46.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/46/goods_thumb_46_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雅琼 沙发北欧布艺沙发可拆洗小...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/194.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/194/goods_thumb_194_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 尚品宅配橱柜定制 欧式风格整体...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2000.00</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/30.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
<div class="floor floor5 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 食品</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/433.html"> 进口食品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/116.html"> 新鲜水果</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/117.html"> 休闲零食</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/118.html"> 蔬菜蛋品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/119.html"> 精选肉类</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/120.html"> 中外名酒</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/55.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-12/a4129d96e71c30563c724aecd5d9e44b.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/97136712e30ea25217ca534e8a14328e.jpg"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/6.html">
                <div class="googs-title ellipsis-1"> 沃隆 每日坚果 休闲零食 坚果炒货 扁桃...</div>
                <div class="googs-price ellipsis-1"> ￥139.00</div>
                <div class="goods-pic"><img class="w-100" src="upload/goods/thumb/6/goods_thumb_6_0_400_400.png"
                                            alt=""></div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/31.html">
                <div class="googs-title ellipsis-1"> 大青皮绿芒果新鲜水果大青芒果玉芒果生鲜1...</div>
                <div class="googs-price ellipsis-1"> ￥15.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/31/goods_thumb_31_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/32.html">
                <div class="googs-title ellipsis-1"> 【雅安馆】四川雅安 红心猕猴桃 15个装...</div>
                <div class="googs-price ellipsis-1"> ￥20.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/32/goods_thumb_32_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/36.html">
                <div class="googs-title ellipsis-1"> 雀巢（Nestle）脆脆鲨 休闲零食 威...</div>
                <div class="googs-price ellipsis-1"> ￥25.70</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/36/goods_thumb_36_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/112.html">
                <div class="googs-title ellipsis-1"> DIY儿童饭团模 创意兔子海豚饭团模具4...</div>
                <div class="googs-price ellipsis-1"> ￥12.50</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/112/goods_thumb_112_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/116.html">
                <div class="googs-title ellipsis-1"> 劲仔小鱼 鱼干鱼仔 零食 香辣味 15g...</div>
                <div class="googs-price ellipsis-1"> ￥23.80</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/116/goods_thumb_116_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/154.html">
                <div class="googs-title ellipsis-1"> 小熊饼干990</div>
                <div class="googs-price ellipsis-1"> ￥35.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/154/goods_thumb_154_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/184.html">
                <div class="googs-title ellipsis-1"> 贵州茅乡酒 M10浓香型白酒 52度送礼...</div>
                <div class="googs-price ellipsis-1"> ￥159.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/184/goods_thumb_184_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/189.html">
                <div class="googs-title ellipsis-1"> 菲斯奈特黑牌起泡酒 西班牙CAVA产区F...</div>
                <div class="googs-price ellipsis-1"> ￥129.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/189/goods_thumb_189_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/219.html">
                <div class="googs-title ellipsis-1"> 零食大礼包</div>
                <div class="googs-price ellipsis-1"> ￥89.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/219/goods_thumb_219_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/220.html">
                <div class="googs-title ellipsis-1"> 好多多</div>
                <div class="googs-price ellipsis-1"> ￥29.90</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/220/goods_thumb_220_0_400_400.jpeg" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -168.094px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/6.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/6/goods_thumb_6_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 沃隆 每日坚果 休闲零食 坚果...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/31.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/31/goods_thumb_31_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 大青皮绿芒果新鲜水果大青芒果玉...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 15.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/32.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/32/goods_thumb_32_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【雅安馆】四川雅安 红心猕猴桃...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 20.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/36.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/36/goods_thumb_36_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雀巢（Nestle）脆脆鲨 休...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 25.70</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/112.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/112/goods_thumb_112_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> DIY儿童饭团模 创意兔子海豚...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 12.50</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/116.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/116/goods_thumb_116_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 劲仔小鱼 鱼干鱼仔 零食 香辣...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 23.80</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/189.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/189/goods_thumb_189_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 菲斯奈特黑牌起泡酒 西班牙CA...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 129.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/211.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/211/goods_thumb_211_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 绿鲜知 鲜香椿 香椿芽 约15...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 23.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/219.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/219/goods_thumb_219_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 零食大礼包</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/220.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/220/goods_thumb_220_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 好多多</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 29.90</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/6.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/6/goods_thumb_6_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 沃隆 每日坚果 休闲零食 坚果...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/31.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/31/goods_thumb_31_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 大青皮绿芒果新鲜水果大青芒果玉...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 15.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/32.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/32/goods_thumb_32_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【雅安馆】四川雅安 红心猕猴桃...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 20.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/36.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/36/goods_thumb_36_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 雀巢（Nestle）脆脆鲨 休...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 25.70</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/112.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/112/goods_thumb_112_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> DIY儿童饭团模 创意兔子海豚...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 12.50</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/116.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/116/goods_thumb_116_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 劲仔小鱼 鱼干鱼仔 零食 香辣...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 23.80</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/189.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/189/goods_thumb_189_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 菲斯奈特黑牌起泡酒 西班牙CA...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 129.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/211.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/211/goods_thumb_211_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 绿鲜知 鲜香椿 香椿芽 约15...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 23.90</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/219.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/219/goods_thumb_219_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 零食大礼包</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 89.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/220.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/220/goods_thumb_220_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 好多多</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 29.90</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/55.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
<div class="floor floor6 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 鞋类</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/57.html"> 时尚女鞋</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/58.html"> 潮流女包</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/570.html"> 男士鞋子</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/465.html"> 精品男包</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/473.html"> 功能箱包</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/485.html"> 珠宝首饰</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/495.html"> 时尚钟表</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/56.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-12/2a748189faba2a989ac0c9271318824c.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/27ee83779c467091df062e06edeb98b8.jpg"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/8.html">
                <div class="googs-title ellipsis-1"> 迪芙斯（D:FUSE）女鞋 牛皮革细跟露...</div>
                <div class="googs-price ellipsis-1"> ￥179.00</div>
                <div class="goods-pic"><img class="w-100" src="upload/goods/thumb/8/goods_thumb_8_0_400_400.png"
                                            alt=""></div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/40.html">
                <div class="googs-title ellipsis-1"> 梦特娇Montagut2018春季新款真...</div>
                <div class="googs-price ellipsis-1"> ￥799.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/40/goods_thumb_40_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/53.html">
                <div class="googs-title ellipsis-1"> 73Hours 天鹅小径 2018春季新...</div>
                <div class="googs-price ellipsis-1"> ￥139.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/53/goods_thumb_53_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/56.html">
                <div class="googs-title ellipsis-1"> CHARLES＆KEITH波士顿包CK2...</div>
                <div class="googs-price ellipsis-1"> ￥139.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/56/goods_thumb_56_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/63.html">
                <div class="googs-title ellipsis-1"> 阿迪达斯双肩包2018阿迪运动包背包男包...</div>
                <div class="googs-price ellipsis-1"> ￥128.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/63/goods_thumb_63_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/77.html">
                <div class="googs-title ellipsis-1"> 卓诗尼高跟鞋女2018春季新款浅口粗跟中...</div>
                <div class="googs-price ellipsis-1"> ￥296.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/77/goods_thumb_77_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/93.html">
                <div class="googs-title ellipsis-1"> 【积分兑换】百斯锐羽毛球包 男女单肩黄金...</div>
                <div class="googs-price ellipsis-1"> ￥13.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/93/goods_thumb_93_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/104.html">
                <div class="googs-title ellipsis-1"> 红谷HONGU单肩包女时尚休闲牛皮斜挎包...</div>
                <div class="googs-price ellipsis-1"> ￥399.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/104/goods_thumb_104_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/122.html">
                <div class="googs-title ellipsis-1"> 阿帕琦IK 手表镂空全自动夜光机械表 男...</div>
                <div class="googs-price ellipsis-1"> ￥199.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/122/goods_thumb_122_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/134.html">
                <div class="googs-title ellipsis-1"> 送给亲爱的】CASIO指针系列网红小红表...</div>
                <div class="googs-price ellipsis-1"> ￥299.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/134/goods_thumb_134_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/136.html">
                <div class="googs-title ellipsis-1"> 黄金(足金)六字大明咒戒指 计价</div>
                <div class="googs-price ellipsis-1"> ￥999.99</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/136/goods_thumb_136_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/139.html">
                <div class="googs-title ellipsis-1"> Rimowa / 日默瓦DELUXE电子标签...</div>
                <div class="googs-price ellipsis-1"> ￥7780.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/139/goods_thumb_139_0_400_400.png" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/148.html">
                <div class="googs-title ellipsis-1"> 乔比迈凯真皮休闲皮鞋系带运动男鞋子英伦风...</div>
                <div class="googs-price ellipsis-1"> ￥398.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/148/goods_thumb_148_0_400_400.jpeg" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -1248.09px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/8.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/8/goods_thumb_8_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 迪芙斯（D:FUSE）女鞋 牛...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 179.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/40.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/40/goods_thumb_40_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 梦特娇Montagut2018...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 799.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/53.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/53/goods_thumb_53_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 73Hours 天鹅小径 20. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/56.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/56/goods_thumb_56_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> CHARLES＆KEITH波士...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/63.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/63/goods_thumb_63_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 阿迪达斯双肩包2018阿迪运动...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 128.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/77.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/77/goods_thumb_77_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 卓诗尼高跟鞋女2018春季新款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 296.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/93.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/93/goods_thumb_93_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【积分兑换】百斯锐羽毛球包 男...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 13.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/104.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/104/goods_thumb_104_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 红谷HONGU单肩包女时尚休闲...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/120.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/120/goods_thumb_120_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Casio / 卡西欧手表男三眼皮...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/133.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/133/goods_thumb_133_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【好礼在此】CASIO BAB...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1096.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/134.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/134/goods_thumb_134_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 送给亲爱的】CASIO指针系列...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 299.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/139.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/139/goods_thumb_139_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Rimowa / 日默瓦DELUX...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 7780.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/148.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/148/goods_thumb_148_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 乔比迈凯真皮休闲皮鞋系带运动男...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 398.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/152.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/152/goods_thumb_152_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 实用公司广告展会商城开业促销赠...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 13.00</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/8.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/8/goods_thumb_8_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 迪芙斯（D:FUSE）女鞋 牛...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 179.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/40.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/40/goods_thumb_40_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 梦特娇Montagut2018...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 799.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/53.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/53/goods_thumb_53_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 73Hours 天鹅小径 20. ..</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/56.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/56/goods_thumb_56_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> CHARLES＆KEITH波士...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 139.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/63.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/63/goods_thumb_63_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 阿迪达斯双肩包2018阿迪运动...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 128.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/77.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/77/goods_thumb_77_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 卓诗尼高跟鞋女2018春季新款...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 296.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/93.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/93/goods_thumb_93_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【积分兑换】百斯锐羽毛球包 男...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 13.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/104.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/104/goods_thumb_104_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 红谷HONGU单肩包女时尚休闲...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 399.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/120.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/120/goods_thumb_120_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Casio / 卡西欧手表男三眼皮...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 2699.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/133.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/133/goods_thumb_133_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 【好礼在此】CASIO BAB...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1096.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/134.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/134/goods_thumb_134_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 送给亲爱的】CASIO指针系列...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 299.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/139.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/139/goods_thumb_139_0_200_200.png"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Rimowa / 日默瓦DELUX...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 7780.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/148.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/148/goods_thumb_148_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 乔比迈凯真皮休闲皮鞋系带运动男...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 398.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/152.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/152/goods_thumb_152_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 实用公司广告展会商城开业促销赠...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 13.00</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/56.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
<div class="floor floor7 w1224">
    <div class="floor-top">
        <h3 class="floor-title"> 艺术</h3>
        <div class="floor-nav-list clearfix">
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/513.html"> 精美礼品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/532.html"> 鲜花速递</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/533.html"> 绿植园艺</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/535.html"> 畜牧养殖</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/60.html"> 艺术品</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/534.html"> 种子</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/559.html"> 农药</a>
            <a class="floor-nav-item" href="/Home/Goods/goodsList/id/564.html"> 肥料</a>
        </div>
        <a class="nav-more-btn" href="/Home/Goods/goodsList/id/59.html"> 更多<i>&gt;</i></a>
    </div>
    <div class="floor-main">
        <div class="floor-brand">
            <a class="brand-big" href="javascript:void(0);"><img class="w-100"
                                                                 src="upload/ad/2018/04-12/5ccf5393abe9e19814d40865cec2c491.jpg"
                                                                 alt=""></a>
            <a class="brand-samll" href="javascript:void(0);"><img class="w-100"
                                                                   src="upload/ad/2018/04-12/ca1e401cbd313540eadace224524d766.jpg"
                                                                   alt=""></a>
        </div>
        <div class="floor-goods-list">
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/9.html">
                <div class="googs-title ellipsis-1"> 东方泥土 陶瓷艺术品招财摆件 客厅办公室...</div>
                <div class="googs-price ellipsis-1"> ￥1580.00</div>
                <div class="goods-pic"><img class="w-100" src="upload/goods/thumb/9/goods_thumb_9_0_400_400.png"
                                            alt=""></div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/83.html">
                <div class="googs-title ellipsis-1"> 简约现代创意沉默是金工艺品摆件北欧雕塑办...</div>
                <div class="googs-price ellipsis-1"> ￥60.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/83/goods_thumb_83_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/87.html">
                <div class="googs-title ellipsis-1"> 现代装饰 树脂雕塑动物抽象招财双马桌面摆...</div>
                <div class="googs-price ellipsis-1"> ￥128.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/87/goods_thumb_87_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/92.html">
                <div class="googs-title ellipsis-1"> 简约现代相框餐厅客厅创意装饰品摆件卧室艺...</div>
                <div class="googs-price ellipsis-1"> ￥98.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/92/goods_thumb_92_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/106.html">
                <div class="googs-title ellipsis-1"> Snnei室内 地中海帆船模型客厅摆件装...</div>
                <div class="googs-price ellipsis-1"> ￥1080.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/106/goods_thumb_106_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/107.html">
                <div class="googs-title ellipsis-1"> 稀奇（XQ） 稀奇艺术Mini版雕塑《天...</div>
                <div class="googs-price ellipsis-1"> ￥690.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/107/goods_thumb_107_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/108.html">
                <div class="googs-title ellipsis-1"> 简林 电视柜玄关装创意饰品摆件客厅家居复...</div>
                <div class="googs-price ellipsis-1"> ￥298.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/108/goods_thumb_108_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/109.html">
                <div class="googs-title ellipsis-1"> 集思美 创意复古摆件思想者砂岩摆设办公室...</div>
                <div class="googs-price ellipsis-1"> ￥88.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/109/goods_thumb_109_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/110.html">
                <div class="googs-title ellipsis-1"> 马到功成战马摆件摆件家居装饰品客厅酒柜玄...</div>
                <div class="googs-price ellipsis-1"> ￥198.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/110/goods_thumb_110_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/158.html">
                <div class="googs-title ellipsis-1"> 恒美手绘油画定制欧式山水画风景画美式挂画...</div>
                <div class="googs-price ellipsis-1"> ￥539.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/158/goods_thumb_158_0_400_400.jpeg" alt="">
                </div>
            </a>
            <a class="floor-goods-item" href="/Home/Goods/goodsInfo/id/203.html">
                <div class="googs-title ellipsis-1"> 鲜花礼盒花束速递红玫瑰北京同城鲜花上海送...</div>
                <div class="googs-price ellipsis-1"> ￥108.00</div>
                <div class="goods-pic"><img class="w-100"
                                            src="upload/goods/thumb/203/goods_thumb_203_0_400_400.png" alt="">
                </div>
            </a>
        </div>
        <div class="floor-recommend">
            <div class="floor-recommend-title"> 热门推荐</div>
            <div class="floor-recommend-wrap">
                <div class="floor-recommend-list" style="top: -168.094px;">
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/9.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/9/goods_thumb_9_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 东方泥土 陶瓷艺术品招财摆件 ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1580.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/83.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/83/goods_thumb_83_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 简约现代创意沉默是金工艺品摆件...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 60.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/87.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/87/goods_thumb_87_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 现代装饰 树脂雕塑动物抽象招财...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 128.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/92.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/92/goods_thumb_92_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 简约现代相框餐厅客厅创意装饰品...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 98.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/106.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/106/goods_thumb_106_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Snnei室内 地中海帆船模型...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1080.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/107.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/107/goods_thumb_107_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 稀奇（XQ） 稀奇艺术Mini...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 690.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/108.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/108/goods_thumb_108_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 简林 电视柜玄关装创意饰品摆件...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 298.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/109.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/109/goods_thumb_109_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 集思美 创意复古摆件思想者砂岩...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 88.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/110.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/110/goods_thumb_110_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 马到功成战马摆件摆件家居装饰品...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 198.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/111.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/111/goods_thumb_111_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 结婚礼物送老婆情人节创意礼品婚...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.99</div>
                        </div>
                    </a>

                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/9.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/9/goods_thumb_9_0_200_200.png" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 东方泥土 陶瓷艺术品招财摆件 ...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1580.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/83.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/83/goods_thumb_83_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 简约现代创意沉默是金工艺品摆件...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 60.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/87.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/87/goods_thumb_87_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 现代装饰 树脂雕塑动物抽象招财...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 128.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/92.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/92/goods_thumb_92_0_200_200.jpeg" alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 简约现代相框餐厅客厅创意装饰品...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 98.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/106.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/106/goods_thumb_106_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> Snnei室内 地中海帆船模型...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 1080.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/107.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/107/goods_thumb_107_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 稀奇（XQ） 稀奇艺术Mini...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 690.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/108.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/108/goods_thumb_108_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 简林 电视柜玄关装创意饰品摆件...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 298.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/109.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/109/goods_thumb_109_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 集思美 创意复古摆件思想者砂岩...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 88.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/110.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/110/goods_thumb_110_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 马到功成战马摆件摆件家居装饰品...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 198.00</div>
                        </div>
                    </a>
                    <a class="floor-recommend-item" href="/Home/Goods/goodsInfo/id/111.html">
                        <div class="floor-recommend-pic">
                            <img class="w-100" src="upload/goods/thumb/111/goods_thumb_111_0_200_200.jpeg"
                                 alt="">
                        </div>
                        <div class="floor-recommend-cont">
                            <div class="recommend-goods-name ellipsis-1"> 结婚礼物送老婆情人节创意礼品婚...</div>
                            <div class="recommend-goods-des ellipsis-1"></div>
                            <div class="recommend-goods-price  recommend-goods-des"> ￥ 99.99</div>
                        </div>
                    </a>
                </div>
            </div>
            <a class="recommend-more-btn" href="/Home/Goods/goodsList/id/59.html"> 更多 <i>&gt;</i></a>
        </div>
    </div>
</div>
@include('pc/particals/footer')
<!--楼层导航-s-->
<ul class="floor-nav" id="floor-nav" style="margin-top: -143px; display: none;">
    <li class="floor-nav-ac">
        <span> 1F </span>
        <span> 手机数码</span>
    </li>
    <li class="">
        <span> 2F </span>
        <span> 服装服饰</span>
    </li>
    <li class="">
        <span> 3F </span>
        <span> 电脑配件</span>
    </li>
    <li class="">
        <span> 4F </span>
        <span> 家具家居</span>
    </li>
    <li class="">
        <span> 5F </span>
        <span> 食品生鲜</span>
    </li>
    <li class="">
        <span> 6F </span>
        <span> 鞋类配饰</span>
    </li>
    <li class="">
        <span> 7F </span>
        <span> 艺术鲜花</span>
    </li>
</ul>

<!--楼层导航-e-->
<!--侧边栏-s-->
<div class="slidebar-right">
    <a class="slidebar-item ico-slidebar1" target="_blank"
       href="tencent://message/?uin=123456789&amp;Site=TPshop商城&amp;Menu=yes">
        <div class="sbar-hover-txt"> 客服服务</div>
    </a>
    <a class="slidebar-item ico-slidebar2" target="_blank" href="javascript:;">
        <div class="sbar-hover-txt"> 关注微信</div>
        <div class="sbar-hover-pic">
            <div class="qrcode-wrap"><img class="w-100" src="images/pc/qrcode.png" alt="">
            </div>
            <p class="qrcode-des"> 扫码关注官方微信,先人一步知晓促销活动 </p>
        </div>
    </a>
    <a class="slidebar-item ico-slidebar3" target="_blank" href="javascript:;">
        <div class="sbar-hover-txt"> 手机商城</div>
        <div class="sbar-hover-pic">
            <div class="qrcode-wrap"><img class="w-100" img-url="/index.php?m=Home&amp;c=Index&amp;a=qr_code&amp;data=http://www.tpshop.test:8080/Mobile/index/app_down.html&amp;head_pic=http://www.tpshop.test:8080//public/static/images/logo/pc_home_logo_default.png&amp;back_img="
                                          alt=""
                                          src="/index.php?m=Home&amp;c=Index&amp;a=qr_code&amp;data=http://www.tpshop.test:8080/Mobile/index/app_down.html&amp;head_pic=http://www.tpshop.test:8080//public/static/images/logo/pc_home_logo_default.png&amp;back_img=">
            </div>
            <p class="qrcode-des"> 扫码下载手机商城,随时随地享受优惠购物 </p>
        </div>
    </a>
    <a class="slidebar-item ico-slidebar4 t-all" href="javascript:void(0)" style="height: 0px;">
        <div class="sbar-hover-txt"> 回到顶部</div>
    </a>
</div>
<script>
    function init() {  //初始化函数
        //首页商品分类显示
        $('.categorys .dd').show();
        //自动楼层居中设置
        $('#floor-nav').css('margin-top', (-41 * $('#floor-nav').find('li').length + 1) / 2);
        //推荐列表自动滚动
        carouselList('.floor-recommend-wrap', '.floor-recommend-list', '.floor-recommend-item');
        //右侧边栏
        rightBar();
        //楼层导航切换
        sidebarRollChange();
    }
    function rightBar() {  //右侧边栏
        var $_slidebar4 = $('.ico-slidebar4');
        $(window).scroll(function () {
                if ($(window).scrollTop() > 100) {
                    $_slidebar4.css('height', 40);
                } else {
                    $_slidebar4.css('height', 0);
                }
            }
        );
        $_slidebar4.click(function () {
                $('html,body').animate({'scrollTop': 0}, 500)
            }
        );
    }

    function carouselList(wrap, list, item, timeWait, timeRun) { //推荐列表滚动
        /*
     * wrap：包裹容器
     * list：列表容器
     *item：列表单元
     *timeWait：停顿时间(单位ms,可不传参数，默认3秒)
     *timeRun：运动时间(单位ms,可不传参数，默认0.5秒)
     * */
        if (timeWait === undefined || typeof timeWait != "number") {
            timeWait = 3000;
        }
        if (timeRun === undefined || typeof timeRun != "number") {
            timeRun = 500;
        }
        $(wrap).each(function () {
                var length = $(this).find(item).length;
                if (length < 3) {
                    return;
                }
                let html = $(this).find(list).html();
                $(this).find(list).html(html + html);
                let num = 1;
                let _this = this;
                function interval() {
                    clearInterval($(_this)[0].timer);
                    $(_this)[0].timer = setInterval(function () {
                            num++;
                            if (num == length) {
                                $(_this).find(list).animate({top: -108 * num}, timeRun, function () {
                                    $(_this).find(list).css('top', 0);
                                });
                                num = 0;
                            } else {
                                $(_this).find(list).animate({top: -108 * num}, timeRun);
                            }
                        }, timeWait
                    );
                }
                interval();
                $(this).find(item).hover(function () {
                        clearInterval($(_this)[0].timer);
                    }, function () {
                        interval();
                    }
                )
            }
        );
    }

    function sidebarRollChange() {  //楼层切换
        let $_floorList = $('.floor');
        let $_sidebar = $('#floor-nav');
        $_sidebar.find('li').click(function () { //点击切换楼层
                $('html,body').animate({'scrollTop': $_floorList.eq($(this).index()).offset().top}, 500)
            }
        );
        $(window).scroll(function () {
                let scrollTop = $(window).scrollTop();
                if (scrollTop < $_floorList.eq(0).offset().top - $(window).height() / 2) {
                    $_sidebar.hide();
                    return;
                }
                $_sidebar.show();  //左边侧边栏显示
                for (let j = 0, k = $_floorList.length; j < k; j++) { /*滚动改变侧边栏的状态*/
                    if (scrollTop > $_floorList.eq(j).offset().top - $(window).height() / 2) {
                        $_sidebar.find('li').eq(j).addClass('floor-nav-ac').siblings().removeClass('floor-nav-ac');
                    }
                }
            }
        )
    }
    init();
</script>
<script src="js/pc/common.js" type="text/javascript" charset="utf-8"></script>
</body>
@endsection