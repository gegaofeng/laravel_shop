<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistributeController extends Controller
{
    //
    public function index(){
        return view('admin.distribute.index');
    }
    public function goodsList(){
        return view('admin.distribute.goodsList');
    }
    public function distributeList(){
        return view('admin.distribute.distributeList');
    }
    public function tree(){
        return view('admin.distribute.tree');
    }
    public function gradeList(){
        return view('admin.gradeList');
    }
    public function rebateLog(){
        return view('admin.distribute.rebateLog');
    }
}
