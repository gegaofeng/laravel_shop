<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ToolsController extends Controller
{
    //
    public function region(){
        return view('admin.tools.region');
    }
    public function index(){
        return view('admin.tools.index');
    }
    public function restore(){
        return view('admin.tools.restore');
    }
    public function clearDemoData(){
        return view('admin.tools.clearDemoData');
    }
}
