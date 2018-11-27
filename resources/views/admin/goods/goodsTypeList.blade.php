@include("admin.public.layout")
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品模型</h3>
        <h5>商品模型列表</h5>
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
      <li>商品模型是用来规定某一类商品共有规格和属性的集合，其中规格会影响商品价格，同一个商品不同的规格价格会不同，而属性仅仅是商品的属性特质展示</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>模型列表</h3>
        <h5>(共{{$goods_type_list->total()}}条记录)</h5>
          <div class="fbutton">
              <a href="http://help.tp-shop.cn/Index/Help/info/cat_id/5/id/33.html" target="_blank">
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
              <th class="sign" axis="col0">
                <div style="width: 24px;"><i class="ico-check"></i></div>
              </th>
              <th align="left" abbr="article_title" axis="col3" class="">
                <div style="text-align: left; width: 100px;" class="">ID</div>
              </th>
              <th align="left" abbr="ac_id" axis="col4" class="">
                <div style="text-align: left; width: 150px;" class="">模型名称</div>
              </th>             
              <th align="center" axis="col1" class="handle">
                <div style="text-align: center; width: 350px;">操作</div>
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
        <div class="fbutton"> <a href="{{url('admin/goods/addeditgoodstype')}}">
          <div class="add" title="新增商品模型">
            <span><i class="fa fa-plus"></i>新增商品模型</span>
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
            @foreach($goods_type_list as $list)
              <tr>
                <td class="sign">
                  <div style="width: 24px;"><i class="ico-check"></i></div>
                </td>
                <td align="left" class="">
                  <div style="text-align: left; width: 100px;">{{$list['id']}}</div>
                </td>
                <td align="left" class="">
                  <div style="text-align: left; width: 150px;">{{$list['name']}}</div>
                </td>                
                <td align="center" class="handle">
                  <div style="text-align: center; width: 270px; max-width:350px;">
                    <a href="{{url('admin/goods/goodsattributelist',array('type_id'=>$list['id']))}}" class="btn blue"><i class="fa fa-search"></i>属性列表</a>                   
                    <a href="{{url('admin/goods/speclist/'.$list['id'])}}" class="btn blue"><i class="fa fa-search"></i>规格列表</a>                   
                    <a href="{{url('admin/goods/addeditgoodstype/'.$list['id'])}}" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a> 
                    <a class="btn red"  href="javascript:del_fun('{{url('admin/goods/delgoodstype/'.$list['id'])}}')"><i class="fa fa-trash-o"></i>删除</a>                    
                  </div>
                </td>
                <td align="" class="" style="width: 100%;">
                  <div>&nbsp;</div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="iDiv" style="display: none;"></div>
    </div>
    <!--分页位置--> 
    <div class="dataTables_paginate paging_simple_numbers">
        {{$goods_type_list->links('pc.particals.paginator')}}
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