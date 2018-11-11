<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>积分商城-{$tpshop_config['shop_info_store_title']}</title>
		<link rel="stylesheet" type="text/css" href="__STATIC__/css/tpshop.css" />
		<link rel="shortcut icon" type="image/x-icon" href="{$tpshop_config.shop_info_store_ico|default='/public/static/images/logo/storeico_default.png'}" media="screen"/>
		<script src="__STATIC__/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="__PUBLIC__/js/layer/layer-min.js"></script>
		<script src="__PUBLIC__/js/global.js"></script>
		<script src="__PUBLIC__/js/pc_common.js"></script>
	</head>
	<body>
	<!--header-s-->
	<include file="public/header" w='w1224'/>
		<!--header-e-->
		<div class="search-box p">
			<div class="w1224">
				<div class="search-path fl">
					<a href="{:U('Home/Goods/integralMall')}">全部结果</a>
					<i class="litt-xyb"></i>
					<span>积分商城</span>
				</div>
				<div class="search-clear fr">
					<span><a href="{:U('Home/Goods/integralMall')}">清空筛选条件</a></span>
				</div>
			</div>
		</div>
    <!--分类-s-->
		<div class="search-opt classify">
			<div class="w1224">
				<div class="opt-list">
					<dl class="brand-section">
						<dt>分类:</dt>
						<dd class="ri-section">
							<div class="lf-list">
								<div class="brand-list">
									<div class="clearfix p">
										<a href="{:U('Home/Goods/integralMall')}">
											<span <if condition="$Request.param.id eq ''">class="red"</if>>全部</span>
										</a>
                                        <volist name="goods_category" id="gc">
                                            <a href="{:U('Home/Goods/integralMall',array('id'=>$gc['id']))}">
                                                <span <if condition="$Request.param.id eq $gc[id]">class="red"</if>>{$gc['name']}</span>
                                            </a>
                                        </volist>
									</div>
								</div>
							</div>
						</dd>
					</dl>
				</div>
			</div>
		</div>
    <!--分类-e-->
		<div class="shop-list-tour ma-to-20 p">
			<div class="w1224">
				<div class="stsho pre-sts intergra">
					<div class="sx_topb presellall">
						<div class="f-sort fl">
							<ul>
								<li <if condition="$Request.param.brandType eq '0'">class="red"</if>><a href="{:U('Home/Goods/integralMall',array('id'=>I('get.id'),'brandType'=>0))}">全部<i class="jta jta-w"></i></a></li>
								<li <if condition="$Request.param.brandType eq '1'">class="red"</if>><a href="{:U('Home/Goods/integralMall',array('id'=>I('get.id'),'brandType'=>1))}">积分+金额<i class="jta"></i></a></li>
								<li <if condition="$Request.param.brandType eq '2'">class="red"</if>><a href="{:U('Home/Goods/integralMall',array('id'=>I('get.id'),'brandType'=>2))}">全积分<i class="jta"></i></a></li>
							</ul>
						</div>
						<div class="f-total fr">
                            <div class="all-sec">共<span>{$goods_list_count}</span>个商品</div>
							<div class="all-fy">
                                <a <if condition="$nowPage gt 1">href="{:U('Home/Goods/integralMall',array_merge(I('get.'),array('p'=>$nowPage-1)))}" </if>>&lt;</a>
                                <p class="fy-y"><span class="z-cur">{$nowPage}</span>/<span>{$totalPages}</span></p>
                                <a <if condition="($nowPage+1) lt $totalPages">href="{:U('Home/Goods/integralMall',array('p'=>$nowPage+1))}"</if>>&gt;</a>
                            </div>
						</div>
					</div>
					<div class="he-rin p"></div>
                    <!--商品-s-->
					<div class="jpateki p">
                        <empty name="goods_list">
                            <p class="ncyekjl" style="font-size: 16px;margin:100px auto;text-align: center;">--暂无此类商品--</p>
                        <else/>
						    <volist name="goods_list" id="goods">
							<if condition="($i-1)%3 eq 0">
								<ul>
							</if>
								<li <if condition="$i%3 eq 0">class="mar0"</if>>
									<div class="sbox">
										<div class="contelim">
											<img src="{$goods['goods_id']|goods_thum_images=165,188}"/>
										</div>
										<div class="contifo">
											<p class="shop_name"><a href="{:U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']))}">{$goods['goods_name']}</a></p>
											<p>参考价：￥<span class="lithe">{$goods['shop_price']}</span></p>
											<p>换购价：<span class="red">￥<em>{$goods['shop_price']-$goods['exchange_integral']/$point_rate}+{$goods['exchange_integral']}</em>积分</span></p>
											<div class="duchan">
												<span><em>{$goods['sales_sum']}</em>人换购</span>
												<a href="{:U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']))}">立即换购</a>
											</div>
										</div>
									</div>
								</li>
							<if condition="$i%3 eq 0">
								</ul>
							</if>
						</volist>
                        </empty>
					</div>
                    <div class="djs">
                        {$page}
                    </div>
                    <!--商品-e-->
                    <!--精品推荐-s-->
					<div class="reco-bouti">
						<h2 class="litt-titt">精品推荐</h2>
						<div class="reacommque">
							<ul>
								<tpshop sql="select * from `__PREFIX__goods` where is_on_sale eq 1 and exchange_integral gt 0 and is_recommend eq 1 and is_virtual eq 0 limit 5" item="goods" key="k">
									<li>
									<div class="boxque">
										<img src="{$goods['goods_id']|goods_thum_images=165,188}"/>
										<p class="shop_name"><a href="">{$goods['goods_name']}</a></p>
										<div class="coan-j p">
											<div class="fl">
												<p class="ckf">参考价：￥<span class="lithe">{$goods['shop_price']}</span></p>
												<p class="ckf">换购价：<span class="red">￥<em>
                                                    {:round($goods['shop_price']-$goods['exchange_integral']/$point_rate,2)}
                                                    +{$goods['exchange_integral']}
                                                </em>积分</span></p>
											</div>
											<div class="fr">
												<a class="changot" href="{:U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']))}">立即换购</a>
											</div>
										</div>
									</div>
								</li>
								</tpshop>
							</ul>
						</div>
					</div>
                    <!--精品推荐-e-->
                    <!--热门兑换-s-->
					<div class="hotchane">
						<h2 class="litt-titt">热门兑换</h2>
						<div class="hot-change">
							<ul>
								<tpshop sql="select * from `__PREFIX__goods` where is_on_sale eq 1 and exchange_integral gt 0 and is_hot eq 1 and is_virtual eq 0 limit 7" item="goods" key="k">
									<li <if condition="($k+1)%5 eq 0">class="mar0"</if>>
										<div class="lit-shcha">
											<img src="{$goods['goods_id']|goods_thum_images=165,188}"/>
											<div class="duchan">
												<span><em>{$goods['sales_sum']}</em>人换购</span>
												<a href="{:U('Home/Goods/goodsInfo',array('id'=>$goods['goods_id']))}">立即换购</a>
											</div>
										</div>
									</li>
								</tpshop>
							</ul>
						</div>
					</div>
                    <!--热门兑换-e-->
				</div>
			</div>
		</div>
		<!--footer-s-->
		<div class="footer p">
            <include file="public/footer" />
			<include file="public/sidebar_cart" />
		</div>
		<!--footer-e-->
<script src="__STATIC__/js/lazyload.min.js" type="text/javascript" charset="utf-8"></script>
<script src="__STATIC__/js/headerfooter.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        $('.f-sort ul li').click(function(){
            $(this).find('i').addClass('jta-w').parents('li').siblings().find('i').removeClass('jta-w');
        })
    })
</script>
</body>
</html>