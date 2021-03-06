@include("admin.public.layout")
<script type="text/javascript" src="__ROOT__/public/static/js/layer/laydate/laydate.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/js/perfect-scrollbar.min.js"></script>
<body style="background-color: rgb(255, 255, 255); overflow: auto; cursor: default; -moz-user-select: inherit;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title">
      <div class="subject">
        <h3>商品订单</h3>
        <h5>商城实物商品交易订单查询及管理</h5>
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
      <li>点击查看操作将显示订单（包括订单物品）的详细信息</li>
      <li>点击取消操作可以取消订单（在线支付但未付款的订单和货到付款但未发货的订单）</li>
      <li>如果平台已确认收到买家的付款，但系统支付状态并未变更，可以点击收到货款操作(仅限于下单后7日内可更改收款状态)，并填写相关信息后更改订单支付状态</li>
    </ul>
  </div>
  <div class="flexigrid">
    <div class="mDiv">
      <div class="ftitle">
        <h3>订单列表</h3>
        <h5>(共{$page->totalRows}条记录)</h5>
      </div>
      <div title="刷新数据" class="pReload"><i class="fa fa-refresh"></i></div>
	  <form class="navbar-form form-inline"  method="post" action="{:U('Report/userOrder')}"  name="search-form2" id="search-form2">
            <input type="hidden" name="user_id" value="{$user_id}">
            <input type="hidden" value="{$_GET['order_statis_id']|default=0}" name="order_statis_id" id="order_statis_id"/>
      <div class="sDiv">
        <div class="sDiv2">
        	<input type="text" size="30" id="start_time" name="start_time" value="{$start_time}" class="qsbox"  placeholder="下单开始时间">
        </div>
        <div class="sDiv2">
        	<input type="text" size="30" id="end_time" name="end_time" value="{$end_time}" class="qsbox"  placeholder="下单结束时间">
        </div>
        <div class="sDiv2">	   
            <select name="pay_code" class="select sDiv3" style="margin-right:5px;margin-left:5px">
                <option value="">支付方式</option>
                <option value="alipay">支付宝支付</option>
				<option value="weixin">微信支付</option>
             </select>
         </div>
         <div class="sDiv2">	                
          <select  name="keytype" class="select">
            <option value="order_sn">订单编号</option>
            </foreach>            
          </select>
         </div>
         <div class="sDiv2">	 
          <input type="text" size="30" name="keywords"  value="{$keywords}" class="qsbox" placeholder="搜索相关数据...">
        </div>
        <div class="sDiv2">	 
          <input type="submit" class="btn" value="搜索">
        </div>
      </div>
     </form>
    </div>
    <div class="hDiv">
      <div class="hDivBox" id="ajax_return">
        <table cellspacing="0" cellpadding="0">
          <thead>
	        	<tr>
	              <th class="sign" axis="col0">
	                <div style="width: 24px;"><i class="ico-check"></i></div>
	              </th>
	              <th align="left" abbr="order_sn" axis="col3" class="">
	                <div style="text-align: left; width: 130px;" class="">订单编号</div>
	              </th>
	              <th align="left" abbr="consignee" axis="col4" class="">
	                <div style="text-align: left; width: 120px;" class="">收货人</div>
	              </th>
	              <th align="center" abbr="article_show" axis="col5" class="">
	                <div style="text-align: center; width: 60px;" class="">总金额</div>
	              </th>
	              <th align="center" abbr="article_time" axis="col6" class="">
	                <div style="text-align: center; width: 60px;" class="">应付金额</div>
	              </th>
	              <th align="center" abbr="article_time" axis="col6" class="">
	                <div style="text-align: center; width: 60px;" class="">支付方式</div>
	              </th>
	              <th align="center" abbr="article_time" axis="col6" class="">
	                <div style="text-align: center; width: 60px;" class="">配送方式</div>
	              </th>
	              <th align="center" abbr="article_time" axis="col6" class="">
	                <div style="text-align: center; width: 120px;" class="">下单时间</div>
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
      <div style="clear:both"></div>
    </div>
    <div class="bDiv" style="height: auto;">
      <div id="flexigrid" cellpadding="0" cellspacing="0" border="0">
          <table>
              <tbody>
              <if condition="empty($orderList) eq true">
                  <tr data-id="0">
                      <td class="no-data" align="center" axis="col0" colspan="50">
                          <i class="fa fa-exclamation-circle"></i>没有符合条件的记录
                      </td>
                  </tr>
                  <else/>
                  <volist name="orderList" id="list">
                      <tr data-order-id="{$list.order_id}">
                          <td class="sign" axis="col0">
                              <div style="width: 24px;"><i class="ico-check"></i></div>
                          </td>
                          <td align="left" abbr="order_sn" axis="col3" class="">
                              <div style="text-align: left; width: 130px;" class="">{$list.order_sn}</div>
                          </td>
                          <td align="left" abbr="consignee" axis="col4" class="">
                              <div style="text-align: left; width: 120px;" class="">{$list.consignee}:{$list.mobile}</div>
                          </td>
                          <td align="center" abbr="article_show" axis="col5" class="">
                              <div style="text-align: center; width: 60px;" class="">{$list.goods_price}</div>
                          </td>
                          <td align="center" abbr="article_time" axis="col6" class="">
                              <div style="text-align: center; width: 60px;" class="">{$list.order_amount}</div>
                          </td>
                          <td align="center" abbr="article_time" axis="col6" class="">
                              <div style="text-align: center; width: 60px;" class="">{$list.pay_name|default='其他方式'}</div>
                          </td>
                          <td align="center" abbr="article_time" axis="col6" class="">
                              <div style="text-align: center; width: 60px;" class="">{$list.shipping_name}</div>
                          </td>
                          <td align="center" abbr="article_time" axis="col6" class="">
                              <div style="text-align: center; width: 120px;" class="">{$list.add_time|date='Y-m-d H:i',###}</div>
                          </td>
                          <td align="center" axis="col1" class="handle" align="center">
                              <div style="text-align: center; ">
                                <if condition="$list['prom_type'] eq 5">
                                  <a class="btn green" href="{:U('Admin/order/virtual_info',array('order_id'=>$list['order_id']))}">
                                <else/>
                                  <a class="btn green" href="{:U('Admin/order/detail',array('order_id'=>$list['order_id']))}">
                                </if>
                                      <i class="fa fa-list-alt"></i>查看
                                  </a>
                              </div>
                          </td>
                          <td align="" class="" style="width: 100%;">
                              <div>&nbsp;</div>
                          </td>
                      </tr>
                  </volist>
              </if>
              </tbody>
          </table>
          <div class="row">
              <div class="col-sm-6 text-left"></div>
              <div class="col-sm-6 text-right">{$page->show()}</div>
          </div>
      </div>
      <div class="iDiv" style="display: none;"></div>
    </div>
    <!--分页位置--> 
   	</div>
</div>
<script type="text/javascript">

	 
    $(document).ready(function(){	
	  
		
			// 起始位置日历控件
			laydate.skin('molv');//选择肤色
			laydate({
			  elem: '#start_time',
			  format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
			  festival: true, //显示节日
			  istime: false,
			  choose: function(datas){ //选择日期完毕的回调
				 compare_time($('#start_time').val(),$('#end_time').val());
			  }
			});
			 
			 // 结束位置日历控件
			laydate({
			  elem: '#end_time',
			  format: 'YYYY-MM-DD', // 分隔符可以任意定义，该例子表示只显示年月
			  festival: true, //显示节日
			  istime: false,
			  choose: function(datas){ //选择日期完毕的回调
				   compare_time($('#start_time').val(),$('#end_time').val());
			  }
			});	 
			
		
     	
		// 点击刷新数据
		$('.fa-refresh').click(function(){
			location.href = location.href;
		});
		$('.ico-check ' , '.hDivBox').click(function(){
			$('tr' ,'.hDivBox').toggleClass('trSelected' , function(index,currentclass){
	    		var hasClass = $(this).hasClass('trSelected');
	    		$('tr' , '#flexigrid').each(function(){
	    			if(hasClass){
	    				$(this).addClass('trSelected');
	    			}else{
	    				$(this).removeClass('trSelected');
	    			}
	    		});  
	    	});
		});
		 
	});


	function exportReport(){
        var selected_ids = '';
        $('.trSelected' , '#flexigrid').each(function(i){
            selected_ids += $(this).data('order-id')+',';
        });
        if(selected_ids != ''){
            $('input[name="order_ids"]').val(selected_ids.substring(0,selected_ids.length-1));
        }
		$('#search-form2').submit();
	}
</script>
</body>
</html>