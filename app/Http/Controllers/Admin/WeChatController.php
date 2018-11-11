<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class WeChatController extends Controller
{
    //
    public function index(){
        if(FALSE){
            return; 
        }
        if(true){
            return view('admin.wechat.setting');
        }
        
    }
    public function menu(){
            return view('admin.wechat.menu');
}
public function materials(){
    $materials_name='News';
    return view('admin.wechat.materials'.$materials_name);
}
public function autoReply(){
    return view('admin.wechat.autoReplies');
}
public function fansList(){
    return view('admin.wechat.fansList');
}
public function templateMsg(){
    return view('admin.wechat.templateMsg');
}
}
