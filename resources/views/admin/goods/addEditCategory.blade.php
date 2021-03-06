@include("admin.public.layout")
<body style="background-color: #FFF; overflow: auto;">
<div id="append_parent"></div>
<div id="ajaxwaitid"></div>
<div class="page">
  <div class="fixed-bar">
    <div class="item-title"><a class="back" href="javascript:history.back();" title="返回列表"><i class="fa fa-arrow-circle-o-left"></i></a>
      <div class="subject">
        <h3>商品分类 - 添加修改分类</h3>
        <h5>添加或编辑商品分类</h5>
      </div>
    </div>
  </div>
  <div class="explanation" id="explanation">
    <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
      <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
      <span id="explanationZoom" title="收起提示"></span>
    </div>
    <ul>
      <li>商品分类最多分为三级</li>
      <li>添加或者修改分类时, 应注意选择对应的上级</li>
      <li><strong>关于分类图标替换:</strong></li>
      <li>1.WEB(PC)端的图标直接找到分类图替换即可, 图标路径:template/pc/rainbow/static/images/ico-tphsop-index.png</li>
      <li>2.WAP,APP端的图标在下列编辑框"分类展示图片"上传即可<strong>(特别注意:该图标有且仅是第三级分类才有效)</strong></li>
    </ul>
  </div>
  <form action="{{url('admin/goods/addeditcategory')}}" method="post" class="form-horizontal" id="category_form">
    <div class="ncap-form-default">
      <dl class="row">
        <dt class="tit">
          <label for="t_mane"><em>*</em>分类名称</label>
        </dt>
        <dd class="opt">
          <input type="text" placeholder="名称" class="input-txt" name="name" value="{{$goods_category_info['name']}}">
          <span class="err" id="err_name" style="color:#F00; display:none;"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="t_mane"><em>*</em>手机分类名称</label>
        </dt>
        <dd class="opt">
          <input type="text" placeholder="手机分类名称" class="input-txt" name="mobile_name" value="{{$goods_category_info['mobile_name']}}">
          <span class="err" id="err_mobile_name" style="color:#F00; display:none;"></span>
          <p class="notic"></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit" colspan="2">
          <label class="" for="s_sort">上级分类</label>
        </dt>
        <dd class="opt">
          <div id="gcategory">
            <select name="parent_id" id="parent_id" class="class-select valid">
                <option value="0">顶级分类</option>
		@foreach($cat_list as $key=>$cat)
                @if($goods_category_info['parent_id']==$cat['id'])
                <option value="{{$cat['id']}}" selected="selected">{{$cat['name']}}</option>
                @else
                <option value="{{$cat['id']}}">{{$cat['name']}}</option>
                @endif
                @foreach($cat['tmenu'] as $key2=>$cat2)
                @if($goods_category_info['parent_id']==$cat2['id'])
                <option value="{{$cat2['id']}}" selected="selected">&nbsp;&nbsp{{$cat2['name']}}</option>
                @else
                <option value="{{$cat2['id']}}">&nbsp;&nbsp{{$cat2['name']}}</option>
                @endif
                @endforeach   
                @endforeach                          
            </select>                    
          </div>
          <p class="notic">如果选择上级分类，那么新增的分类则为被选择上级分类的子分类</p>
        </dd>
      </dl>
	  <dl class="row">
        <dt class="tit">
          <label for="t_mane"><em>*</em>导航显示</label>
        </dt>
        <dd class="opt">
          <div class="onoff">
            <label for="goods_category1" class="cb-enable 
                   @if($goods_category_info['is_show']== 1)selected
                   @endif">是</label>
            <label for="goods_category0" class="cb-disable 
                   @if($goods_category_info['is_show']==0)selected
                   @endif">否</label>
            <input id="goods_category1" name="is_show" value="1" type="radio" 
                   @if($goods_category_info['is_show']== 1)checked="checked"
                   @endif
                   >
            <input id="goods_category0" name="is_show" value="0" type="radio" 
            @if($goods_category_info['is_show']== 0)checked="checked"
            @endif
            >
          </div>
          <p class="notic">是否在导航栏显示</p>
        </dd>        
      </dl>    
      
	   <dl class="row">
        <dt class="tit" colspan="2">
          <label class="" for="s_sort">分类分组</label>
        </dt>
        <dd class="opt">
          <div>
              <select name="cat_group" id="cat_group" class="form-control">
                <option value="0">0</option>
                @for($i=1;$i<=20;$i++)
                <option value='1' 
              @if($goods_category_info['cat_group']==$i) selected='selected'
              @endif
              >{{$i}}</option>"
                @endfor
              </select>                             
          </div>
          <p class="notic">有时候左侧菜单栏同一行显示多个分类, 所以给他们一个分组</p>
        </dd>
      </dl>

      <dl class="row">
        <dt class="tit">
          <label>分类展示图片</label>
        </dt>
        <dd class="opt">
          <div class="input-file-show">
            <span class="show">
                <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="{{$goods_category_info['image']}}">
                  <i id="img_i" class="fa fa-picture-o" onmouseover="layer.tips('<img src={{$goods_category_info['image']}}>',this,{tips: [1, '#fff']});" onmouseout="layer.closeAll();"></i>
                </a>
            </span>
            <span class="type-file-box">
                <input type="text" id="image" name="image" value="{{$goods_category_info['image']}}" class="type-file-text">
                <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                <input class="type-file-file" onClick="GetUploadify(1,'','category','img_call_back')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
            </span>
          </div>
          <span class="err"></span>
          <p class="notic"><strong style="color:orange;">此分类图片用于手机端显示, 并有且仅是第三级分类上传的图片才有效</strong></p>
        </dd>
      </dl>
      <dl class="row">
        <dt class="tit">
          <label for="t_sort"><em>*</em>排序</label>
        </dt>
        <dd class="opt">
          <input type="text" class="t_mane" name="sort_order" id="t_sort" value="{{$goods_category_info['sort_order']}}">
          <span class="err" style="color:#F00; display:none;" id="err_sort_order"></span>
          <p class="notic">根据排序进行由小到大排列显示。</p>
        </dd>
      </dl>
	  <dl class="row">
        <dt class="tit">
          <label for="t_sort"><em>*</em>分佣比例</label>
        </dt>
        <dd class="opt">
          <input type="text" class="t_mane" name="commission_rate" value="{{$goods_category_info['commission_rate']}}">%
          <span class="err" style="color:#F00; display:none;" id="err_commission_rate"></span>
          <p class="notic">用于商城分销,微信三级分销。</p>
        </dd>
      </dl>                         
      <div class="bot"><a id="submitBtn" class="ncap-btn-big ncap-btn-green" href="JavaScript:void(0);" onClick="ajax_submit_form('category_form','{{url('admin/goods/addeditcategory')}}');">确认提交</a></div>
    </div>
    <input type="hidden" name="id" value="{{$goods_category_info['id']}}">
    <input type='hidden' name='_token' value="{{CSRF_TOKEN()}}">
  </form>
</div>
<script>  
    
/** 以下是编辑时默认选中某个商品分类*/
$(document).ready(function(){

});
 
// 将品牌滚动条里面的 对应分类移动到 最上面
//javascript:document.getElementById('category_id_3').scrollIntoView();
var typeScroll = 0;
function spec_scroll(o){
	var id = $(o).val();	
	//if(!$('#type_id_'+id).is('dt')){
		//return false;
	//} 	 
	$('#ajax_brandList').scrollTop(-typeScroll);
	var sp_top = $('#type_id_'+id).offset().top; // 标题自身往上的 top
	var div_top = $('#ajax_brandList').offset().top; // div 自身往上的top
	$('#ajax_brandList').scrollTop(sp_top-div_top); // div 移动
	typeScroll = sp_top-div_top;
}

function img_call_back(fileurl_tmp)
{
  $("#image").val(fileurl_tmp);
  $("#img_a").attr('href', fileurl_tmp);
  $("#img_i").attr('onmouseover', "layer.tips('<img src="+fileurl_tmp+">',this,{tips: [1, '#fff']});");
}
</script>
</body>
</html>