@extends('pc.layouts.home')
        @section('personal_style')

    <title>注册-{$tpshop_config['shop_info_store_title']}</title>
    <meta name="keywords" content="{$tpshop_config['shop_info_store_keyword']}" />
    <meta name="description" content="{$tpshop_config['shop_info_store_desc']}" />
    <link href="{{url('static/css/reg3.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{url('static/css/tpshop.css')}}" />
    <script src="{{url('js/md5.min.js')}}"></script>
@endsection
    @section('body')
<body>
    <div class="regcon">
        <a class="m-fnlogoa fn-fl" href="/" ><img src="{$tpshop_config['shop_info_store_logo']|default='__PUBLIC__/static/images/logo/pc_home_logo_default.png'}" style="width: 159px;height: 58px;"/></a>
        <span class="m-fntit">欢迎注册</span>
        <div class="ui_tab">
            <ul class="ui_tab_nav regnav">
                <li class="uli <if condition="I('get.t') eq ''">active</if> "><a href="{:U('Home/User/reg')}" >手机注册</a></li>
                <li class="uli <if condition="I('get.t') eq 'email'">active</if> "><a href="{:U('Home/User/reg',array('t'=>'email'))}">邮箱注册</a></li>
                <li class="no fn-fr loginbtn">我已注册，马上<a href="{{url('login')}}">登录></a></li>
            </ul>
            
<if condition="$Request.param.t eq ''">
		<form id="reg_form2"  method="post" action="">
            <input type="hidden" name="auth_code" value="{$Think.config.AUTH_CODE}"/>
			<input type="hidden" name="scene" value="1">    
            <div class="ui_tab_content">
                <div class="m-fnbox ui_panel" style="display: block;">
                    <div class="fnlogin clearfix">
                    
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">手机号码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp fmobile J_cellphone" placeholder="请输入手机号码"  name="username" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" id="username" required=""/>
                            </div>
                        </div>
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">图像验证码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp imgcode J_imgcode" placeholder="图像验证码"  name="verify_code" required=""/>
                                <img width="100" height="35" src="/index.php/Home/User/verify/type/user_reg.html" id="reflsh_code2" class="po-ab to0">
                                    <a><img onclick="verify('reflsh_code2')" src="__STATIC__/images/chg_image.png" class="ma-le-210"></a>
                            </div>
                            <div id="show-voice" class="show-voice"></div>
                        </div>
                   <if condition="$tpshop_config['sms_regis_sms_enable'] eq 1" >
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">手机验证码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp imgcode J_imgcode" placeholder="手机验证码" id="code" name="code" required=""/>                                
                                <button class="fn-fl icode" onclick="send_sms_reg_code()" type="button" id="count_down">发送</button>
                            </div>
                            <div id="show-voice" class="show-voice"></div>
                        </div>
                   </if>
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">设置密码：</span></label>
                            <div class="liner">
                                <input type="password" class="inp fpass J_password"  placeholder="6-16位大小写英文字母、数字或符号的组合" autocomplete="off" maxlength="16"  id="password" value="" required=""/>
                                <input name="password" type="hidden" value=""/>
                            </div>
                        </div>
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">确认密码：</span></label>
                            <div class="liner">
                                <input type="password" class="inp fsecpass J_password2" placeholder="请再次输入密码" autocomplete="off" maxlength="16" id="password2" required="" value=""/>
                                <input name="password2" type="hidden" value=""/>
                            </div>
                        </div>
                        <if condition="$tpshop_config['basic_invite'] eq 1" >
                        <div class="line">
                            <label class="linel"><span class="dt">推荐人手机：</span></label>
                            <div class="liner">
                                <input type="text"  class="inp fmobile J_cellphone" placeholder="请输入手机号码" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" name="invite"/>
                            </div>
                        </div>
                        </if>
                        <div class="line liney clearfix">
                            <label class="linel">&nbsp;</label>
                            <div class="liner">
                                <div class="clearfix checkcon">
                                    <p class="fn-fl checktxt"><input type="checkbox" id="checktxt"  class="iyes fn-fl J_protocal" checked />
                                    <span class="fn-fl">我已阅读并同意</span><a class="itxt fn-fl" href="{:U('Home/Article/agreement',['doc_code'=>'agreement'])}" target="_blank">《服务协议》</a>
                                    </p>
                                      <p class="fn-fl errorbox v-txt" id="protocalBox"></p>
                                </div>
                                <a class="regbtn J_btn_agree" href="javascript:void(0);" onClick="check_submit();">同意协议并注册</a>
                                <p class="v-txt" id="err_check_code">
                                    <span class="fnred">请勾选</span>我已阅读并同意<a class="itxt" href="{:U('Home/Article/agreement',['doc_code'=>'agreement'])}" target="_blank">《服务协议》</a>
                                </p>
                        </div>
                    </div>
                    </div>
                    </div>
            </div>
            </form>
</if>
<if condition="$Request.param.t eq 'email'">
		<form id="reg_form2"  method="post" action="">
            <input type="hidden" name="auth_code" value="{$Think.config.AUTH_CODE}"/>
            <div class="ui_tab_content">
                <div class="m-fnbox ui_panel" style="display: block;">
                    <div class="fnlogin clearfix">
                    
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">邮箱：</span></label>
                            <div class="liner">
                                <input type="text" class="inp J_cellphone" placeholder="请输入邮箱"  name="username" id="username" required=""/>
                            </div>
                        </div>
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">图像验证码：</span></label>
                            <div class="liner">
                                <input type="text" class="inp imgcode J_imgcode" placeholder="图像验证码" id="verify_code2" name="verify_code" required=""/>
                                <img width="100" height="35" src="/index.php/Home/User/verify/type/user_reg.html" id="reflsh_code2" class="po-ab to0">
                                <a><img onclick="verify('reflsh_code2')" src="__STATIC__/images/chg_image.png" class="ma-le-210"></a>
                            </div>
                            <div id="show-voice" class="show-voice"></div>
                        </div>
                        <if condition="$regis_smtp_enable eq 1">
                            <div class="line">
                                <label class="linel"><em>*</em><span class="dt">邮箱验证码：</span></label>
                                <div class="liner">
                                    <input type="text" class="inp imgcode J_imgcode" placeholder="邮箱验证码" id="code" name="code" required=""/>
                                    <button class="fn-fl icode" onclick="send_smtp_reg_code()" type="button" id="count_down">发送</button>
                                </div>
                                <div id="show-voice" class="show-voice"></div>
                            </div>
                        </if>
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">设置密码：</span></label>
                            <div class="liner">
                                <input type="password" class="inp fpass J_password" placeholder="6-16位大小写英文字母、数字或符号的组合" autocomplete="off" maxlength="16"  id="password" value="" required=""/>
                                <input name="password" type="hidden" value=""/>
                            </div>
                        </div>
                        <div class="line">
                            <label class="linel"><em>*</em><span class="dt">确认密码：</span></label>
                            <div class="liner">
                                <input type="password" class="inp fsecpass J_password2" placeholder="请再次输入密码" autocomplete="off" maxlength="16" id="password2" required="" value=""/>
                                <input name="password2" type="hidden" value=""/>
                            </div>
                        </div>
                        <if condition="$tpshop_config['basic_invite'] eq 1" >
                        <div class="line">
                            <label class="linel"><span class="dt">推荐人手机：</span></label>
                            <div class="liner">
                                <input type="text"  class="inp fmobile J_cellphone" placeholder="请输入手机号码" onkeyup="this.value=this.value.replace(/[^\d]/g,'')" name="invite"/>
                            </div>
                        </div></if>
                        <div class="line liney clearfix">
                            <label class="linel">&nbsp;</label>
                            <div class="liner">
                                <div class="clearfix checkcon">
                                    <p class="fn-fl checktxt"><input type="checkbox"  id="checktxt" class="iyes fn-fl J_protocal" checked />
                                    <span class="fn-fl">我已阅读并同意</span><a class="itxt fn-fl" href="{:U('Home/Article/agreement',['doc_code'=>'agreement'])}" target="_blank">《服务协议》</a>
                                    </p>
                                      <p class="fn-fl errorbox v-txt" id="protocalBox"></p>
                                </div>
                                <a class="regbtn J_btn_agree" href="javascript:void(0);" onClick="check_submit();">同意协议并注册</a>
                                <p class="v-txt"><span class="fnred">请勾选</span>我已阅读并同意<a class="itxt" href="{:U('Home/Article/agreement',['doc_code'=>'agreement'])}" target="_blank">《服务协议》</a></p>
                        </div>
                    </div>
                    </div>
                    </div>
            </div>
            </form>
</if>
        </div>
    </div>    
</div>
    <!--footer-s-->
    <div class="footer p">
        <include file="public/footer" />
    </div>
    <!--footer-e-->
<script>
    // 提交订单
    var ajax_return_status = 1; // 标识ajax 请求是否已经回来 可以进行下一次请求
    var t ="{$Request.param.t}";
    $(document).ready(function(){
		 $('input').click(function(){
		      $(this).siblings('p').hide();
		 });
	  	
	});
    $('input[type="password"]').on('blur',function(){
        var password = $(this).val();
        if(password.length < 6 || password.length>16){
            layer.alert('密码有效长度为6-16位！', {icon: 2});
            return  false;
        }
	});

	// 普通 图形验证码 
    function verify(id){
        $('#'+id).attr('src','/index.php?m=Home&c=User&a=verify&type=user_reg&r='+Math.random());
    }
    function check_submit(){
        var password = $.trim($('#password').val());
        if(password.length < 6 || password.length>16){
            layer.alert('密码有效长度为6-16位,并且不得有空格！', {icon: 2});
            return  false;
        }
        if(!$('#checktxt').is(':checked')){
            layer.alert('请认真阅读并勾选服务协议！', {icon: 2});
            return  false;
        }
        var username = $('#username').val();
        if (t == 'email'){
            if (!checkEmail(username)){
                layer.alert('请输入正确邮箱', {icon: 2});
                return false;
            }
        }else if (!checkMobile(username)){
            layer.alert('请输入正确手机号', {icon: 2});
            return false;
        }

        if (ajax_return_status == 0) {
            return false;
        }
        ajax_return_status = 0;
        $.ajax({
            type : "POST",
            url:"{:U('Home/User/reg')}",
            dataType: "json",
            data: $('#reg_form2').serialize(),
            success: function(data){
                ajax_return_status = 1;
                if(data.status == 1){
                    layer.msg(data.msg, {icon: 1},function(){
                        window.location.href = "{:U('Home/Index/index')}";
                    });
                }else{
                    verify('reflsh_code2');
                    layer.alert(data.msg, {icon: 2},function(index){
                        $('.verifyImg').trigger('click');
                        layer.close(index);
                    });
                }
            },
            error:function () {
                layer.alert('网络忙请稍后再试！', {icon: 2});
                ajax_return_status = 1;
            }
        });

    }
	// 电子邮件注册  和 手机号码注册 切换
    function reg_tab(id,id2){
        $('#'+id).addClass('ema-tab');
        $('#'+id2).removeClass('ema-tab');
        $('#'+id+'_div').show();
        $('#'+id2+'_div').hide();
    }
	// 发送手机短信
    function send_sms_reg_code(){
        var mobile = $('input[name="username"]').val();
        var verify_code = $('input[name="verify_code"]').val();
        if(!checkMobile(mobile)){
            layer.alert('请输入正确的手机号码', {icon: 2});//alert('请输入正确的手机号码');
            return;
        }
        if(verify_code == ''){
            layer.alert('请输入图像验证码', {icon: 2});//alert('请输入正确的手机号码');
            return;
        }
        var url = "/index.php?m=Home&c=Api&a=send_validate_code&scene=1&type=mobile&mobile="+mobile+"&verify_code="+verify_code;
        $.ajax({
            url:url,
            dataType: "json",
            success: function(res){
            	if(res.status == 1)
    			{
    				$('#count_down').attr("disabled","disabled");
    				intAs = {$tpshop_config['sms_sms_time_out']|default=60}; // 手机短信超时时间
                    jsInnerTimeout('count_down',intAs);
                    layer.alert(res.msg, {icon: 1});
    			}else{
                    layer.alert(res.msg, {icon: 2});
                    verify('reflsh_code2')
                }
            }
        });
    }

    // 发送邮箱
    function send_smtp_reg_code(){
        if (ajax_return_status == 0) {
            return false;
        }
        ajax_return_status = 0;
        var email = $('input[name="username"]').val();
        var verify_code = $('input[name="verify_code"]').val();
        if(!checkEmail(email)){
            ajax_return_status = 1;
            layer.alert('请输入正确的邮箱', {icon: 2});
            return;
        }
        if(verify_code == ''){
            ajax_return_status = 1;
            layer.alert('请输入图像验证码', {icon: 2});
            return;
        }
        $.ajax({
            type : "POST",
            url:"{:U('Home/Api/send_validate_code')}",
            data : {type:'email',send:email,scene:1,verify_code:verify_code},// 你的formid
            dataType: "json",
            success: function(data){
                ajax_return_status = 1;
                if(data.status == 1){
                    $('#count_down').attr("disabled","disabled");
                    intAs = 60; // 发送邮箱超时时间
                    jsInnerTimeout('count_down',intAs);
                    layer.alert(data.msg, {icon: 1});
                }else{
                    layer.alert(data.msg, {icon: 2});
                    verify('reflsh_code2')
                }
            }
        });
    }

    $('#count_down').removeAttr("disabled");
    //倒计时函数
    function jsInnerTimeout(id,intAs)
    {
        var codeObj=$("#"+id);
        intAs--;
        if(intAs<=-1)
        {
            codeObj.removeAttr("disabled");
            codeObj.text("发送");
            return true;
        }
        codeObj.text(intAs+'秒');
        setTimeout("jsInnerTimeout('"+id+"',"+intAs+")",1000);
    };

    function checkMobile(tel) {
//        var reg = /(^1[3|4|5|7|8][0-9]{9}$)/;
        var reg = /^1[0-9]{10}$/;
        if (reg.test(tel)) {
            return true;
        }else{
            return false;
        };
    }
    
    function checkEmail(str){
        var reg = /^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(reg.test(str)){
            return true;
        }else{
            return false;
        }
    }
    $(document).on('keyup', '#password', function() {
        var password = md5($("input[name='auth_code']").val() + this.value);
        $('input[name="password"]').val(password);
    })
    $(document).on('keyup', '#password2', function() {
        var password2 = md5($("input[name='auth_code']").val() + this.value);
        $('input[name="password2"]').val(password2);
    })
</script>
</body> 
@endsection
