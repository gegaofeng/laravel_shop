<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends Controller {

    //
    public function index(Request $request) {
                $group_list = [
            'shop_info' => '网站信息',
            'basic' => '基本设置',
            'cash' => '提现设置',
            'sms' => '短信设置',
            'shopping' => '购物流程设置',
            'smtp' => '邮件设置',
            'water' => '水印设置',
            'distribut' => '分销设置',
            'push' => '推送设置',
            'oss' => '对象存储',
            'express' => '物流设置'
        ];
        $inc_type=$request->get('inc_type');
        if(is_null($inc_type)){
            return view('admin.system.shop_info')-> with('group_list',$group_list)-> with('inc_type','shop_info');
        }

        return view('admin.system.'.$inc_type) -> with('group_list', $group_list)-> with('inc_type',$inc_type);
    }

    public function navigationList() {
        return view('admin.system.navigationlist');
    }

    public function cleanCache() {
        return view('admin.system.cleancache');
    }

}
