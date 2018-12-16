@section('personal_style')
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/myaccount.css')}}">
    <script src="{{asset('js/layer/layer.js')}}" type="text/javascript"></script>
    @endsection
@extends('pc.layouts.home')

@section('body')
<body>
<div class="loginsum_cm">
    <div class="w1224 p">
        <div class="login-dl">
            <a href="/index.php" title="首页">
                <img src="/upload/logo/2018/04-09/814d7e9a0eddcf3754f2e8373a50a19c.png">
            </a>
        </div>
        <div class="login-welcome">
            <span>欢迎登录</span>
        </div>
    </div>
</div>
<div class="loginsum_main" style="background: #bf1919;">
    <div class="w1224 p">
        <div class="advertisement">
            <a href="javascript:void(0);">
                <img src="/upload/ad/2018/04-13/4335611d9ab78af07e93ff2a31d2c895.jpg" title="" style="">
            </a>
        </div>
        <div class="login_form">
            <div class="lo_intext">
                <div class="layel1">
                    <span>账户登录</span>
                    <p style="font-size:12px;line-height:35px;">测试账号:13800138006密码:123456</p>
                </div>
                <form id="loginform" method="post">
                    <div class="layel2">
                        <div class="text_uspa">
                            <label class="judgp uspa_user"></label>
                            <input type="text" autofocus="autofocus" class="text_cmu" value="" placeholder="手机号/邮箱" name="username" id="username" autocomplete="off">
                        </div>
                        <div class="text_uspa">
                            <label class="judgp uspa_pwd"></label>
                            <input type="password" class="text_cmu" value="" placeholder="密码" name="password" id="password" autocomplete="off">
                        </div>
                        <div class="text_uspa check_cum">
                            <input type="text" class="text_cmu" value="" placeholder="验证码" name="verify_code" id="verify_code" autocomplete="off">
                        </div>
                        <div class="check_cum_img">
                            <img src="/index.php?m=Home&amp;c=User&amp;a=verify" id="verify_code_img" onclick="verify()">
                        </div>
                        <div class="sum_reme_for p">
                            <div class="autplog">
                                <!--<label>-->
                                <!--<input type="hidden" name="referurl" id="referurl" value="/index.php/Home/User/index.html">-->
                                <!--<input type="checkbox" class="u-ckb J-auto-rmb"  name="autologin" value="1">自动登录-->
                                <!--</label>--><!--功能没实现-->
                            </div>
                            <div class="foget_pwt">
                                <a href="/index.php/Home/User/forget_pwd.html">忘记密码？</a>
                            </div>
                        </div>
                        <div class="login_bnt">
                            <a href="javascript:void(0);" onclick="checkSubmit();" class="J-login-submit" name="sbtbutton">登&nbsp;&nbsp;&nbsp;&nbsp;录</a>
                        </div>
                        <input type="hidden" name="_token" value="{{CSRF_TOKEN()}}">
                        <input type="hidden" name="pre_url" value="{{url()->previous()}}">
                    </div>
                </form>
                <div class="layel3">
                    <div class="contactsty">
                        <div class="tecant_c">
                            <ul>
                                <li>
                                    <a class="justclix" href="/index.php/home/LoginApi/login/oauth/alipay.html" title="支付宝">
                                        <i class="judgp co_alipay"></i>
                                        <span>支付宝</span>
                                    </a>
                                </li>
                                <li class="spacer"></li>
                                <li>
                                    <a class="justclix" href="/index.php/home/LoginApi/login/oauth/qq.html" title="QQ">
                                        <i class="judgp co_qq"></i>
                                        <span>QQ</span>
                                    </a>
                                </li>
                                <li class="spacer"></li>
                                <li>
                                    <a class="justclix" href="/index.php/home/LoginApi/login/oauth/weixin.html" title="weixin">
                                        <i class="judgp co_wechat"></i>
                                        <span>微信</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="register_c">
                            <a class="justclix" href="{{url('register')}}">
                                <i class="judgp co_register"></i>
                                <span>立即注册</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--footer-s-->
@include('pc.public.footer')
<!--footer-e-->
<script type="text/javascript">
    $(function(){
        $('.text_cmu').focus(function(){
            //焦点获取
            $(this).parents('.text_uspa').addClass('text_uspa_focus');
        })
        $('.text_cmu').blur(function(){
            //失去焦点
            $(this).parents('.text_uspa').removeClass('text_uspa_focus');
        })
    })

    function checkSubmit()
    {
        var username = $.trim($('#username').val());
        var password = $.trim($('#password').val());
        var referurl = $('#referurl').val();
        var verify_code = $.trim($('#verify_code').val());
        if(username == ''){
            showErrorMsg('用户名不能为空!');
            return false;
        }
        if(!checkMobile(username) && !checkEmail(username)){
            // showErrorMsg('账号格式不匹配!');
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
        $.ajax({
            type : 'post',
            url : '/login?t='+Math.random(),
            data : $('#loginform').serialize(),
            dataType : 'json',
            success : function(res){
                if(res.status == 1){
                    // alert(res.url);
                    window.location.href = res.url;
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

    function showErrorMsg(msg){
        layer.alert(msg, {icon: 2});
//        $('.msg-err').show();
//        $('.J-errorMsg').html(msg);
    }

    function verify(){
        $('#verify_code_img').attr('src','/index.php?m=Home&c=User&a=verify&r='+Math.random());
    }

    //回车提交
    $(document).keyup(function(event){
        if(event.keyCode ==13){
            var isFocus=$("#verify_code").is(":focus");
            if(true==isFocus){
                checkSubmit();
            }
        }
    });
</script>

</body>
    @endsection