@include("admin.public.layout")
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品属性</h3>
        <h5>商品属性及管理</h5>
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
      <li>商品属性是给用户看的,不牵涉价钱等, 例如, 生产日期,生产地保质期等...</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>属性列表</h3>
        <h5></h5>
          <div class="fbutton">
              <a href="http://help.tp-shop.cn/Index/Help/info/cat_id/5/id/32.html" target="_blank">
                  <div class="add" title="帮助">
                      <span>帮助</span>
                  </div>
              </a>
          </div>
      </div>
        <a href=""><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
	<form action="" id="search-form2" class="navbar-form form-inline" method="post" onSubmit="return false">
      <div class="sDiv">
        <div class="sDiv2"> 
          <select name="type_id" id="type_id"  class="select">
                <option value="">所有模型</option>
                <foreach name="goodsTypeList" item="v" key="k" >
                   <option value="{$v['id']}">{$v['name']}</option>
                </foreach>
           </select>
            <!--排序规则-->             
          <input type="button" onClick="ajax_get_table('search-form2',1)" class="btn" value="搜索"  id="button-filter" />
        </div>
      </div>
     </form>
    </div>
    <div class="hDiv">
      <div class="hDivBox">
        <table cellspacing="0" cellpadding="0" onclick="checkAllSign(this)">
          <thead>
            <tr>
              <th class="sign" axis="col6">
                <div style="width: 24px;"><i class="ico-check"></i></div>
              </th>         
              <th align="left" abbr="article_title" axis="col6" class="">
                <div style="text-align: left; width:50px;" class="">Id</div>
              </th>
              <th align="left" abbr="ac_id" axis="col4" class="">
                <div style="text-align: left; width: 100px;" class="">属性名称</div>
              </th>
              <th align="center" abbr="article_show" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">所属模型</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 150px;" class="">属性值的输入方式</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">可选值列表</div>
              </th>                  
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 50px;" class="">筛选</div>
              </th>                       
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 50px;" class="">排序</div>
              </th>             
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 170px;" class="">操作</div>
              </th>                      
              <th style="width:100%" axis="col7">
                <div></div>
              </th>
            </tr>
          </thead>
        </table>
      </div>
    </div>    
    <div class="tDiv">
      <div class="tDiv2">
        <div class="fbutton">       
          <a href="{:U('Admin/goods/addEditGoodsAttribute')}">
          <div class="add" title="添加属性">
            <span><i class="fa fa-plus"></i>添加属性</span>
          </div>
          </a>          
        </div>
        <div class="fbutton">
          <a href="javascript:;" onclick="publicHandleAll('del')">
              <div class="add" title="批量删除">
                  <span>批量删除</span>
              </div>
          </a>
        </div> 
      </div>
      <div style="clear:both"></div>
    </div>
    <div class="bDiv" style="height: auto;">
     <!--ajax 返回 --> 
      <div id="flexigrid" cellpadding="0" cellspacing="0" border="0" data-url="{:U('admin/goods/delGoodsAttribute')}"></div>
    </div>

     </div>
</div>
<script>
    $(document).ready(function(){
        $('#button-filter').trigger('click'); // 触发点击 搜索框
		 // 表格行点击选中切换
// 表格行点击选中切换
        $(document).on('click','#flexigrid > table>tbody >tr',function(){
            $(this).toggleClass('trSelected');
            var checked = $(this).hasClass('trSelected');
            $(this).find('input[type="checkbox"]').attr('checked',checked);
        });
    });

    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_table(form,page){
		cur_page = page; //当前页面 保存为全局变量
            $.ajax({
                type : "POST",
                url:"/index.php?m=Admin&c=goods&a=ajaxGoodsAttributeList&p="+page,//+tab,
                data : $('#'+form).serialize(),// 你的formid
                success: function(data){
                    $("#flexigrid").html('');
                    $("#flexigrid").append(data);
                }
            });
        }			 	
	 
</script> 
</body>
</html>