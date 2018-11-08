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
                <h3>推送设置</h3>
                <h5>推送服务相关设置</h5>
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
            <li>推送服务相关设置, 请从极光官网注册账户并获取相关信息。</li>
        </ul>
    </div>
    <form method="post" id="handlepost" action="{:U('System/handle')}" enctype="multipart/form-data" name="form1">
        <input type="hidden" name="form_submit" value="ok" />
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label for="app_key">AppKey</label>
                </dt>
                <dd class="opt">
                    <input id="app_key" name="jpush_app_key" value="{$config.jpush_app_key}" class="input-txt" type="text" />
                    <p class="notic">App应用推送服务的唯一标识</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label for="master_secret">Master Secret</label>
                </dt>
                <dd class="opt">
                    <input id="master_secret" name="jpush_master_secret" value="{$config.jpush_master_secret}" class="input-txt" type="text" />
                    <p class="notic">用于服务器端 API 调用时与 AppKey 配合使用达到鉴权的目的，请保管好 Master Secret 防止外泄。</p>
                </dd>
            </dl>
            <div class="bot">
                <input type="hidden" name="inc_type" value="{$inc_type}">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="check_form();">确认提交</a>
            </div>
        </div>
    </form>
</div>
<div id="goTop"> <a href="JavaScript:void(0);" id="btntop"><i class="fa fa-angle-up"></i></a><a href="JavaScript:void(0);" id="btnbottom"><i class="fa fa-angle-down"></i></a></div>
</body>
<script type="text/javascript">
    function check_form()
    {
        if(!$('#app_key').val()){
            layer.alert('AppKey 非空！',{icon:2});
            return false;
        }
        if(!$('#master_secret').val()){
            layer.alert('Master Secret 非空！',{icon:2});
            return false;
        }
        document.form1.submit()
    }
</script>
</html>