<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsBrandController extends Controller
{
    //
    public function ajaxGetCatBrandList(Request $request){
        $cat_id=$request['cart_id'];
        $brandRepository=new \App\Repositories\BrandRepository();
        $brand_list=$brandRepository-> getSortBrands($cat_id);
        return json_encode(array('status'=>'1','result'=>$brand_list));
    }
}
