<include file="public/layout" />
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
	<div class="fixed-bar">
		<div class="item-title">
			<div class="subject">
				<h3>自定义页面管理</h3>
				<h5>自定义页面列表</h5>
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
			<li>自定义页面列表管理, 可创建和编辑自定义手机页面</li>
			<li>可将自定义页面设为首页,若没有设置自定义首页,系统将启用系统默认首页</li>
		</ul>
	</div>
	<div class="flexigrid">
		<div class="mDiv">
			<div class="ftitle">
				<h3>自定义页面列表</h3>
				<h5>(共{$list|count}条记录)</h5>
			</div>
			<div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
			<!--form class="navbar-form form-inline" action="{:U('Admin/index')}" method="get">
				<div class="sDiv">
					<div class="sDiv2">
						<input type="text" size="30" name="keywords" class="qsbox" placeholder="搜索相关数据...">
						<input type="submit" class="btn" value="搜索">
					</div>
				</div>
			</form-->
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
							<div style="text-align: left; width: 100px;" class="">ID</div>
						</th>
						<th align="left" abbr="ac_id" axis="col4" class="">
							<div style="text-align: left; width: 100px;" class="">页面名称</div>
						</th>
						<th align="center" abbr="article_show" axis="col5" class="">
							<div style="text-align: left; width: 100px;" class="">修改时间</div>
						</th>
						<th align="center" abbr="article_time" axis="col6" class="">
							<div style="text-align: left; width: 200px;" class="">是否设为首页</div>
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
		<div class="tDiv">
			<div class="tDiv2">
				<div class="fbutton">
					<a href="{:U('Admin/Block/index')}">
						<div class="add" title="添加新页面">
							<span><i class="fa fa-plus"></i>新建页面</span>
						</div>
					</a>
				</div>
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
								<div style="text-align: left; width: 100px;">{$vo.id}</div>
							</td>
							<td align="left" class="">
								<div style="text-align: left; width: 100px;">{$vo.template_name}</div>
							</td>
							<td align="left" class="">
								<div style="text-align: left; width: 100px;">{$vo.add_time|date="Y-m-d",###}</div>
							</td>
							<td align="left" class="">
							  <div style="text-align: center; width: 80px;">
			                    <if condition='$vo[is_index] eq 1'>
			                      <span class="yes" onClick="changeStatus({$vo.id},{$vo.is_index})" ><i class="fa fa-check-circle"></i>是</span>
			                      <else />
			                      <span class="no" onClick="changeStatus({$vo.id},{$vo.is_index})" ><i class="fa fa-ban"></i>否</span>
			                    </if>
			                  </div>
							</td>
							<td align="center" class="handle">
								<div style="text-align: center; width: 170px; max-width:170px;">
									<a class="btn green" style="display:" target="_black"  href="{:U('Mobile/index/index2',array('id'=>$vo['id']))}"><i class="fa fa-list-alt"></i>预览</a>

									<a href="{:U('Admin/Block/index',array('id'=>$vo['id']))}" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a>
									
									<a class="btn red"  href="javascript:void(0)" data-url="{:U('Admin/Block/delete')}" data-id="{$vo.id}" onClick="delfun(this)"><i class="fa fa-trash-o"></i>删除</a>	
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
		<!--分页位置-->
		{$page} </div>
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

	function changeStatus(id,status){
		$.post('{:U("Admin/Block/set_index")}',{'id':id,'status':status},function(res){
			if(res.result==1){
				window.location.href="/index.php/Admin/Block/pageList";
			}
		},'JSON')
	}


	function delfun(obj) {
		// 删除按钮
		layer.confirm('确认删除？', {
			btn: ['确定', '取消'] //按钮
		}, function () {
			$.ajax({
				type: 'post',
				url: $(obj).attr('data-url'),
				data : {act:'del',id:$(obj).attr('data-id')},
				dataType: 'json',
				success: function (data) {
					layer.closeAll();
					if (data == 1) {
						$(obj).parent().parent().parent().remove();
						layer.closeAll();
					} else {
						layer.alert('删除失败', {icon: 2});  //alert('删除失败');
					}
				}
			})
		}, function () {
		});
	}
</script>
</body>
</html>