@include("admin.public.layout")
<body style="background-color: #FFF; overflow: auto;">
<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>优惠券管理 - 发放优惠券</h3>
                <h5>网站系统发放优惠券</h5>
            </div>
        </div>
    </div>
    <form class="form-horizontal" id="couponForm" method="post">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="name">优惠券名称</label>
                </dt>
                <dd class="opt">
                    <input type="text" id="name" name="name" value="{$coupon.name}" style="background:#E7E7E7 none;" disabled class="input-txt">
                    <p class="notic">不能更改</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="money">优惠券面额</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="{$coupon.money}" id="money" name="money" style="background:#E7E7E7 none;" disabled class="input-txt">
                    <p class="notic">不能更改</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="num">发放数量</label>
                </dt>
                <dd class="opt">
                    <input type="text" id="num" name="num"  value="0" pattern="^\d+$" class="input-txt">
                    <p class="notic"></p>
                </dd>
            </dl>
            <div class="bot"><a href="JavaScript:void(0);" onclick="$('#couponForm').submit();" class="ncap-btn-big ncap-btn-green" id="submitBtn">确认提交</a></div>
        </div>
    </form>
</div>
<script type="text/javascript">
</script>
</body>
</html>