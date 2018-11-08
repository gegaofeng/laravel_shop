<!doctype html>
<html>
@include('admin.public.layout')
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>快递鸟参数设置</h3>
                <h5>快递鸟电子面单参数配置</h5>
            </div>
            <ul class="tab-base nc-row">
                @foreach($group_list as $k=>$v)
                    <li>
                        <a href="{{url('admin/system/index?inc_type='.$k)}}" 
                           @if ($k==$inc_type)
                           class="current"
                           @endif 
                           >
                           <span>{{$v}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- 操作说明 -->
    <div class="explanation" id="explanation">
        <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span id="explanationZoom" title="收起提示"></span> </div>
        <ul>
        	<li>设置快递100key用于跟踪查询物流信息</li>
            <li>快递鸟提供电子面单接口, 请从快递鸟注册账户, 并在其用户管理后台获取相关信息。</li>
        </ul>
    </div>
	<!--code_9OSS云图片业务代码-->
    <form method="post" id="handlepost" action="{:U('System/handle')}" enctype="multipart/form-data" name="form1">
        <input type="hidden" name="form_submit" value="ok" />
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="kdniao_switch">快递方式</label>
                </dt>
				<dd class="opt">
                    <input type="radio" name="express_switch" value="0" <if condition="$config[express_switch] eq 0"> checked </if>>快递100&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="express_switch" value="1" <if condition="$config[express_switch] eq 1"> checked </if>>快递鸟 &nbsp;&nbsp;&nbsp;&nbsp;
                </dd>
            </dl>
            <dl class="row kd100">
                <dt class="tit">
                    <label for="kd100_key">快递100Key</label>
                </dt>
                <dd class="opt">
                    <input id="kd100_key" name="kd100_key" value="{$config.kd100_key}" class="input-txt" type="text" />
                    <p class="notic">快递100key</p>
                </dd>
            </dl>
            <dl class="row kdniao">
                <dt class="tit">
                    <label for="kdniao_id">商户ID</label>
                </dt>
                <dd class="opt">
                    <input id="kdniao_id" name="kdniao_id" value="{$config.kdniao_id}" class="input-txt" type="text" />
                    <p class="notic">快递鸟 id</p>
                </dd>
            </dl>
            <dl class="row kdniao">
                <dt class="tit">
                    <label for="kdniao_key">API key</label>
                </dt>
                <dd class="opt">
                    <input id="kdniao_key" name="kdniao_key" value="{$config.kdniao_key}" class="input-txt" type="text" />
                    <p class="notic">快递鸟API key</p>
                </dd>
            </dl>
            <dl class="row kdniao">
                <dt class="tit">
                    <label for="oss_bucket">说明</label>
                </dt>
                <dd class="opt">
                   <a href="http://www.kdniao.com/" target="_blank">点击申请查看</a>
                </dd>
            </dl>
            <div class="bot">
                <input type="hidden" name="inc_type" value="{$inc_type}">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="check_form();">确认提交</a>
            </div>
        </div>
    </form>
	<!--code_9OSS云图片业务代码-->	
</div>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<script type="text/javascript">
    function check_form()
    {
        if(!$('#kdniao_id').val()){
            //layer.alert('kdniao_id 非空！',{icon:2});
            //return false;
        }
        if(!$('#kdniao_key').val()){
            //layer.alert('kdniao_key 非空！',{icon:2});
            //return false;
        }
        document.form1.submit()
    }
    
    $(document).ready(function () {
    	$('input[name="express_switch"]').click(function(){
    		if($(this).val() == 0){
    			$('.kdniao').hide();
    			$('.kd100').show();
    		}else{
    			$('.kdniao').show();
    			$('.kd100').hide();
    		}
    	})

    	var chk = $('input[name="express_switch"]:checked').val();
    	if(chk == 0){
			$('.kdniao').hide();
			$('.kd100').show();
    	}else{
			$('.kdniao').show();
			$('.kd100').hide();
    	}
    })
    
</script>
</html>