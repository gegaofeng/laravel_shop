@include("admin.public.layout")
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>广告列表</h3>
        <h5>广告索引与管理</h5>
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
      <li>只需要点击半透明广告图片即可更换广告.</li>
      <li>预览广告所在页面中选择更换你的广告</li>      
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>广告列表</h3>
        <h5>(共{$pager->totalRows}条记录)</h5>
      </div>
      <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>	   
	  <form class="navbar-form form-inline" action="{:U('Ad/adList')}" method="post">
      <div class="sDiv">             
        <div class="sDiv2">
         <select name="pid" class="form-control">
              <option value="0">==查看所有==</option>
              <volist name="ad_position_list" id="item" key="k">
                <option value="{$item.position_id}">{$item.position_name}</option>
              </volist>                  
         </select>
         <input type="text" name="keywords" class="qsbox" placeholder="请输入广告名称">         
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
              <th class="sign" axis="col0">
                <div style="width: 24px;"><i class="ico-check"></i></div>
              </th>
              <th align="left" abbr="article_title" axis="col3" class="">
                <div style="text-align: left; width: 50px;" class="">广告id</div>
              </th>
              <th align="left" abbr="ac_id" axis="col4" class="">
                <div style="text-align: left; width: 200px;" class="">广告位置</div>
              </th>
              <th align="center" abbr="article_show" axis="col5" class="">
                <div style="text-align: center; width: 100px;" class="">广告名称</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">广告图片</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">新窗口</div>
              </th>
              <th align="center" abbr="article_time" axis="col6" class="">
                <div style="text-align: center; width: 100px;" class="">显示</div>
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
        <div class="fbutton"><a href="{:U('Ad/ad')}"><div class="add" title="新增广告"><span><i class="fa fa-plus"></i>新增广告</span></div></a></div>
		<div class="fbutton"><a href="{:U('admin/ad/editAd',array('request_url'=>urlencode('home/User/login')))}"><div class="add" title="登录页"><span><i class="fa fa-search"></i>登录页</span></div></a></div>
        <div class="fbutton"><a href="{:U('admin/ad/editAd',array('request_url'=>urlencode('home/Index/index')))}"><div class="add" title="首页"><span><i class="fa fa-search"></i>PC首页</span></div></a></div>
        <div class="fbutton"><a href="{:U('admin/ad/editAd',array('request_url'=>urlencode('mobile/Index/index')))}"><div class="add" title="手机首页"><span><i class="fa fa-search"></i>手机首页</span></div></a></div>
        <div class="fbutton"><a href="{:U('admin/ad/editAd',array('request_url'=>urlencode('mobile/Goods/categoryList')))}"><div class="add" title="手机分类页"><span><i class="fa fa-search"></i>手机分类页</span></div></a></div>
        <if condition="$is_exists_api eq 1">
        	<div class="fbutton">
        	<span style="width:120px;height:80px">APP端广告位</span>
        	<select id="app_ad" class="form-control">
              	<option value="0">==APP端广告位==</option>
                <option value="1">首页</option>
                <option value="2">分类页</option> 
                <option value="4">品牌街</option>
                <option value="5">团购</option>
                <option value="6">积分商城</option> 
         	</select>
        </div>
        </if>
                
      </div>
      <div style="clear:both"></div>
    </div>
    <div class="bDiv" style="height: auto;">
      <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
        <table>
          <tbody>
            <foreach name="list" item="vo" key="k" >
              <tr>
                <td class="sign">
                  <div style="width: 24px;"><i class="ico-check"></i></div>
                </td>
                <td align="left" class="">
                  <div style="text-align: left; width: 50px;">{$vo[ad_id]}</div>
                </td>
                <td align="left" class="">
                  <div style="text-align: left; width: 200px;">{$ad_position_list[$vo[pid]][position_name]}</div>
                </td>                
                <td align="left" class="">
                  <div style="text-align: left; width: 100px;">{$vo.ad_name}</div>
                </td>
                <td align="center" class="">
                  <div style="text-align: center; width: 100px;"><img src="{$vo.ad_code}" width="80px" height="45px"></div>
                </td>      
                <td align="center" class="">
                  <div style="text-align: center; width: 100px;">
                    <if condition='$vo[target] eq 1'>
                      <span class="yes" onClick="changeTableVal('ad','ad_id','{$vo.ad_id}','target',this)" ><i class="fa fa-check-circle"></i>是</span>
                      <else />
                      <span class="no" onClick="changeTableVal('ad','ad_id','{$vo.ad_id}','target',this)" ><i class="fa fa-ban"></i>否</span>
                    </if>
                  </div>
                </td>   
                <td align="center" class="">
                  <div style="text-align: center; width: 100px;">
                    <if condition='$vo[enabled] eq 1'>
                      <span class="yes" onClick="changeTableVal('ad','ad_id','{$vo.ad_id}','enabled',this)" ><i class="fa fa-check-circle"></i>是</span>
                      <else />
                      <span class="no" onClick="changeTableVal('ad','ad_id','{$vo.ad_id}','enabled',this)" ><i class="fa fa-ban"></i>否</span>
                    </if>
                  </div>
                </td>                             
              <td align="center">
                <div style="text-align: center; width: 100px;">
                  <input type="text" onKeyUp="this.value=this.value.replace(/[^\d]/g,'')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onBlur="changeTableVal('ad','ad_id','{$vo.ad_id}','orderby',this)" size="4" value="{$vo.orderby}" />
                </div>
              </td>
                <td align="center" class="handle">
                  <div style="text-align: center; width: 100px;">                    
                    <a class="btn red" onClick="delfunc(this)" data-url="{:U('Ad/adHandle')}" data-id="{$vo.ad_id}"><i class="fa fa-trash-o"></i>删除</a>                                                            
                    <a href="{:U('Ad/ad',array('act'=>'edit','ad_id'=>$vo['ad_id']))}" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a> </div>
                  </div>
                </td>
                <td align="" class="" style="width: 100%;">
                  <div>&nbsp;</div>
                </td>
              </tr>
            </foreach>
          </tbody>
        </table>
	 <!--分页位置--> 
    {$pager->show()} </div>        
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
		
		$("#app_ad").on("change",function(){
			var addType = parseInt($('#app_ad option:selected') .val());
			var url = "un url";  
			switch(addType){
				case 1:
					url = "{:U('admin/ad/editAd',array('request_url'=>urlencode('api/ad/ad_home')))}";
					break;
				case 2:
					url = "{:U('admin/ad/editAd',array('request_url'=>urlencode('api/ad/ad_category')))}";
					break;
				case 3:
					url = "{:U('admin/ad/editAd',array('request_url'=>urlencode('api/ad/ad_common'), 'img_url'=>'ad_store_street.png','pid'=>'532'))}";
					break;
				case 4:
					url = "{:U('admin/ad/editAd',array('request_url'=>urlencode('api/ad/ad_common'), 'img_url'=>'ad_brand_street.png','pid'=>'533'))}";
					break;
				case 5:
					url = "{:U('admin/ad/editAd',array('request_url'=>urlencode('api/ad/ad_common'), 'img_url'=>'ad_group_buy.png','pid'=>'534'))}";
					break;
				case 6:
					url = "{:U('admin/ad/editAd',array('request_url'=>urlencode('api/ad/ad_common'), 'img_url'=>'ad_integrall.png','pid'=>'535'))}";
					break;
				default:
					return;
			} 
			window.location.href = url;
		}); 
	});
    function delfunc(obj){
      layer.confirm('确认删除？', {
                btn: ['确定','取消'] //按钮
              }, function(){
                // 确定
                $.ajax({
                  type : 'post',
                  url : $(obj).attr('data-url'),
                  data : {act:'del',del_id:$(obj).attr('data-id')},
                  dataType : 'json',
                  success : function(data){
                    layer.closeAll();
                    if(data.status==1){
                      layer.msg(data.msg, {icon: 1});
                      $(obj).parent().parent().parent('tr').remove();
                    }else{
                      layer.msg(data.msg, {icon: 2,time: 2000});
                    }
                  }
                })
              }, function(index){
                layer.close(index);
              }
      );
    }
</script>
</body>
</html>