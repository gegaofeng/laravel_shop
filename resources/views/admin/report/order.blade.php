@include("admin.public.layout")
<link href="__PUBLIC__/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<script src="__PUBLIC__/plugins/daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<div class="wrapper">
    <include file="public/breadcrumb"/>
	<section class="content">
       <div class="row">
       		<div class="col-xs-12">
	       		<div class="box">
	             <div class="box-header">
	               <h3 class="box-title">订单统计</h3>
	             </div><!-- /.box-header -->
	             <div class="box-body">
	           	 <div class="row">
	            	<div class="col-sm-12">
		              <table id="list-table" class="table table-bordered table-striped dataTable" role="grid" aria-describedby="example1_info">
		                 <thead>
		                   <tr role="row">
			                   <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending">ID</th>
                                           <th class="sorting" tabindex="0" aria-controls="example1" >配送方式</th>
			                   <th class="sorting" tabindex="0" aria-controls="example1" >支付方式</th>
			                   <th class="sorting" tabindex="0" aria-controls="example1" >匿名购买数</th>			                   
			                   <th class="sorting" tabindex="0" aria-controls="example1" >会员购买率</th>
			                   <th class="sorting" tabindex="0" aria-controls="example1" >访问购买率</th>
		                  	   <th class="sorting" tabindex="0" aria-controls="example1" >结束时间</th>
		                  	   <th class="sorting" tabindex="0" aria-controls="example1" >操作</th>
		                   </tr>
		                 </thead>
						<tbody>
                                <foreach name="list" item="vo" key="k" >
                                    <tr role="row" align="center">
                                     <td>{$vo.ad_id}</td>
                                     <td>{$ad_position_list[$vo[pid]]}</td>
		                     <td>{$vo.ad_name}</td>
		                     <td>{$vo.media_type}</td>		                    
		                     <td>{$vo.ad_link}</td>
		                     <td>{$vo.start_time|date="Y-m-d",###}</td>
		                     <td>{$vo.end_time|date="Y-m-d",###}</td>
		                     <td>
		                      <a class="btn btn-primary" href="{:U('Ad/ad',array('act'=>'edit','ad_id'=>$vo['ad_id']))}"><i class="fa fa-pencil"></i></a>
		                      <a class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
				      </td>
		                   </tr>
		                  </foreach>
		                   </tbody>
		                 <tfoot>
		                 
		                 </tfoot>
		               </table>
	               </div>
	          </div>
              <div class="row">
              	    <div class="col-sm-6 text-left"></div>
                    <div class="col-sm-6 text-right">{$page}</div>		
              </div>
	          </div>
	        </div>
       	</div>
       </div>
   </section>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#begin').daterangepicker({
		format:"YYYY-MM-DD",
		singleDatePicker: true,
		showDropdowns: true,
		minDate:'2016-01-01',
		maxDate:'2030-01-01',
		startDate:'2016-01-01',
	    locale : {
            applyLabel : '确定',
            cancelLabel : '取消',
            fromLabel : '起始时间',
            toLabel : '结束时间',
            customRangeLabel : '自定义',
            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
            monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月' ],
            firstDay : 1
        }
	});
	
	$('#end').daterangepicker({
		format:"YYYY-MM-DD",
		singleDatePicker: true,
		showDropdowns: true,
		minDate:'2016-01-01',
		maxDate:'2030-01-01',
		startDate:'2016-01-01',
	    locale : {
            applyLabel : '确定',
            cancelLabel : '取消',
            fromLabel : '起始时间',
            toLabel : '结束时间',
            customRangeLabel : '自定义',
            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
            monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月','七月', '八月', '九月', '十月', '十一月', '十二月' ],
            firstDay : 1
        }
	});
});
</script>
</body>
</html>