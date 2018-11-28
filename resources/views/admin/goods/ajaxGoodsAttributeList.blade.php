<table>
    <tbody>
    @foreach($goods_attribute_list as $list)
        <tr data-id="{{$list['attr_id']}}">
            <td class="sign" axis="col6">
                <div style="width: 24px;"><i class="ico-check"></i></div>
            </td>			 
            <td align="center" axis="col0">
                <div style="width: 50px;">{{$list['attr_id']}}</div>
            </td>                
            <td align="center" axis="col0">
                <div style="text-align: left; width: 100px;">{{$list['attr_name']}}</div>
            </td>
            <td align="center" axis="col0">
                <div style="text-align: center; width: 100px;">{{$list['goods_type']['name']}}</div>
            </td>
            <td align="center" axis="col0">
                <div style="text-align: center; width: 150px;">{{$attr_input_type[$list['attr_input_type']]}}</div>
            </td>
            <td align="center" axis="col0">
                <div style="text-align: center; width: 100px;">{{$list['attr_values']}}</div>
            </td> 
            <td align="center" axis="col0">
                <div style="text-align: center; width: 50px;">
                    @if($list['attr_index']== 1)
                        <span class="yes" onClick="changeTableVal('goods_attribute', 'attr_id', '{{$list['attr_id']}}', 'attr_index', this)" ><i class="fa fa-check-circle"></i>是</span>
                        @else
                        <span class="no" onClick="changeTableVal('goods_attribute', 'attr_id', '{{$list['attr_id']}}', 'attr_index', this)" ><i class="fa fa-ban"></i>否</span>
                    @endif
                </div>
            </td>                                
            <td align="center" axis="col0">                  
                <div style="text-align: center; width: 50px;">
                    <input type="text" onKeyUp="this.value = this.value.replace(/[^\d]/g, '')" onpaste="this.value=this.value.replace(/[^\d]/g,'')" onblur="changeTableVal('goods_attribute', 'attr_id', '{{$list['attr_id']}}', 'order', this)" size="4" value="{{$list['order']}}" />
                </div>                  
            </td>  
            <td align="center" class="handle">
                <div style="text-align: center; width: 170px; max-width:170px;">                   
                    <a class="btn red"  href="javascript:;" onclick="publicHandle({{$list['attr_id']}})"><i class="fa fa-trash-o"></i>删除</a>
                    <a href="{{url('admin/goods/addeditgoodsattribute/'.$list['attr_id'])}}" class="btn blue"><i class="fa fa-pencil-square-o"></i>编辑</a> 
                </div>
            </td>                           
            <td align="" class="" style="width: 100%;">
                <div>&nbsp;</div>
            </td>
        </tr>
    @endforeach   
    @if($goods_attribute_list->isEmpty())
        <tr>
            <td style="text-align:center" colspan="8">
                <div>该分类下没有对应属性</div>
            </td>
        </tr>
    @endif
</tbody>
</table>
<!--分页位置-->
<div class="dataTables_paginate paging_simple_numbers">
    {{$goods_attribute_list->links('pc.particals.paginatorAjax')}}
</div>
<script>
    // 点击分页触发的事件
    $(".pagination  a").click(function () {
        cur_page = $(this).data('p');
        ajax_get_table('search-form2', cur_page);
    });

</script>        