<table>
 	<tbody>
 	@if($order_list->isEmpty())
 		<tr data-id="0">
	        <td class="no-data" align="center" axis="col0" colspan="50">
	        	<i class="fa fa-exclamation-circle"></i>没有符合条件的记录
	        </td>
	     </tr>
	@else
 	@foreach($order_list as $list)
  	<tr data-order-id="{$list.order_id}" id="{$list.order_id}">
        <td class="sign" axis="col0">
          <div style="width: 24px;"><i class="ico-check"></i></div>
        </td>
        <td align="left" abbr="order_sn" axis="col3" class="">
          <div style="text-align: left; width: 140px;" class="">{{$list['order_sn']}}</div>
        </td>
        <td align="left" abbr="consignee" axis="col4" class="">
          <div style="text-align: left; width: 120px;" class="">{{$list['consignee']}}:{{$list['mobile']}}</div>
        </td>
        <td align="center" abbr="article_show" axis="col5" class="">
          <div style="text-align: center; width: 60px;" class="">{{$list['goods_price']}}</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 60px;" class="">{{$list['order_amount']}}</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 60px;" class="">{{$order_status[$list['order_status']]}}
              @if($list['is_cod'] == '1')<span style="color: red">(货到付款)</span>
              @endif
          </div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 60px;" class="">{{$pay_status[$list['pay_status']]}}</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 60px;" class="">{{$shipping_status[$list['shipping_status']]}}</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 60px;" class="">{{$list['pay_name'] }}</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 60px;" class="">{{$list['shipping_name']}}</div>
        </td>
        <td align="center" abbr="article_time" axis="col6" class="">
          <div style="text-align: center; width: 120px;" class="">{{date('Y-m-d H:i',$list['add_time'])}}</div>
        </td>
        <td align="left" axis="col1" class="handle" align="center">
        		<div style="text-align: left; ">
        			<a class="btn green" href="{{url('admin/order/detail/'.$list['order_id'])}}"><i class="fa fa-list-alt"></i>查看</a>
        			<if condition="($list['order_status'] eq 3  and $list['pay_status'] eq 0) or ($list['order_status'] eq 5)">
        				<a class="btn red" href="javascript:void(0);" data-order-id="{$list['order_id']}" onclick="del(this)"><i class="fa fa-trash-o"></i>删除</a>
        			</if>
        			<!--<if condition="($list['order_status'] eq 3  and $list['pay_status'] eq 1)">
        				<a class="btn green" href="{:U('Admin/order/detail',array('order_id'=>$list['order_id']))}"><i class="fa fa-list-alt"></i>查看</a>
        			</if>-->
        		</div>
        </td>
		<td style="width: 100%;">
          <div></div>
        </td>
      </tr>
      @endforeach
      @endif
    </tbody>
</table>
<div class="row">
    <div class="col-sm-6 text-left"></div>
    <div class="col-sm-6 text-right">{{$order_list->links('pc.particals.paginatorAjax')}}</div>
    <div class="col-sm-6"><h5>(共{{$order_list->total()}}条记录)</h5></div>
</div>
<script>
    $(".pagination  a").click(function(){
        var page = $(this).data('p');
        ajax_get_table('search-form2',page);
    });
    
 // 删除操作
    function del(obj) {
        layer.confirm('确定要删除吗?', function(){
            var id=$(obj).data('order-id');
            $.ajax({
                type : "POST",
                url: "{:U('Admin/order/delete_order')}",
                data:{order_id:id},
                dataType:'json',
                async:false,
                success: function(data){
                    if(data.status ==1){
                        layer.alert(data.msg, {icon: 1});
                        $('#'+id).remove();
                    }else{
                        layer.alert(data.msg, {icon: 2});
                    }
                },
                error:function(){
                    layer.alert('网络异常，请稍后重试',{icon: 2});
                }
            });
		});
	}
    
    $('.ftitle>h5').empty().html("(共{$pager->totalRows}条记录)");
</script>