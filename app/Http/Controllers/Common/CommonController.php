<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{
    //
    public function changeTabVal(Request $request){
                $table = $request['table']; // 表名
            $id_name = $request['id_name']; // 表主键id名
            $id_value = $request['id_value']; // 表主键id值
            $field  = $request['field']; // 修改哪个字段
            $value  = $request['value']; // 修改字段值    
           $result= DB::table($table)->where($id_name,$id_value)->update([$field=>$value]);
           if($result){
               return json_encode(['msg'=>'更新成功','result'=>$result]);
           }else{
               return json_encode(['msg'=>'更新失败','result'=>0]);
           }
           
    }
}
