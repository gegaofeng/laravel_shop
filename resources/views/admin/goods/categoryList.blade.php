@include("admin.public.layout")
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default;">
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品分类管理</h3>
        <h5>网站文章分类添加与管理</h5>
      </div>
    </div>
  </div>
  <div id="explanation" class="explanation">
    <div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span title="收起提示" id="explanationZoom"></span>
    </div>
    <ul>
      <li>温馨提示：顶级分类（一级大类）设为推荐时才会在首页楼层中显示</li>
      <li><a>对分类作任何更改后，都需要到 设置 -&gt; 清理缓存 清理商品分类，新的设置才会生效</a></li>
      <li>最多只能分类到三级</li>
      <li style="color:#ff0000;"><strong>"是否推荐"->设置为推荐之后, 该分类会在首页楼层显示</strong></li>
    </ul>
  </div>
  <form method="post">
    <input type="hidden" value="ok" name="form_submit">
    <div class="flexigrid">
      <div class="mDiv">
        <div class="ftitle">
          <h3>商品分类列表</h3>
          <h5></h5>
            <div class="fbutton">
            <a href="http://help.tp-shop.cn/Index/Help/info/cat_id/5/id/4.html" target="_blank">
                <div class="add" title="帮助">
                    <span>帮助</span>
                </div>
            </a>
        </div>
        </div>
          <a href=""><div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div></a>

      </div>
      <div class="hDiv">
        <div class="hDivBox">
          <table cellspacing="0" cellpadding="0">
            <thead>
              <tr>
                <th align="center" axis="col0" class="sign">
                  <div style="text-align: center; width: 24px;"><i class="ico-check"></i></div>
                </th>
                <th align="center" axis="col1" class="handle"><div style="text-align: center; width: 120px;">操作</div></th>
                <th align="center" axis="col2"><div style="text-align: center; width: 60px;">分类id</div></th>
                <th align="center" axis="col3"><div style="text-align: center; width: 200px;">分类名称</div></th>
                <th align="center" axis="col4"><div style="text-align: center; width: 200px;">手机显示名称</div></th>
                <th align="center" axis="col5"><div style="text-align: center; width: 80px;">是否推荐</div></th>
                <th align="center" axis="col6"><div style="text-align: center; width: 80px;">是否显示</div></th>
                <th align="center" axis="col8"><div style="text-align: center; width: 60px;">分组</div></th>
                <th align="center" axis="col9"><div style="text-align: center; width: 60px;">排序</div></th>                
                <th axis="col10"><div></div></th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
      <div class="tDiv">
        <div class="tDiv2">
        
          <div class="fbutton">
            <a href="{:U('Goods/addEditCategory')}">
              <div title="新增分类" class="add">
                <span><i class="fa fa-plus"></i>新增分类</span>
              </div>
            </a>  
          </div>
          <div class="fbutton">
            <div class="add" title="收缩分类">
              <span onclick="tree_open(this);"><i class="fa fa-angle-double-up"></i>收缩分类</span>
            </div>
          </div>
        </div>
        <div style="clear:both"></div>
      </div>      
      <div style="height: auto;" class="bDiv" id="flexigrid"  data-url="{:U('Goods/delGoodsCategory')}">
        <table cellspacing="0" cellpadding="0" border="0" id="article_cat_table" class="flex-table autoht">
          <tbody id="treet1">
         <foreach name="cat_list" item="vo" key="k" >
          <tr data-level="{$vo[level]}" parent_id_path ="{$vo.parent_id_path}" class="parent_id_{$vo.parent_id}" id="{$vo.level}_{$vo.id}">
              <td class="sign">
                <div style="text-align: center; width: 24px;"> 
                	<img src="/public/static/images/tv-collapsable-last.gif" fieldid="2" status="open" id="icon_{$vo.level}_{$vo.id}" onClick="treeClicked(this,{$vo[id]})">
                </div>
              </td>
              <td class="handle">
                <div style="text-align:center;   min-width:120px !important; max-width:inherit !important;">
                  <span style="margin-left:<?php echo ($vo[level] * 3); ?>em" class="btn"><em><i class="fa fa-cog"></i>设置<i class="arrow"></i></em>
                  <ul>
                    <li><a href="{:U('Goods/addEditCategory',array('id'=>$vo['id']))}">编辑分类信息</a></li>
                    <if condition="$vo[level] lt 3">                  
                    <li><a href="{:U('Goods/addEditCategory',array('parent_id'=>$vo['id']))}">新增下级分类</a></li>
                    </if>
                    <li><a href="javascript:;" onclick="publicHandle({$vo['id']})">删除当前分类</a></li>
                  </ul>
                  </span>
                </div>
              </td>
              <td class="sort">
	              <div style="text-align: center; width: 60px;">{$vo.id}</div>
              </td>
              <td class="name">
                <div style="text-align: center; width: 200px;">
                  <input type="text" value="{$vo.name}" onblur="changeTableVal('goods_category','id','{$vo.id}','name',this)" style="text-align: left; width:180px;"/>
                </div>
              </td>
              <td class="name">
                <div style="text-align: left; width: 200px;">                 
                  <input type="text" value="{$vo.mobile_name}" onblur="changeTableVal('goods_category','id','{$vo.id}','mobile_name',this)" style="text-align: left; width:180px;"/>
                </div>
              </td>
                <td align="center" class="">
                  <div style="text-align: center; width: 80px;">
                    <if condition='$vo[is_hot] eq 1'>
                      <span class="yes" onClick="changeTableVal('goods_category','id','{$vo.id}','is_hot',this)" ><i class="fa fa-check-circle"></i>是</span>
                      <else />
                      <span class="no" onClick="changeTableVal('goods_category','id','{$vo.id}','is_hot',this)" ><i class="fa fa-ban"></i>否</span>
                    </if>
                  </div>
                </td>    
                <td align="center" class="">
                  <div style="text-align: center; width: 80px;">
                    <if condition='$vo[is_show] eq 1'>
                      <span class="yes" onClick="changeTableVal('goods_category','id','{$vo.id}','is_show',this)" ><i class="fa fa-check-circle"></i>是</span>
                      <else />
                      <span class="no" onClick="changeTableVal('goods_category','id','{$vo.id}','is_show',this)" ><i class="fa fa-ban"></i>否</span>
                    </if>
                  </div>
                </td>                     
              <td class="sort">
                <div style="text-align: center; width: 60px;">
                  <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('goods_category','id','{$vo.id}','cat_group',this)" size="4" value="{$vo.cat_group}" />
                </div>
              </td>     
              <td class="sort">
                <div style="text-align: center; width: 60px;">
                  <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('goods_category','id','{$vo.id}','sort_order',this)" size="4" value="{$vo.sort_order}" />
                </div>
              </td>                                          
                                                     
              <td style="width: 100%;">
                <div>&nbsp;</div>
              </td>
            </tr>
           </foreach>                                 
          </tbody>
        </table>        
      </div>
    </div>
</div>
  <script>
      $(document).ready(function(){	
	    // 表格行点击选中切换
	    $('.bDiv > table>tbody >tr').click(function(){
		    $(this).toggleClass('trSelected');
		});				
	 });
      
      // 点击展开 收缩节点
      function  tree_open(obj)
  	{
  		var tree = $('#article_cat_table tr[id^="2_"], #article_cat_table tr[id^="3_"] '); //,'table-row'
  		if(tree.css('display')  == 'table-row')
  		{
  			$(obj).html("<i class='fa fa-angle-double-down'></i>展开分类");
  			tree.css('display','none');
  			$("img[id^='icon_']").attr('src','/public/static/images/tv-expandable.gif');
  		}else
  		{
  			$(obj).html("<i class='fa fa-angle-double-up'></i>收缩分类");
  			tree.css('display','table-row');
  			$("img[id^='icon_']").attr('src','/public/static/images/tv-collapsable-last.gif');
  		}
  	}
       
       function treeClicked(obj,cat_id){
  		 var src = $(obj).attr('src');
  		 if(src == '/public/static/images/tv-expandable.gif')
  		 {
  			 $(".parent_id_"+cat_id).show();
  			 $(obj).attr('src','/public/static/images/tv-collapsable-last.gif');
  		 }else{			 
  			 $(obj).attr('src','/public/static/images/tv-expandable.gif');			 
  			 
  			 // 如果是点击减号, 遍历循环他下面的所有都关闭
  			 var tbl = document.getElementById("article_cat_table");
  			 cur_tr = obj.parentNode.parentNode.parentNode;
  			 var fnd = false;
  			  for (i = 0; i < tbl.rows.length; i++)
  			  {
  				  var row = tbl.rows[i];
  				  
  				  if (row == cur_tr)
  				  {
  					  fnd = true;         
  				  }
  				  else
  				  {
  					  if (fnd == true)
  					  {
  						 
  						  var level = parseInt($(row).data('level'));
  						  var cur_level = $(cur_tr).data('level');
  						 
  						  if (level > cur_level)
  						  {
  							  $(row).hide();		
  							  $(row).find('img').attr('src','/public/static/images/tv-expandable.gif');
  						  }
  						  else
  						  {
  							  fnd = false;
  							  break;
  						  }
  					  }
  				  }
  			  }			 
  		 }		 
  	 }  	
  </script>
</body>
</html>