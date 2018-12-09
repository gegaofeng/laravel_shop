<?php

namespace App\Http\Controllers\PC;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
    /**
     * Notes:首页
     * User:Feng
     * Date:2018/12/2
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('pc/index/index');
    }
    public function ajaxFavorite(){

        return view('pc.index.ajaxFavorite');
    }
}
