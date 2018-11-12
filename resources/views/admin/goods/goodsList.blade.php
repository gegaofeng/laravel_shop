@include("admin.public.layout")
<style>
    span.type-virtual {
        background-color: #3598DC;
        line-height: 16px;
        color: #FFF;
        display: inline-block;
        height: 16px;
        padding: 1px 4px;
        margin-right: 2px;
        box-shadow: inset 1px 1px 0 rgba(255,255,255,0.25);
        cursor: default;
    }
</style>
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品管理</h3>
        <h5>商城所有商品索引及管理</h5>
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
      <li>商品管理注意发布商品后清理缓存.</li>
      <li>商品缩列图也有缓存.</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>商品列表</h3>
        <h5></h5>
          <div class="fbutton">
              <a href="javascript:void(0)" target="_blank">
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
          <select name="cat_id" id="cat_id" class="select">
            <option value="">所有分类</option>
            <foreach name="categoryList" item="v" key="k" >
                <option value="{$v['id']}"> {$v['name']}</option>
            </foreach>
          </select>
          <select name="brand_id" id="brand_id" class="select">
            <option value="">所有品牌</option>
                <foreach name="brandList" item="v" key="k" >
                   <option value="{$v['id']}">{$v['name']}</option>
                </foreach>
          </select>          
          <select name="is_on_sale" id="is_on_sale" class="select">
            <option value="">全部</option>                  
            <option value="1">上架</option>
            <option value="0">下架</option>
          </select>
            <select name="intro" class="select">
                <option value="0">全部</option>
                <option value="is_new">新品</option>
                <option value="is_recommend">推荐</option>
            </select>     

            <!--排序规则-->
            <input type="hidden" name="orderby1" value="goods_id" />
            <input type="hidden" name="orderby2" value="desc" />
          <input type="text" size="30" name="key_word" class="qsbox" placeholder="搜索词...">
          <input type="button" onClick="ajax_get_table('search-form2',1)" class="btn" value="搜索">
        </div>
      </div>
     </form>
    </div>
    <div class="hDiv">
      <div class="hDivBox">
        <table cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="sign" axis="col6" onclick="checkAllSign(this)">
                <div style="width: 24px;"><i class="ico-check"></i></div>
              </th>
              <th align="left" abbr="article_title" axis="col6" class="">
                <div style="text-align: left; width:65px;" class="">操作</div>
              </th>              
              <th align="left" abbr="article_title" axis="col6" class="">
                <div style="text-align: left; width:50px;" class="" onClick="sort('goods_id');">id</div>
              </th>
              <th align="left" abbr="ac_id" axis="col4" class="">
                <div style="text-align: left; width: 300px;" class="" onClick="sort('goods_name');">商品名称</div>
              </th>
              <th align="center" abbr="article_show" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="" onClick="sort('goods_sn');">货号</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="" onClick="sort('cat_id');">分类</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 50px;" class="" onClick="sort('shop_price');">价格</div>
              </th>                  
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 30px;" class="" onClick="sort('is_recommend');">推荐</div>
              </th>                       
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 30px;" class="" onClick="sort('is_new');">新品</div>
              </th>                                     
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 30px;" class="" onClick="sort('is_hot');">热卖</div>
              </th>  
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 50px;" class="" onClick="sort('is_on_sale');">上/下架</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 50px;" class="" onClick="sort('store_count');">库存</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 50px;" class="" onClick="sort('sort');">排序</div>
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
          <a href="{:U('Admin/goods/addEditGoods')}">
          <div class="add" title="添加商品">
            <span><i class="fa fa-plus"></i>添加商品</span>
          </div>
          </a>          
          </div> 
        <div class="fbutton">
            <a href="{:U('Admin/Goods/initGoodsSearchWord')}">
                <div class="add" title="初始化商品搜索关键词">
                    <span><i class="fa fa-plus"></i>初始化商品搜索关键词</span>
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
      <div id="flexigrid" cellpadding="0" cellspacing="0" border="0" data-url="{:U('admin/goods/delGoods')}"></div>
    </div>

     </div>
</div>
<script>
    $(document).ready(function(){
		// 刷选条件 鼠标 移动进去 移出 样式
		$(".hDivBox > table > thead > tr > th").mousemove(function(){
			$(this).addClass('thOver');
		}).mouseout(function(){
			$(this).removeClass('thOver');
		});

        // 表格行点击选中切换
        $(document).on('click','#flexigrid > table>tbody >tr',function(){
            $(this).toggleClass('trSelected');
            var checked = $(this).hasClass('trSelected');
            $(this).find('input[type="checkbox"]').attr('checked',checked);
        });
	});

    $(document).ready(function () {
        // ajax 加载商品列表
        ajax_get_table('search-form2', 1);

    });

    // ajax 抓取页面 form 为表单id  page 为当前第几页
    function ajax_get_table(form, page) {
        cur_page = page; //当前页面 保存为全局变量
        $.ajax({
            type: "POST",
            url: "/api/admin/goods/ajaxgoodslist?page=" + page,//+tab,
            data: $('#' + form).serialize(),// 你的formid
            success: function (data) {
                $("#flexigrid").html('');
                $("#flexigrid").append(data);
            }
        });
    }
	
        // 点击排序
        function sort(field)
        {
           $("input[name='orderby1']").val(field);
           var v = $("input[name='orderby2']").val() == 'desc' ? 'asc' : 'desc';             
           $("input[name='orderby2']").val(v);
           ajax_get_table('search-form2',cur_page);
        }
</script>
</body>
</html>