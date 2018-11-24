@include("admin.public.layout")
<body style="background-color: #FFF; overflow: auto;">
    <!--物流配置 css -start-->
    <script src="{{asset('static/js/layer/laydate/laydate.js')}}"></script>
    <style>
        ul.group-list {
            width: 96%;min-width: 1000px; margin: auto 5px;list-style: disc outside none;
        }
        .err{color:#F00; display:none;}
        ul.group-list li {
            white-space: nowrap;float: left;
            width: 150px; height: 25px;
            padding: 3px 5px;list-style-type: none;
            list-style-position: outside;border: 0px;margin: 0px;
        }
        .row .table-bordered td .btn,.row .table-bordered td img{
            vertical-align: middle;
        }
        .row .table-bordered td{
            padding: 8px;
            line-height: 1.42857143;
        }
        .table-bordered{
            width: 100%
        }
        .table-bordered tr td{
            border: 1px solid #f4f4f4;
        }
        .btn-success {
            color: #fff;background-color: #449d44;border-color: #398439 solid 1px;
        }
        .btn {
            display: inline-block;
            padding: 6px 12px;
            margin-bottom: 0;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            -ms-touch-action: manipulation;
            touch-action: manipulation;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .col-xs-8 {
            width: 66.66666667%;
        }
        .col-xs-4 {
            width: 33.33333333%;
        }
        .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
            float: left;
        }
        .row .tab-pane h4{
            padding: 10px 0;
        }
        .row .tab-pane h4 input{
            vertical-align: middle;
        } 
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f9f9f9;
        }
        .ncap-form-default .title{
            border-bottom: 0
        }
        .ncap-form-default dl.row, .ncap-form-all dd.opt{
            /*border-color: #F0F0F0;*/
            border: none;
        }
        .ncap-form-default dl.row:hover, .ncap-form-all dd.opt:hover{
            border: none;box-shadow: inherit;
        }
        .addprine{display: inline; }
        .alisth{margin-top: 10px}
        .p_plus strong{cursor: pointer;margin-left: 4px;}
        .freight_template {
            font-size: 14px;
            display: inline-block;
            padding: 0px 10px;
        }
        .err{color:#F00; display:none;}
    </style>
    <!--物流配置 css -end-->
    <!--以下是在线编辑器 代码 -->
    <script src="{{asset('plugins/Ueditor/ueditor.config.js')}}"></script>
    <script src="{{asset('plugins/Ueditor/ueditor.all.min.js')}}"></script>
    <script src="{{asset('plugins/Ueditor/lang/zh-cn/zh-cn.js')}}"></script>
    <!--以上是在线编辑器 代码  end-->
    <div id="append_parent"></div>
    <div id="ajaxwaitid"></div>
    <div class="page">
        <div class="fixed-bar">
            <div class="item-title">
                <div class="subject">
                    <h3>商品设置</h3>
                    <h5>商品基本信息设置</h5>
                </div>
                <ul class="tab-base nc-row">
                    <li><a href="javascript:void(0);" data-index='1' class="tab current"><span>通用信息</span></a></li>
                    <li><a href="javascript:void(0);" data-index='2' class="tab"><span>商品相册</span></a></li>
                    <li><a href="javascript:void(0);" data-index='3' class="tab"><span>商品模型</span></a></li>
                    <li><a href="javascript:void(0);" data-index='5' class="tab"><span>积分折扣</span></a></li>
                </ul>
            </div>
        </div>
        <!-- 操作说明 -->
        <div class="explanation" id="explanation">
            <div class="title" id="checkZoom"><i class="fa fa-lightbulb-o"></i>
                <h4 title="提示相关设置操作时应注意的要点">操作提示</h4>
                <span id="explanationZoom" title="收起提示"></span> </div>
            <ul>
                <li>请务必正确填写商品信息</li>
            </ul>
        </div>
        <!--表单数据-->
        <form method="post" id="addEditGoodsForm">
            <input type="hidden" name="goods_id" value="{{$goods['goods_id']}}">
            <input type="hidden" name="__token__" value="{$Request.token}" />
            <input type="hidden" value="{$Request.param.is_distribut}" name="is_distribut" disabled="disabled"/>
            <input type="hidden" value="{$level_cat['1']}" name="level_cat_1" disabled="disabled"/>
            <input type="hidden" value="{$level_cat['2']}" name="level_cat_2" disabled="disabled"/>
            <input type="hidden" value="{$level_cat['3']}" name="level_cat_3" disabled="disabled"/>
            <input type="hidden" value="{$goods['brand_id']|default = 0}" name="goods_brand_id" disabled="disabled"/>
            <!--通用信息-->
            <div class="ncap-form-default tab_div_1">
                <dl class="row">
                    <dt class="tit"><em>*</em>
                        <label>商品名称</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['goods_name']}}" name="goods_name" class="input-txt"/>
                        <span class="err" id="err_goods_name"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品简介</label>
                    </dt>
                    <dd class="opt">
                        <textarea rows="3" cols="80" name="goods_remark" class="input-txt">{{$goods['goods_remark']}}</textarea>
                        <span id="err_goods_remark" class="err"></span>
                    </dd>
                </dl> 
                <dl class="row">
                    <dt class="tit">
                        <label>商品货号</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['goods_sn']}}" name="goods_sn" class="input-txt"/>
                        <span class="err" id="err_goods_sn"></span>
                        <p class="notic">如果不填会自动生成</p>
                    </dd>
                </dl>    
                <dl class="row">
                    <dt class="tit">
                        <label>SPU</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['spu']}}" name="spu" class="input-txt"/>
                        <span class="err" id="err_spu"></span>
                    </dd>
                </dl>    
                <dl class="row">
                    <dt class="tit">
                        <label>SKU</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['sku']}}" name="sku" class="input-txt"/>
                        <span class="err" id="err_sku"></span>
                    </dd>
                </dl> 
                <dl class="row">
                    <dt class="tit"><em>*</em>
                        <label>商品分类</label>
                    </dt>
                    <dd class="opt">
                        <select name="cat_id" id="cat_id" class="small form-control">
                            <option value="0">请选择商品分类</option>
                            @foreach($cat_list as $k=>$v)
                                <option value="{{$v['id']}}" <if condition="$v['id'] eq $level_cat['1']">selected="selected"</if>>
                                {{$v['name']}}
                                </option>
                            @endforeach
                        </select>
                        <select name="cat_id_2" id="cat_id_2" onChange="get_category(this.value, 'cat_id_3', '0');getCategoryBrandList(this.value)"
                                onclick="get_category(this.value, 'cat_id_3', '0');getCategoryBrandList(this.value)" class="small form-control">
                            <option value="0">请选择商品分类</option>
                        </select>
                        <select name="cat_id_3" id="cat_id_3" class="small form-control">
                            <option value="0">请选择商品分类</option>
                        </select>
                        <span class="err" id="err_cat_id"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品品牌</label>
                    </dt>
                    <dd class="opt">
                        <select name="brand_id" id="brand_id" class="small form-control">
                            <option value="">所有品牌</option>
                            <foreach name="brandList" item="v" key="k">
                                <option value="{$v['id']}" <if condition="$v['id'] eq $goods['brand_id'] ">selected="selected"</if>>
                                {$v['name']}
                                </option>
                            </foreach>
                        </select>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>供应商</label>
                    </dt>
                    <dd class="opt">
                        <select name="suppliers_id" id="suppliers_id" class="small form-control">
                            <option value="0">不指定供应商属于本店商品</option>
                            <foreach name="suppliersList" item="v" key="k">
                                <option value="{$v['suppliers_id']}" <if condition="$v['suppliers_id'] eq $goods['suppliers_id'] ">selected="selected"</if>>
                                {$v['suppliers_name']}
                                </option>
                            </foreach>
                        </select>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit"><em>*</em>
                        <label>本店售价</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['shop_price']}}" name="shop_price" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"/>
                        <span class="err" id="err_shop_price"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit"><em>*</em>
                        <label>市场价</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['market_price']}}" name="market_price" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"/>
                        <span class="err" id="err_market_price"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>成本价</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['cost_price']}}" name="cost_price" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"/>
                        <span class="err" id="err_cost_price"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>佣金</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['commission']}}" name="commission" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"/>
                        <span class="err" id="err_commission"></span>

                        <p class="notic">用于分销的分成金额</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>图片上传</label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show">
                            <span class="show">
                                <a id="img_a" target="_blank" class="nyroModal" rel="gal" href="{{$goods['original_img']}}">
                                    <i id="img_i" class="fa fa-picture-o"
                                       onMouseOver="layer.tips('<img src={{$goods['original_img']}}> ', this, {tips: [1, '#fff']});" onMouseOut="layer.closeAll();"></i>
                                </a>
                            </span>
                            <span class="type-file-box">
                                <input type="text" id="imagetext" name="original_img" value="{{$goods['original_img']}}" class="type-file-text">
                                <input type="button" name="button" id="button1" value="选择上传..." class="type-file-button">
                                <input class="type-file-file" onClick="GetUploadify(1, '', 'goods', 'img_call_back')" size="30"
                                       title="点击前方预览图可查看大图，点击按钮选择文件并提交表单后上传生效">
                            </span>
                        </div>
                        <span class="err"></span>

                        <p class="notic">请上传图片格式文件</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>视频上传</label>
                    </dt>
                    <dd class="opt">
                        <div class="input-file-show">
                            <span class="type-file-box">
                                <input type="text" id="videotext" name="video" value="{{$goods['video']}}" class="type-file-text">
                                <span id="video_button">
                                    <if condition="$goods.video">
                                        <input type="button" onclick="delupload()" value="删除视频" class="type-file-button">
                                        <else/>
                                        <input type="button" name="button" id="videobutton1" value="选择上传..." class="type-file-button">
                                        <input class="type-file-file" onClick="GetUploadify(1, '', 'goods', 'video_call_back', 'Flash')"
                                               size="30" title="点击按钮选择文件并提交表单后上传生效">
                                    </if>
                                </span>
                            </span>
                        </div>
                        <span class="err"></span>

                        <p class="notic">请上传视频格式文件</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品重量</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['weight']}}" name="weight" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"/>
                        <span class="err" id="err_weight"></span>

                        <p class="notic"> 务必设置商品重量, 用于计算物流费.以克为单位</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品体积</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['volume']}}" name="volume" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"/>
                        <span class="err" id="err_volume"></span>

                        <p class="notic"> 务必设置商品体积, 用于计算物流费.以立方米为单位</p>
                    </dd>
                </dl>
                <dl class="row goods_shipping">
                    <dt class="tit">
                        <label><em>*</em>是否包邮</label>
                    </dt>
                    <dd class="opt">
                        <div class="onoff">
                            <label id="is_free_shipping_label_1" for="is_free_shipping1" class="cb-enable <if condition='$goods.is_free_shipping eq 1'>selected</if>">是</label>
                            <label id="is_free_shipping_label_0" for="is_free_shipping0" class="cb-disable <if condition='$goods.is_free_shipping eq 0'>selected</if>">否</label>
                            <input id="is_free_shipping1" autocomplete="off" class="is_free_shipping" name="is_free_shipping" value="1" type="radio" <if condition="$goods[is_free_shipping] eq 1"> checked="checked"</if>>
                            <input id="is_free_shipping0" autocomplete="off" class="is_free_shipping" name="is_free_shipping" value="0" type="radio" <if condition="$goods[is_free_shipping] eq 0"> checked="checked"</if>>
                            <div class="freight_template" style="display: none;">
                                <span>运费模板</span>
                                <select name="template_id">
                                    <option value="0">请选择运费模板</option>
                                    <volist name="freight_template" id="template">
                                        <option value="{$template.template_id}"<if condition="$template['template_id'] eq $goods['template_id'] ">selected="selected"</if>>{$template.template_name}</option>
                                    </volist>
                                </select>
                                <empty name="freight_template"><span style="color: red;">没有可选的运费模板，请前去<a href="{:U('Freight/index')}" target="_blank">添加</a></span></empty>
                            </div>
                        </div>
                        <span class="err" id="err_is_free_shipping"></span>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>总库存</label>
                    </dt>
                    <dd class="opt">                
                    <if condition="$goods[goods_id] gt 0">
                        <input type="text" value="{$goods.store_count}" class="t_mane" name="store_count"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                        <else />
                        <input type="text" value="{$tpshop_config[basic_default_storage]}" class="t_mane" name="store_count"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                    </if>
                    <span class="err" id="err_store_count"></span>
                    </dd>
                </dl>       
                <dl class="row">
                    <dt class="tit">
                        <label>商品关键词</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['keywords']}}" name="keywords" class="input-txt"/>
                        <span class="err" id="err_keywords"></span>
                        <p class="notic">多个关键词，用空格隔开</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>是否为虚拟商品</label>
                    </dt>
                    <dd class="opt">
                        @if($goods['goods_id'] == 0)
                        @if($goods['is_virtual'] == 1)
                        <span>是</span>
                        <input name="is_virtual" value="1" type="hidden" disabled="disabled">
                    <else/>
                    <span>否</span>
                    <input name="is_virtual" value="0" type="hidden" disabled="disabled">
                    @endif
                    @else
                    <div class="onoff">
                        <label for="is_virtual1" class="cb-enable <if condition='$goods.is_virtual eq 1'>selected</if>">是</label>
                        <label for="is_virtual0" class="cb-disable <if condition='$goods.is_virtual eq 0'>selected</if>">否</label>
                        <input class="is_virtual" id="is_virtual1" name="is_virtual" value="1" type="radio" 
                               @if($goods['is_virtual'] == 1)
                               checked="checked" 
                               @endif
                               >
                               <input class="is_virtual" id="is_virtual0" name="is_virtual" value="0" type="radio" <if condition="$goods[is_virtual] eq 0"> checked="checked"</if>>
                    </div>
                    @endif
                    <span class="err" id="err_is_virtual"></span>
                    <p class="notic"></p>
                    </dd>
                </dl>
                <dl class="row virtual" style="display: none;">
                    <dt class="tit">
                        <label>虚拟商品有效期至</label>
                    </dt>
                    <dd class="opt virtual">
                        <input id="virtual_indate" name="virtual_indate" value="{$goods[virtual_indate]|date='Y-m-d',###}" class="input-txt" type="text">
                        <span class="err" id="err_virtual_indate"></span>
                        <p class="notic">虚拟商品可兑换的有效期，过期后商品不能购买，电子兑换码不能使用。</p>
                    </dd>
                </dl>
                <dl class="row virtual" style="display: none;">
                    <dt class="tit">
                        <label>虚拟商品购买上限</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['virtual_limit']}}" class="t_mane" name="virtual_limit"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"
                               onblur="checkInputNum(this.name, 1, 10, '', 1);" />
                        <span class="err" id="err_virtual_limit"></span>
                        <p class="notic">请填写1~10之间的数字，虚拟商品最高购买数量不能超过10个。</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>虚拟销售量</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['virtual_sales_sum']}}" name="virtual_sales_sum" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"
                               onblur="checkInputNum(this.name, 0, 9999999, '', 1);" />
                        <span class="err" id="err_virtual_sales_sum"></span>
                        <p class="notic"> 虚拟销售量（请输入0~9999999）：虚拟销售量 + 真实销量</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>虚拟收藏量</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['virtual_collect_sum']}}" name="virtual_collect_sum" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')"
                               onblur="checkInputNum(this.name, 0, 9999999, '', 1);"/>
                        <span class="err" id="err_virtual_collect_sum"></span>
                        <p class="notic"> 虚拟收藏量（请输入0~9999999）：虚拟收藏量 + 真实收藏量</p>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="tit">
                        <label>商品详情描述</label>
                    </dt>
                    <dd class="opt">                    
                        <textarea class="span12 ckeditor" id="goods_content" name="goods_content" title="">{{$goods['goods_content']}}</textarea>
                        <span class="err" id="err_goods_content"></span>
                    </dd>
                </dl>                                                                                                                                           
            </div>
            <!--通用信息-->
            <!-- 商品相册-->
            <div class="ncap-form-default tab_div_2" style="display:none;">
                <dl class="row">
                    <div class="tab-pane" id="tab_goods_images">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                            <volist name="goods['goods_images']" id="image">
                                <div style="width:100px; text-align:center; margin: 5px; display:inline-block;" class="goods_xc">
                                    <input type="hidden" value="{$image['image_url']}" name="goods_images[]">
                                    <a onClick="" href="{$image['image_url']}" target="_blank"><img width="100" height="100" src="{$image['image_url']}"></a>
                                    <br>
                                    <a href="javascript:void(0)" onClick="ClearPicArr2(this, '{$image.image_url}')">删除</a>
                                </div>
                            </volist>

                            <div class="goods_xc" style="width:100px; text-align:center; margin: 5px; display:inline-block;">
                                <input type="hidden" name="goods_images[]" value="" />
                                <a href="javascript:void(0);" onClick="GetUploadify(10, '', 'goods', 'call_back2');"><img src="/public/images/add-button.jpg" width="100" height="100" /></a>
                                <br/>
                                <a href="javascript:void(0)">&nbsp;&nbsp;</a>
                            </div>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </dl>             
            </div>   
            <!-- 商品相册-->
            <!-- 商品模型-->
            <div class="ncap-form-default tab_div_3" style="display:none;">
                <dl class="row">
                    <div class="tab-pane" id="tab_goods_spec">
                        <table class="table table-bordered" id="goods_spec_table">
                            <tr>
                                <td>商品模型:</td>
                                <td>
                                    <select name="goods_type" id="spec_type" class="form-control" style="width:250px;">
                                        <option value="0">选择商品模型</option>
                                        <foreach name="goodsType" item="vo" key="k" >
                                            <option value="{$vo.id}"<if condition="$goods[goods_type] eq $vo[id]"> selected="selected" </if> >{$vo.name}</option>
                                        </foreach>
                                    </select>
                                    <span class="err" id="err_item"></span>
                                </td>
                            </tr>
                        </table>
                        <div class="row">
                            <!-- ajax 返回规格-->
                            <div id="ajax_spec_data" class="col-xs-8" ></div>
                            <div class="col-xs-4" >
                                <table class="table table-bordered" id="goods_attr_table">
                                    <tr>
                                        <td><b>商品属性</b>：</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </dl>
            </div>   
            <!-- 商品模型-->
            <!--积分折扣-->
            <div class="ncap-form-default tab_div_5" style="display:none;">
                <dl class="row">
                    <dt class="tit">
                        <label>价格阶梯</label>
                    </dt>
                    <dd class="opt">
                        <div class="alisth0" id="alisth_0">
                            单次购买个数达到
                            <input type="text" class="input-number addprine" name="ladder_amount[]" 
                                   <if condition="$goods['price_ladder']">value="{$goods['price_ladder'][0]['amount']}"</if> 
                            onpaste="this.value=this.value.replace(/[^\d.]/g,'')" 
                            onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" 
                            style="width: 100px;" >&nbsp;
                            价格
                            <input type="text" class="input-number addprine" name="ladder_price[]"  
                                   <if condition="$goods['price_ladder']">value="{$goods['price_ladder'][0]['price']}"</if> 
                            onpaste="this.value=this.value.replace(/[^\d.]/g,'')" 
                            onkeyup="this.value=this.value.replace(/[^\d.]/g,'')" style="width: 100px;" >
                            <a class="p_plus" href="javascript:;">
                                <strong>[+]</strong>
                            </a>
                        </div>
                    <volist name="goods['price_ladder']" id="vo" offset="1">
                        <div class="alisth">
                            单次购买个数达到<input type="text" class="input-number addprine" name="ladder_amount[]" value="{$vo['amount']}" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" style="width: 100px;" >&nbsp;
                            价格<input type="text" class="input-number addprine" name="ladder_price[]" value="{$vo['price']}" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" style="width: 100px;" >
                            <a class="p_plus" onclick='$(this).parent().remove();'><strong>[-]</strong></a>
                        </div>
                    </volist>
                    <span class="err" id="err_ladder_amount"></span>
                    <span class="err" id="err_ladder_price"></span>
                    </dd>
                    <script>
                        $(function () {
                            $('.p_plus').click(function () {
                                var html = "<div class='alisth'>"
                                        + "单次购买个数达到"
                                        + "<input type='text' class='input-number addprine' name='ladder_amount[]' style='width: 100px;' value=''/>"
                                        + "&nbsp;&nbsp;价格"
                                        + "<input type='text' class='input-number addprine' name='ladder_price[]' style='width: 100px;' value=''>"
                                        + "<a class='p_plus' onclick='$(this).parent().remove();'>&nbsp;<strong>[-]</strong></a>"
                                        + "</div>";
                                $('#alisth_0').after(html);
                            });
                        })
                    </script>
                </dl>  

                <dl class="row">
                    <dt class="tit">
                        <label>赠送积分</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{{$goods['give_integral']}}" name="give_integral" class="t_mane"
                               onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />	订单完成后赠送积分
                        <span class="err" id="err_give_integral"></span>
                    </dd>
                </dl>  

                <dl class="row">
                    <dt class="tit">
                        <label>兑换积分</label>
                    </dt>
                    <dd class="opt">
                        <input type="text" value="{$goods.exchange_integral}" name="exchange_integral" class="t_mane" onKeyUp="this.value = this.value.replace(/[^\d.]/g, '')" onpaste="this.value=this.value.replace(/[^\d.]/g,'')" />
                        不得高于商品最低价格与兑换比的积，如果设置0，则不支持积分抵扣
                        <span class="err" id="err_exchange_integral"></span>
                    </dd>
                </dl>

            </div>

            <div class="ncap-form-default">
                <div class="bot">            
                    <a href="JavaScript:void(0);" id="submit" class="ncap-btn-big ncap-btn-green">确认提交</a>
                    <span class="err" id="err_goods_id"></span>
                </div>
            </div>
        </form>
        <!--表单数据-->
    </div>
    <div id="goTop"> 
        <a href="JavaScript:void(0);" id="btntop">
            <i class="fa fa-angle-up"></i>
        </a>
        <a href="JavaScript:void(0);" id="btnbottom">
            <i class="fa fa-angle-down"></i>
        </a>
    </div>
    <script>
        /** 商品规格相关 js*/
        $(function () {
            // 商品模型切换时 ajax 调用  返回不同的属性输入框
            $(document).on("change", '#spec_type', function () {
                var goods_id = $("input[name='goods_id']").val();
                var spec_type = $(this).val();
                $.ajax({
                    type: 'GET',
                    data: {goods_id: goods_id, spec_type: spec_type},
                    url: "{:U('admin/Goods/ajaxGetSpecSelect')}",
                    success: function (data) {
                        $("#ajax_spec_data").html('').append(data);
                        ajaxGetSpecInput();	// 触发完  马上触发 规格输入框
                    }
                });
                //商品类型切换时 ajax 调用  返回不同的属性输入框
                $.ajax({
                    type: 'GET',
                    data: {goods_id: goods_id, type_id: spec_type},
                    url: "/index.php/admin/Goods/ajaxGetAttrInput",
                    success: function (data) {
                        $("#goods_attr_table tr:gt(0)").remove();
                        $("#goods_attr_table").append(data);
                    }
                });
            })
        })

        $(document).ready(function () {
            $('#virtual_indate').layDate();
            $("#spec_type").trigger('change'); // 触发商品规格
            initFreight();
            initIsVirtual();
            initCategory();
        });
        //提交
        $(function () {
            $(document).on("click", '#submit', function () {
                $('#submit').attr('disabled', true);
                var is_distribut = $("input[name='is_distribut']").val();
                $.ajax({
                    type: "POST",
                    url: "{:U('Goods/save')}",
                    data: $("#addEditGoodsForm").serialize(),
                    async: false,
                    dataType: "json",
                    error: function () {
                        layer.alert("服务器繁忙, 请联系管理员!");
                    },
                    success: function (data) {
                        if (data.status == 1) {
                            layer.msg(data.msg, {icon: 1, time: 2000}, function () {
                                if (is_distribut > 0) {
                                    location.href = "{:U('Distribut/goods_list')}";
                                }
                                else {
                                    location.href = "{:U('Goods/goodsList')}";
                                }
                            });
                        }
                        else {
                            $('#submit').attr('disabled', false);
                            $.each(data.result, function (index, item) {
                                $('span.err').show();
                                $('#err_' + index).text(item);
                            });
                            layer.msg(data.msg, {icon: 2, time: 3000});
                        }
                    }
                });
            })
        })

        //选择分类
        $(function () {
            $(document).on("change", '#cat_id', function () {
                get_category($(this).val(), 'cat_id_2', '0');
                $('#cat_id_3').empty().html("<option value='0'>请选择商品分类</option>");
            })
        })

        //规格批量填充
        $(function () {
            $(document).on("click", '#item_fill', function () {
                var item_price_fill = $("#item_price").val();
                var item_market_price_fill = $("#item_market_price").val();
                var item_cost_price_fill = $("#item_cost_price").val();
                var item_commission_fill = $("#item_commission").val();
                var item_store_count_fill = $("#item_store_count").val();
                var item_sku_fill = $("#item_sku").val();
                $("input[name$='[price]']").val(item_price_fill);
                $("input[name$='[market_price]']").val(item_market_price_fill);
                $("input[name$='[cost_price]']").val(item_cost_price_fill);
                $("input[name$='[commission]']").val(item_commission_fill);
                $("input[name$='[store_count]']").val(item_store_count_fill);
                $("input[name$='[sku]']").each(function (i, o) {
                    $(this).val(item_sku_fill);
                    item_sku_fill++;
                })
            })
        })

        //虚拟和免邮事件
        $(function () {
            $(document).on("click", '.is_virtual', function () {
                initIsVirtual();
            })
            $(document).on("click", '.is_free_shipping', function (e) {
                initFreight();
            })
        })

        //初始化虚拟商品设置
        function initIsVirtual() {
            var goods_id = $("input[name='goods_id']").val();
            var is_virtual;
            if (goods_id > 0) {
                is_virtual = $("input[name='is_virtual']").val();
            }
            else {
                is_virtual = $("input[name='is_virtual']:checked").val();
            }
            if (is_virtual == 1) {
                $('.virtual').show();
                $('#is_free_shipping_label_1').trigger('click');
                initFreight();
                $(".goods_shipping").hide();
            }
            else {
                $('.virtual').hide();
                $(".goods_shipping").show();
            }
        }

        //初始化运费设置
        function initFreight() {
            var is_free_shipping = $("input[name='is_free_shipping']:checked").val();
            if (is_free_shipping == 0) {
                $('.freight_template').show();
            }
            else {
                $('.freight_template').hide();
            }
        }

        //编辑时默认选中某个商品分类
        function initCategory() {
            var level_cat_1 = $("input[name='level_cat_1']").val();
            var level_cat_2 = $("input[name='level_cat_2']").val();
            var level_cat_3 = $("input[name='level_cat_3']").val();
            if (level_cat_2 > 0) {
                get_category(level_cat_1, 'cat_id_2', level_cat_2);
            }
            if (level_cat_3 > 0) {
                get_category(level_cat_2, 'cat_id_3', level_cat_3);
                getCategoryBrandList(level_cat_2);
            }
        }
        var url = "{:url('Admin/Ueditor/index',array('savePath'=>'goods'))}";
        var ue = UE.getEditor('goods_content', {
            toolbars: [[
                    'fullscreen', 'source', '|', 'undo', 'redo', '|',
                    'bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc', '|',
                    'rowspacingtop', 'rowspacingbottom', 'lineheight', '|',
                    'customstyle', 'paragraph', 'fontfamily', 'fontsize', '|',
                    'directionalityltr', 'directionalityrtl', 'indent', '|',
                    'justifyleft', 'justifycenter', 'justifyright', 'justifyjustify', '|', 'touppercase', 'tolowercase', '|',
                    'anchor', '|', 'imagenone', 'imageleft', 'imageright', 'imagecenter', '|',
                    'simpleupload', 'insertimage', 'emotion', 'scrawl', 'music', 'attachment', 'map', 'gmap', 'insertframe', 'insertcode', 'webapp', 'pagebreak', 'template', 'background', '|',
                    'horizontal', 'date', 'time', 'spechars', 'snapscreen', 'wordimage', '|',
                    'inserttable', 'deletetable', 'insertparagraphbeforetable', 'insertrow', 'deleterow', 'insertcol', 'deletecol', 'mergecells', 'mergeright', 'mergedown', 'splittocells', 'splittorows', 'splittocols', 'charts', '|',
                    'print', 'preview', 'searchreplace', 'drafts', 'help'
                ]],
            serverUrl: url,
            zIndex: 999,
            initialFrameWidth: "100%", //初化宽度
            initialFrameHeight: 300, //初化高度            
            focus: false, //初始化时，是否让编辑器获得焦点true或false
            maximumWords: 99999, removeFormatAttributes: 'class,style,lang,width,height,align,hspace,valign', //允许的最大字符数 'fullscreen',
            pasteplain: false, //是否默认为纯文本粘贴。false为不使用纯文本粘贴，true为使用纯文本粘贴
            autoHeightEnabled: true
        });

        // 上传商品图片成功回调函数
        function call_back(fileurl_tmp) {
            $("#original_img").val(fileurl_tmp);
            $("#original_img2").attr('href', fileurl_tmp);
        }

        // 上传商品相册回调函数
        function call_back2(paths) {
            var last_div = $(".goods_xc:last").prop("outerHTML");
            for (var i = 0; i < paths.length; i++) {
                $(".goods_xc:eq(0)").before(last_div);	// 插入一个 新图片
                $(".goods_xc:eq(0)").find('a:eq(0)').attr('href', paths[i]).attr('onclick', '').attr('target', "_blank");// 修改他的链接地址
                $(".goods_xc:eq(0)").find('img').attr('src', paths[i]);// 修改他的图片路径
                $(".goods_xc:eq(0)").find('a:eq(1)').attr('onclick', "ClearPicArr2(this,'" + paths[i] + "')").text('删除');
                $(".goods_xc:eq(0)").find('input').val(paths[i]); // 设置隐藏域 要提交的值
            }
        }
        //上传之后删除组图
        function ClearPicArr2(obj, path) {
            $.ajax({
                type: 'GET',
                url: "{:U('Admin/Uploadify/delupload')}",
                data: {action: "del", filename: path},
                success: function () {
                    $(obj).parent().remove(); // 删除完服务器的, 再删除 html上的图片
                }
            });
            // 删除数据库记录
            $.ajax({
                type: 'GET',
                url: "{:U('Admin/Goods/del_goods_images')}",
                data: {filename: path},
                success: function () {
                }
            });
        }
        // 属性输入框的加减事件
        function addAttr(a) {
            var attr = $(a).parent().parent().prop("outerHTML");
            attr = attr.replace('addAttr', 'delAttr').replace('+', '-');
            $(a).parent().parent().after(attr);
        }
        // 属性输入框的加减事件
        function delAttr(a) {
            $(a).parent().parent().remove();
        }
        //插件切换列表
        $('.tab-base').find('.tab').click(function () {
            $('.tab-base').find('.tab').each(function () {
                $(this).removeClass('current');
            });
            $(this).addClass('current');
            var tab_index = $(this).data('index');
            $(".tab_div_1, .tab_div_2, .tab_div_3, .tab_div_4,.tab_div_5").hide();
            $(".tab_div_" + tab_index).show();
        });
        //上传图片回调事件
        function img_call_back(fileurl_tmp) {
            $("#imagetext").val(fileurl_tmp);
            $("#img_a").attr('href', fileurl_tmp);
            $("#img_i").attr('onmouseover', "layer.tips('<img src=" + fileurl_tmp + ">',this,{tips: [1, '#fff']});");
        }
        //上传视频回调事件
        function video_call_back(fileurl_tmp) {
            $("#videotext").val(fileurl_tmp);
            $("#video_a").attr('href', fileurl_tmp);
            $("#video_i").attr('onmouseover', "layer.tips('<img src=" + fileurl_tmp + ">',this,{tips: [1, '#fff']});");
            if (typeof (fileurl_tmp) != 'undefined') {
                $('#video_button').html('<input type="button" onclick="delupload()" value="删除视频" class="type-file-button" >');
            }
        }
        //品牌选项框
        function getCategoryBrandList(val) {
            var goods_brand_id = $("input[name='goods_brand_id']").val();
            $.ajax({
                'url': "{:U('goods/getCategoryBrandList')}",
                'data': {cart_id: val},
                'dataType': 'json',
                success: function (data) {
                    if (data.status == 1) {
                        var html = '<option value="">所有品牌</option>';
                        for (var i = 0; i < data.result.length; i++) {
                            var bind_id = data.result[i].id;
                            if (goods_brand_id == bind_id) {
                                html += '<option value="' + bind_id + '" selected>' + data.result[i].name + '</option>'
                            }
                            else {
                                html += '<option value="' + bind_id + '">' + data.result[i].name + '</option>'
                            }
                        }
                        $('#brand_id').empty().html(html);
                    }
                }
            })
        }
        //删除上传图片事件
        function delupload() {
            $.ajax({
                url: "{:U('Uploadify/delupload')}",
                data: {url: $('#videotext').val()},
                success: function (data) {
                    if (data == 1) {
                        layer.msg('删除成功！', {icon: 1});
                        $('#videotext').val('');
                        var html = '<input type="button" name="button" id="videobutton1" value="选择上传..." class="type-file-button"> <input class="type-file-file" onClick="GetUploadify(1,\'\',\'goods\',\'video_call_back\',\'Flash\')" size="30" hidefocus="true" nc_type="change_site_logo" title="点击按钮选择文件并提交表单后上传生效">';
                        $('#video_button').html(html);
                    }
                    else {
                        layer.msg('删除失败', {icon: 2});
                    }
                },
                error: function () {
                    layer.msg('网络繁忙，请稍后再试!', {icon: 2});
                }
            })
        }
    </script>
</body>
</html>