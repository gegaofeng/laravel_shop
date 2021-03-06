@include("admin.public.layout")
<load href="__ROOT__/public/plugins/Ueditor/ueditor.config.js"/>
<load href="__ROOT__/public/plugins/Ueditor/ueditor.all.min.js"/>
<script type="text/javascript" charset="utf-8" src="__ROOT__/public/plugins/Ueditor/lang/zh-cn/zh-cn.js"></script>
<script src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>

<style type="text/css">
    html, body {
        overflow: visible;
    }
</style>
<body style="background-color: #FFF; overflow: auto;">
<div id="toolTipLayer"
     style="position: absolute; z-index: 9999; display: none; visibility: visible; left: 95px; top: 573px;"></div>
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i
                class="fa fa-arrow-circle-o-left"></i></a>
            <div class="subject">
                <h3>{$Request.param.news_id?'编辑':'新增'}图文素材</h3>
                <h5>微信公众号管理</h5>
            </div>
        </div>
    </div>
    <!-- 操作说明 -->
    <div id="explanation" class="explanation" style="color: rgb(44, 188, 163); background-color: rgb(237, 251, 248); width: 99%; height: 100%;">
        <div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span title="收起提示" id="explanationZoom" style="display: block;"></span>
        </div>
        <ul>
            <li>文章中的图片请使用插件上传，不要使用复制粘贴的方式。</li>
        </ul>
    </div>
    <form class="form-horizontal" id="add_post">
        <div class="ncap-form-default">
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>标题</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="{$info.title}" name="title" class="input-txt">
                    <span class="err" id="err_title"></span>
                    <p class="notic">最多64个字。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>作者</label>
                </dt>
                <dd class="opt">
                    <input type="text" value="{$info.author}" name="author" class="input-txt">
                    <span class="err" id="err_author"></span>
                    <p class="notic">非必填，最多8个字。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>正文</label>
                </dt>
                <dd class="opt">
                    <textarea class="span12 ckeditor" id="post_content" name="content">{$info.content}</textarea>
                    <span class="err" id="err_content"></span>
                    <p class="notic">不多于2万字。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">摘要</dt>
                <dd class="opt">
                    <textarea class="input-txt" name="digest">{$info.digest}</textarea>
                    <span class="err" id="err_digest"></span>
                    <p class="notic">选填，如果不填则抓取正文前54字。不多于120字。</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>原文链接</label>
                </dt>
                <dd class="opt">
                    <input type="text" name="content_source_url" value="{$info.content_source_url}" class="input-txt">
                    <span class="err" id="err_content_source_url"></span>
                    <p class="notic">链接前请带上 http:// 或者 https:// ，不填则不显示</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label><em>*</em>封面</label>
                </dt>
                <dd class="opt">
                    <div class="input-file-show">
                        <span class="show">
                            <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="{$info.thumb_url}">
                                <i id="img_i" class="fa fa-picture-o"
                                    onmouseover="layer.tips('<img src={$info.thumb_url}>',this,{tips: [1, '#fff']});"
                                    onmouseout="layer.closeAll();"></i>
                            </a>
                        </span>
                        <span class="type-file-box">
                            <!--<input type="hidden" value="{$info.thumb_media_id}" name="thumb_media_id">-->
                            <input type="text" id="thumb_url" name="thumb_url" value="{$info.thumb_url}" class="type-file-text">
                            <input type="button" id="button1" value="选择上传..." class="type-file-button">
                            <input class="type-file-file" onClick="GetUploadify(1,'','weixin_mp_image','img_call_back')" size="30"
                                 title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                        </span>
                    </div>
                    <span class="err" id="err_thumb_media_id"></span>
                    <p class="notic">请上传图片格式文件</p>
                </dd>
            </dl>
            <dl class="row">
                <dt class="tit">
                    <label>显示封面</label>
                </dt>
                <dd class="opt">
                    <div class="onoff">
                        <label for="show1" class="cb-enable <if condition=" $info[show_cover_pic] eq 1">selected</if>">是</label>
                        <label for="show0" class="cb-disable <if condition=" $info[show_cover_pic] eq 0">selected</if>">否</label>
                        <input id="show1" name="show_cover_pic" value="1" type="radio"<if condition="$info[show_cover_pic] eq 1"> checked="checked"</if>>
                        <input id="show0" name="show_cover_pic" value="0" type="radio"<if condition="$info[show_cover_pic] eq 0"> checked="checked"</if>>
                    </div>
                    <p class="notic">是否在正文开始处显示封面</p>
                </dd>
            </dl>
            <div class="bot">
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="verifyForm()">提 交</a>
                <a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-red" onclick="onDelete('{$Request.param.news_id}')">删 除</a>
            </div>
        </div>
        <input type="hidden" id="material_id" name="material_id" value="{$Request.param.material_id}">
        <input type="hidden" id="news_id" name="news_id" value="{$Request.param.news_id}">
    </form>
</div>

<script type="text/javascript">
    var url = "{:url('Ueditor/index',array('savePath'=>'weixin_mp_news'))}";
    var ue = UE.getEditor('post_content', {
        serverUrl: url,
        zIndex: 999,
        initialFrameWidth: "80%", //初化宽度
        initialFrameHeight: 300, //初化高度
        focus: false, //初始化时，是否让编辑器获得焦点true或false
        maximumWords: 20000, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign',//允许的最大字符数 'fullscreen',
        pasteplain: false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
        autoHeightEnabled: true
    });

    function verifyForm() {
        $('span.err').hide();
        $.ajax({
            type: "POST",
            url: "{:U('wechat/handle_news')}",
            data: $('#add_post').serialize(),
            dataType: "json",
            error: function () {
                layer.alert("服务器繁忙, 请联系管理员!");
            },
            success: function (data) {
                if (data.status === 1) {
                    layer.msg(data.msg, {icon: 1, time: 1000}, function () {
                        location.href = "{:U('wechat/materials', ['tab' => 'news'])}";
                    });
                } else if (data.status === 0) {
                    layer.msg(data.msg, {icon: 2, time: 1000});
                    $.each(data.result, function (index, item) {
                        $('#err_' + index).text(item).show();
                    });
                } else {
                    layer.msg(data.msg, {icon: 2, time: 1000});
                }
            }
        });
    }

    function img_call_back(fileurl_tmp) {
        $("#thumb_url").val(fileurl_tmp);
        $("#img_a").attr('href', fileurl_tmp);
        $("#img_i").attr('onmouseover', "layer.tips('<img src=" + fileurl_tmp + ">',this,{tips: [1, '#fff']});");
    }

    function onDelete(id) {
        layer.confirm("确定删除文章吗？", function(){
            $.ajax({
                url: "{:url('delete_single_news')}?news_id=" + id,
                type: 'POST',
                dataType: 'json',
                success: function (res) {
                    if (res.status === 1) {
                        return layer.msg(res.msg, {time: 500, icon: 1}, function () {
                            window.location.href = "{:url('materials', ['tab' => 'news'])}";
                        });
                    }
                    var msg = (typeof res.status === 'undefined') ? '数据格式出错' : res.msg;
                    layer.alert(msg, {icon:2});
                },
                error: function () {
                    layer.alert('服务器繁忙！', {icon: 2});
                }
            });
        });
    }

</script>
</body>
</html>