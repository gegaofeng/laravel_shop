<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsCategoryController extends Controller
{
    //
    public function ajaxGetSonCategory(Request $request){
        $parent_id=$request['parent_id'];
        $categoryReposity=new \App\Repositories\GoodsCategoryRepository();
        $cat_list=$categoryReposity-> getSonCatById($parent_id);
//        return $cat_list;
        return json_encode(array('status'=>'1','result'=> $cat_list));
    }
}
