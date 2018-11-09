@include("admin.public.layout")
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>品牌列表</h3>
        <h5>网站系统文章索引与管理</h5>
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
      <li>同一个品牌可以添加多次.</li>
      <li>比如卖笔记本下面一个苹果品牌. 卖手机下面也有苹果牌,卖箱包下面也有苹果牌.</li>      
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>品牌列表</h3>
        <h5>(共{$pager->totalRows}条记录)</h5>
      </div>
      <a href=""><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>
	<form id="search-form2" class="navbar-form form-inline"  method="post" action="{:U('Admin/Goods/brandList')}">
      <div class="sDiv">             
        <div class="sDiv2">
		      <input type="text" class="qsbox" id="input-order-id" placeholder="搜索词" value="{$_POST['keyword']}" name="keyword">                                        
          <input type="submit" class="btn" value="搜索">
        </div>
      </div>
     </form>
    </div>
    <div class="hDiv">
      <div class="hDivBox">
        <table cellspacing="0" cellpadding="0">
          <thead>
            <tr>
              <th class="sign" axis="col0" onclick="checkAllSign(this)">
                <div style="width: 24px;"><i class="ico-check"></i></div>
              </th>
                <th align="left" abbr="article_title" axis="col3" class="">
                    <div style="text-align: center; width: 50px;" class="">品牌ID</div>
                </th>
              <th align="left" abbr="article_title" axis="col3" class="">
                <div style="text-align: left; width: 200px;" class="">品牌名称</div>
              </th>
              <th align="left" abbr="ac_id" axis="col4" class="">
                <div style="text-align: left; width: 100px;" class="">Logo</div>
              </th>
              <th align="center" abbr="article_show" axis="col5" class="">
                <div style="text-align: center; width: 200px;" class="">品牌分类</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">是否推荐</div>
              </th>     
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">排序</div>
              </th>                      
              <th align="center" axis="col1" class="handle">
                <div style="text-align: center; width: 100px;">操作</div>
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
            <a href="{:U('Admin/Goods/addEditBrand')}">
              <div class="add" title="新增品牌">
                  <span><i class="fa fa-plus"></i>新增品牌</span>
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
      <div id="flexigrid" cellpadding="0" cellspacing="0" border="0" data-url="{:U('Admin/goods/delBrand')}">
        <table>
          <tbody>
            <volist name="brandList" id="list">
              <tr data-id="{$list[id]}">
                <td class="sign">
                  <div style="width: 24px;"><i class="ico-check"></i></div>
                </td>
                  <td align="left" class="">
                      <div style="text-align: center; width: 50px;">{$list.id}</div>
                  </td>
                <td align="left" class="">
                  <div style="text-align: left; width: 200px;">{$list.name}</div>
                </td>
                <td align="left" class="">
                  <div style="text-align: left; width: 100px;">
	                  <a href="{$list.logo}" target="_blank"><img onMouseOver="$(this).attr('width','80').attr('height','45');" onMouseOut="$(this).attr('width','40').attr('height','30');" width="40" height="30" src="{$list.logo}"/></a>
                  </div>
                </td>
                <td align="center" class="">
                  <div style="text-align: center; width: 200px;">{$cat_list[$list[parent_cat_id]]} {$cat_list[$list[cat_id]]}</div>
                </td>                
                <td align="center" class="">
                  <div style="text-align: center; width: 100px;">
                    <if condition='$list[is_hot] eq 1'>
                      <span class="yes" onClick="changeTableVal('brand','id','{$list.id}','is_hot',this)" ><i class="fa fa-check-circle"></i>是</span>
                      <else />
                      <span class="no" onClick="changeTableVal('brand','id','{$list.id}','is_hot',this)" ><i class="fa fa-ban"></i>否</span>
                    </if>
                  </div>
                </td>               
              <td align="center">
                <div style="text-align: center; width: 100px;">
                  <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('brand','id','{$list.id}','sort',this)" size="4" value="{$list.sort}" />
                </div>
              </td>
                <td align="center" class="handle">
                  <div style="text-align: center; width: 100px;">                    
                    <a class="btn red"  href="javascript:void(0)"  onclick="publicHandle('{$list[id]}','del')" ><i class="fa fa-trash-o"></i>删除</a>
                    <a href="{:U('Admin/goods/addEditBrand',array('id'=>$list['id'],'p'=>$_GET[p]))}" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a> </div>
                  </div>
                </td>
                <td align="" class="" style="width: 100%;">
                  <div>&nbsp;</div>
                </td>
              </tr>
            </volist>
          </tbody>
        </table>
	 <!--分页位置--> {$show}</div>        
      </div>       
    </div>    
</div>
<script>
    // 表格行点击选中切换
    $(document).on('click','#flexigrid > table>tbody >tr',function(){
        $(this).toggleClass('trSelected');
        var checked = $(this).hasClass('trSelected');
        $(this).find('input[type="checkbox"]').attr('checked',checked);
    });
</script>
</body>
</html>