<!doctype html>
<html>
@include('admin.public.layout')
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
	<div id="list">
		<div class="fixed-bar">
			<div class="item-title">
				<div class="subject">
					<h3>地区设置</h3>
					<h5>可对系统内置的地区进行编辑</h5>
				</div>
			</div>
		</div>
		<!-- 操作说明 -->
		<div id="explanation" class="explanation" style=" width: 99%; height: 100%;">
			<div id="checkZoom" class="title"><i class="fa fa-lightbulb-o"></i>
				<h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
				<span title="收起提示" id="explanationZoom" style="display: block;"></span>
			</div>
			<ul>
				<li>系统省市县区镇基础数据都在此处设置, 请谨慎操作。</li>
				<li>"所在层级"位该区域所在层级，如省层级为1，市层级为2，区县层级为3 乡镇层级为4</li>
			</ul>
		</div>
		<div class="flexigrid">
			<div class="mDiv">
				<div class="ftitle">
					<h3>地区列表</h3>
					<h5>(共{$region|count}张记录)</h5>
				</div>
				<div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
				<notempty name="parent_path"><div title="上级区域" class="pReload">上级区域:{$parent_path}</div></notempty>
			</div>
			<div class="hDiv">
				<div class="hDivBox">
					<table cellspacing="0" cellpadding="0">
						<thead>
						<tr>
							<th class="sign" axis="col0">
								<div style="width: 24px;">
									<i class="ico-check"></i>
								</div>
							</th>
							<th axis="col1" class="handle" align="center">
								<div style="text-align: center; width: 150px;">操作</div>
							</th>
							<th axis="col2" class="" align="left">
								<div style="text-align: left; width: 200px;">地区</div>
							</th>
							<th axis="col4" class="" align="left">
								<div style="text-align: left; width: 100px;">所在层级</div>
							</th>
							<th axis="col5" class="" align="center">
								<div style="text-align: center; width: 140px;">上级地区ID</div>
							</th>
							<th style="width:100%" axis="col6"><div></div></th>
						</tr>
						</thead>
					</table>
				</div>
			</div>
			<div class="tDiv">
				<div class="tDiv2">
					<div class="fbutton">
						<div class="add" title="新增数据">
							<span onclick="add_region(1);"><i class="fa fa-plus"></i>新增数据</span>
						</div>
					</div>
					<div class="fbutton">
						<div class="up" title="返回上级地区">
							<span onclick="return_top_level();"><i class="fa fa-level-up"></i>返回上级地区</span>
						</div>
					</div>
					<div class="fbutton">
						<a href="{:U('Admin/Goods/initLocationJsonJs')}">
							<div class="add" title="初始化地址json文件">
								<span><i class="fa fa-plus"></i>初始化地址json文件</span>
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
						<foreach name="region" item="vo" key="k" >
							<tr id="row130" data-id="130" class="">
								<td class="sign">
									<div style="width: 24px;"><i class="ico-check"></i></div>
								</td>
								<td class="handle" align="center">
									<div style="text-align: center; width: 150px;">
										<a class="btn red" data-url="{:U('Tools/regionHandle',array('id'=>$vo[id]))}"  onclick="delRegion(this);"><i class="fa fa-trash-o"></i>删除</a>
										<span class="btn"><em><i class="fa fa-cog"></i>设置 <i class="arrow"></i></em><ul>
										<li><a href="{:U('Admin/Tools/region',array('op'=>'add','parent_id'=>$vo['id']))}">新增下级</a></li>
										<li><a href="{:U('Admin/Tools/region',array('parent_id'=>$vo['id']))}">查看下级</a></li>
									</ul></span></div>
								</td>
								<td class="" align="left">
									<div style="text-align: left; width: 200px;">{$vo.name}</div>
								</td>
								<td class="" align="left">
									<div style="text-align: left; width: 100px;">{$vo.level}</div>
								</td>
								<td class="" align="center">
									<div style="text-align: center; width: 140px;">{$vo.parent_id}</div>
								</td>
								<td class="" style="width: 100%;" align="">
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
	<div id="add_region" style="display: none">
		<div class="page">
			<div class="fixed-bar">
				<div class="item-title"><a class="back" onclick="add_region(0);" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
					<div class="subject">
						<h3>地区设置 - 新增</h3>
						<h5>地区新增与编辑</h5>
					</div>
				</div>
			</div>
			<form id="add_region_form" method="post" action="{:U('Tools/regionHandle')}">
				<input type="hidden" name="level" value="{$parent.level}">
				<input type="hidden" name="parent_id" value="{$parent.id}">
				<div class="ncap-form-default">
					<notempty name="parent_path">
						<dl class="row">
							<dt class="tit">
								<label for="name"><em></em>上级区域:</label>
							</dt>
							<dd class="opt"><label for="name">{$parent_path}</label></dd>
						</dl>
					</notempty>
					<dl class="row">
						<dt class="tit">
							<label for="name"><em>*</em>地区名</label>
						</dt>
						<dd class="opt">
							<input id="name" name="name" value="" maxlength="20" class="input-txt" type="text">
							<span class="err"></span>
							<p class="notic">请认真填写地区名称，地区设定后将直接影响订单、收货地址等重要信息，请谨慎操作。</p>
						</dd>
					</dl>
					<div class="bot"><a href="JavaScript:void(0);" class="ncap-btn-big ncap-btn-green" onclick="$('#add_region_form').submit();">确认提交</a></div>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	<if condition="$Request.param.op eq 'add'">
			add_region(1);
	</if>
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
	function add_region(mode){
		if(mode == 1){
			$('#add_region').show();
			$('#list').hide();
		}else{
			$('#add_region').hide();
			$('#list').show();
		}
	}
	function return_top_level()
	{
		window.location.href = "{:U('Tools/region',array('parent_id'=>$parent[parent_id]))}";
	}

	function delRegion(obj){
		layer.confirm('确定删除此地区？', {icon: 3, title:'提示删除'}, function(index){
			layer.close(index);
			window.location.href = $(obj).attr('data-url');
		});
	}
</script>
</body>
</html>