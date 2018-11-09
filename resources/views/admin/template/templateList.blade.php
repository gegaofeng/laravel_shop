@include("admin.public.layout")
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
    <div class="fixed-bar">
        <div class="item-title">
            <div class="subject">
                <h3>模板管理</h3>
                <h5>网站系统模板索引与管理</h5>
            </div>
            <ul class="tab-base nc-row">
                <li><a href="{:U('Template/templateList',array('t'=>'pc'))}" <if condition="$Request.param.t neq 'mobile'">class="current"</if>><span>PC端模板</span></a></li>
                <li><a href="{:U('Template/templateList',array('t'=>'mobile'))}" <if condition="$Request.param.t eq 'mobile'">class="current"</if>><span>手机端模板</span></a></li>
            </ul>
        </div>
    </div>
    <!-- 操作说明 -->
    <div id="explanation" class="explanation" style="color: rgb(44, 188, 163); background-color: rgb(237, 251, 248); width: 99%; height: 100%;">
        <div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
            <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
            <span title="收起提示" id="explanationZoom" style="display: block;"></span>
        </div>
        <ul>
            <li>启用另一套模板后，如果前台没变化，请先清除缓存</li>
        </ul>
    </div>
    <div class="flexigrid">
        <div class="mDiv">
            <div class="ftitle">
                <h3>模板列表</h3>
                <h5>(共{$template_config|count}条记录)</h5>
            </div>
            <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
        </div>
        <div class="hDiv">
            <div class="hDivBox">
                <table cellspacing="0" cellpadding="0">
                    <thead>
                    <tr>
                        <th class="sign" axis="col0">
                            <div style="width: 24px;"><i class="ico-check"></i></div>
                        </th>
                        <th align="left" abbr="article_title" axis="col3" class="">
                            <div style="text-align: left; width: 120px;" class="">模板名称</div>
                        </th>
                        <th align="left" abbr="ac_id" axis="col4" class="">
                            <div style="text-align: left; width: 250px;" class="">模板备注</div>
                        </th>
                        <th align="left" abbr="article_show" axis="col5" class="">
                            <div style="text-align: center; width: 120px;" class="">模板图片</div>
                        </th>
                        <th align="center" axis="col1" class="handle">
                            <div style="text-align: center; width: 150px;">操作</div>
                        </th>
                        <th style="width:100%" axis="col7">
                            <div></div>
                        </th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
        <div class="bDiv" style="height: auto;">
            <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
                <table>
                    <tbody>
                    <foreach name="template_config" item="val"  key="k" >
                        <tr>
                            <td class="sign">
                                <div style="width: 24px;"><i class="ico-check"></i></div>
                            </td>
                            <td align="left" class="">
                                <div style="text-align: left; width: 120px;">{$val['name']}</div>
                            </td>
                            <td align="left" class="">
                                <div style="text-align: left; width: 250px;">{$val['remark']}</div>
                            </td>
                            <td align="left" class="">
                                <div style="text-align: center; width: 120px;">
                                    <a href="/template/{$t}/{$k}/{$val['img']}" class="pic-thumb-tip" onMouseOver="layer.tips('<img src=/template/{$t}/{$k}/{$val[img]}>',this, {tips: [1, '#fff']});" onMouseOut="layer.closeAll();"><i class="fa fa-picture-o"></i></a>
                                </div>
                            </td>
                            <td align="center" class="handle">
                                <div style="text-align: center; width: 170px; max-width:170px;">
                                    <if condition="$default_theme == $k">
                                        <a href="{:U('Admin/template/changeTemplate',array('key'=>$k,'t'=>$t))}" class="btn blue" style="color: #FFF;background-color: #3598DC;border-color: #2A80B9;"><i class="fa fa-check"></i>启用</a>
                                        <else />
                                        <a href="{:U('Admin/template/changeTemplate',array('key'=>$k,'t'=>$t))}" class="btn blue"><i class="fa fa-check"></i>启用</a>
                                    </if>
                                </div>
                            </td>
                            <td align="" class="" style="width: 100%;">
                                <div>&nbsp;</div>
                            </td>
                        </tr>
                    </foreach>
                    </tbody>
                </table>
            </div>
            <div class="iDiv" style="display: none;"></div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        // 表格行点击选中切换
        $('#flexigrid > table>tbody >tr').click(function(){
            $(this).toggleClass('trSelected');
        });

        // 点击刷新数据
        $('.fa-refresh').click(function(){
            location.href = location.href;
        });

    });

</script>
</body>
</html>