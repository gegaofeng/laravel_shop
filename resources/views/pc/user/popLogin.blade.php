<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
   <title>登录-{$tpshop_config['shop_info_store_title']}</title>
   <meta name="keywords" content="{$tpshop_config['shop_info_store_keyword']}" />
   <meta name="description" content="{$tpshop_config['shop_info_store_desc']}" />
  <link rel="stylesheet" href="{{asset('home/css/fn_login.css')}}">
  <script src="{{asset('home/js/jquery-1.11.3.min.js')}}" type="text/javascript" charset="utf-8"></script>
</head>
<body>
<div class="u-diaolog-login-content">
  <form action="#" name="" class="J-login" method="post">
    <input type="hidden" value="" id="refer">
    <div class="u-reg mb13">
    <span style="color:#F00;">测试账号13800138006密码123456</span>
    <a class="f12" href="{:U('Home/User/reg')}" target="_blank">免费注册</a>
    </div>
    <div class="u-message-error mb10 pl30 f12 u-msg-wrap" id="u-mb-msg" ><i></i>
    	<span class="J-errorMsg">公共场所不建议自动登录，以防帐号丢失</span>
    </div>
    <div class="u-input mb20">
      <label for="loginname" class="u-label u-name"></label>
      <input id="username" type="text" class="u-txt J-txt"   value="" name="username" tabindex="1" placeholder="邮箱/用户名/手机号">
    </div>
    <div class="u-input mb10">
      <label for="loginpwd" class="u-label u-pwd"></label>
      <input id="password" type="password" class="u-txt J-txt" name="password" tabindex="2" placeholder="密码">
        <input id="_token" type="hidden" name="_token" value="{{CSRF_TOKEN()}}">
    </div>
    <div class="u-forget fn-clear">
      <p class="ltxt">
      	<label>
            <input type="hidden" name="referurl" id="referurl" value="{{$refer_url}}">
      	<input type="checkbox" class="ainput" name="chkRememberMe" />自动登录</label>
      </p>
      <a class="f12" href="{{url('user/forget_pwd')}}" target="_blank">忘记密码了？</a>
    </div>
    <div class="u-input u-authcode mt10" id="logincaptcha">
        <div class="u-vcode">
          <input id="verify_code" type="text" tabindex="3" class="u-txt u-txt02 J-txt" name="verify_code" placeholder="验证码">
        </div>
        <div class="u-vcode-img ml5"><img height="40" src="/index.php/Home/User/verify.html" id="verify_code_img"></div>
        <a class="u-change f12" href="javascript:void(0)" onclick="verify(this);">看不清换一张</a>
    </div>
    <div class="u-btn mt20">
  <input id="J_sbmbtn" type="button" tabindex="4" onclick="checkSubmit()" value="登  录">
</div>
</form>
<div class="u-qq">
	<span>您可以用合作伙伴账号登录：</span>
    <a href="{:U('LoginApi/login',array('oauth'=>'qq'))}"  class="qq" title="QQ"></a>
    <a href="{:U('LoginApi/login',array('oauth'=>'alipay'))}"  class="pay" title="支付宝"></a>
    <a href="{:U('LoginApi/login',array('oauth'=>'weixin'))}" class="weixin" title="weixin"></a>
</div>
</div>
</body>
<script>	
function checkSubmit()
{
	$('.u-msg-wrap').hide();
	$('.J-errorMsg').empty();
	var username = $.trim($('#username').val());
	var password = $.trim($('#password').val());
	var referurl = $('#referurl').val();
	var verify_code = $.trim($('#verify_code').val());
	let _token=$('#_token').val();
	if(username == ''){
		showErrorMsg('用户名不能为空!');
		return false;
	}
	if(!checkMobile(username) && !checkEmail(username)){
		showErrorMsg('账号格式不匹配!');
		// return false;
	}
	if(password == ''){
		showErrorMsg('密码不能为空!');
		return false;
	}
	
	if(verify_code == ''){
		showErrorMsg('验证码不能为空!');
		return false;
	}	
	//$('#login-form').submit();
	$.ajax({
		type : 'post',
		url : '/login?t='+Math.random(),
		data : {username:username,password:password,referurl:referurl,verify_code:verify_code,_token:_token},
		dataType : 'json',
		success : function(res){
			if(res.status == 1){
				top.location.href = res.url;
			}else{
				showErrorMsg(res.msg);
				verify();
			}
		},
		error : function(XMLHttpRequest, textStatus, errorThrown) {
			showErrorMsg('网络失败，请刷新页面后重试');
		}
	})
}
   
function checkMobile(tel) {
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

function showErrorMsg(msg){
	$('.u-msg-wrap').show();
	$('.J-errorMsg').html(msg);
}


function verify(){
    $('#verify_code_img').attr('src','/index.php?m=Home&c=User&a=verify&r='+Math.random());
}
</script>
</html>
