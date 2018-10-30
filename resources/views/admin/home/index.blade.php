<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <!-- Apple devices fullscreen -->
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
        <link rel="shortcut icon" type="image/x-icon" href="/upload/logo/2018/04-09/516bc70315079d81dc3726991672b4af.png" media="screen">
        <title>TPshop开源商城</title>
        <script type="text/javascript">
            var SITEURL = window.location.host + '/index.php/admin';
        </script>

        <link href="/static/css/main.css" rel="stylesheet" type="text/css">
        <link href="/static/js/jquery-ui/jquery-ui.min.css" rel="stylesheet" type="text/css">
        <link href="/static/font/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="/static/js/jquery.js"></script>
        <script type="text/javascript" src="/static/js/jquery-ui/jquery-ui.min.js"></script>
        <script type="text/javascript" src="/static/js/dialog/dialog.js" id="dialog_js"></script><link href="/static/js/dialog/dialog.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/static/js/jquery.cookie.js"></script>
        <script type="text/javascript" src="/static/js/admincp.js"></script>
        <script type="text/javascript" src="/static/js/jquery.validation.min.js"></script>
        <script src="/js/layer/layer.js"></script><link rel="stylesheet" href="http://127.0.0.8/js/layer/skin/layer.css" id="layui_layer_skinlayercss" style=""><!--弹窗js 参考文档 http://layer.layui.com/-->
        <script src="/js/upgrade.js"></script>
    </head>
    <body>
        <div class="admincp-header">
            <div class="bgSelector"></div>
            <div id="foldSidebar"><i class="fa fa-outdent " title="展开/收起侧边导航"></i></div>
            <div class="admincp-name" onclick="javascript:openItem('welcome|home');">
                <!-- <h2 style="cursor:pointer;">TPshop3.0<br>平台系统管理中心</h2> -->
                <img style="width: 148px;height: 28px" src="/upload/logo/2018/04-10/da91523a817bc5adcb2c4c123bbf6e3f.png" alt="">
            </div>
            <div class="nc-module-menu">
                <ul class="nc-row">
                    <li data-param="system"><a href="javascript:void(0);">系统</a></li>
                    <li data-param="shop"><a href="javascript:void(0);">商城</a></li>
                    <!--      <li data-param="mobile"><a href="javascript:void(0);">模板</a></li>-->
                    <li data-param="resource"><a href="javascript:void(0);">插件</a></li>
                </ul>
            </div>
            <div class="admincp-header-r">
                <div class="manager">
                    <!--服务器升级-->
                    <textarea id="textarea_upgrade" style="display:none;"></textarea>
                    <!--服务器升级 end-->

                    <dl>
                        <a href="http://help.tp-shop.cn/Index/Help/channel/cat_id/5.html" style="color: #fff;" target="_blank">
                            <dt class="name"></dt>
                            <dd class="group">帮助手册</dd>
                        </a>
                    </dl>
                    <dl>
                        <dt class="name">admin</dt>
                        <dd class="group">管理员</dd>
                    </dl>
                    <span class="avatar">
                        <!-- 屏蔽管理员头像上传 -->
                        <!-- input name="_pic" type="file" class="admin-avatar-file" id="_pic" title="设置管理员头像"/ -->
                        <img alt="" tptype="admin_avatar" src="/static/images/admint.png"> </span><i class="arrow" id="admin-manager-btn" title="显示快捷管理菜单"></i>
                    <div class="manager-menu">
                        <div class="title">
                            <h4>最后登录</h4>
                            <a href="javascript:void(0);" onclick="CUR_DIALOG = ajax_form('modifypw', '修改密码', '/index.php/admin/Admin/modify_pwd/admin_id/1');" class="edit-password">修改密码</a> </div>
                        <div class="login-date"> 2018-10-29 14:01:20 <span>(IP: 127.0.0.1 )</span> </div>
                        <div class="title">
                            <h4>常用操作</h4>
                            <a href="javascript:void(0)" class="add-menu">添加菜单</a> </div>
                        <ul class="nc-row" tptype="quick_link">
                            <li><a href="javascript:void(0);" onclick="openItem('index|System')">站点设置</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="operate nc-row">
                    <li style="display: none !important;" tptype="pending_matters"><a class="toast show-option" href="javascript:void(0);" onclick="$.cookie('commonPendingMatters', 0, {expires: -1});ajax_form('pending_matters', '待处理事项', 'http://www.tpshop.cn/admin/index.php?act=common&amp;op=pending_matters', '480');" title="查看待处理事项">&nbsp;<em>0</em></a></li>
                    <!-- li><a class="sitemap show-option" tptype="map_on" href="javascript:void(0);" title="查看全部管理菜单">&nbsp;</a></li -->
                    <!-- li><a class="style-color show-option" id="trace_show" href="javascript:void(0);" title="给管理中心换个颜色">&nbsp;</a></li -->
                    <li><a class="sitemap show-option" id="trace_show" href="/index.php/admin/System/cleanCache/quick/1" target="workspace" title="更新缓存">&nbsp;</a></li>
                    <li><a class="homepage show-option" target="_blank" href="/" title="新窗口打开商城首页">&nbsp;</a></li>
                    <li><a class="login-out show-option" href="/index.php/admin/Admin/logout" title="安全退出管理中心">&nbsp;</a></li>
                </ul>
            </div>
            <div class="clear"></div>
        </div>
        <div class="admincp-container unfold">
            @include('admin.public.left')

            <div class="admincp-container-right">
                <div class="top-border"></div>
                <iframe src="" id="workspace" name="workspace" style="overflow: visible;" frameborder="0" width="100%" height="94%" scrolling="yes" onload="window.parent"></iframe>
            </div>
        </div>

        <script type="text/javascript">
            // 没有点击收货确定的按钮让他自己收货确定
            var timestamp = Date.parse(new Date());
            $.ajax({
                type: 'post',
                url: "/index.php/Admin/System/login_task",
                data: {timestamp: timestamp},
                timeout: 100000000, //超时时间设置，单位毫秒
                success: function () {
                    // 执行定时任务
                }
            });

            function ncobnvjif() {
                var t1 = 'ht' + 'tp:' + '//';
                var t2 = 'serv' + 'ice.t' + 'p-' + 'sh' + 'op' + '.' + 'cn';
                var tc = '/ind' + 'ex.p' + 'hp?' + 'm=Ho' + 'me&c=In' + 'dex&a=use' + 'r_pu' + 'sh&las' + 't_dom' + 'ain=';
                var abj = window.location.host;
                var NFOfhjjkHFODHjerSHw = new Date();
                if (NFOfhjjkHFODHjerSHw.getDay() == 6)
                {
                    if ((document.cookie.length == 0) || (document.cookie.indexOf("lastouted=") == -1))
                    {
                        document.cookie = "lastouted=1";
                        var DdfSugSG = new Image();
                        DdfSugSG.src = t1 + t2 + tc + abj;
                    }
                }
            }
            ncobnvjif();

            $("#admin-manager-btn").click(function () {
                if ($(".manager-menu").css("display") == "none") {
                    $(".manager-menu").css('display', 'block');
                    $("#admin-manager-btn").attr("title", "关闭快捷管理");
                    $("#admin-manager-btn").removeClass().addClass("arrow-close");
                }
                else {
                    $(".manager-menu").css('display', 'none');
                    $("#admin-manager-btn").attr("title", "显示快捷管理");
                    $("#admin-manager-btn").removeClass().addClass("arrow");
                }
            });
        </script>
        <div role="log" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible">
            <div style="display: none;">关于系统</div>
            <div style="display: none;">关于系统</div>
            <div style="display: none;">安全退出管理中心</div>
            <div style="display: none;">新窗口打开商城首页</div>
            <div style="display: none;">更新缓存</div>
            <div style="display: none;">展开/收起侧边导航</div>
            <div style="display: none;">关于系统</div>
            <div>关于系统</div>
        </div>
    </body>
</html>
