<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.admin.index'); 
    }
    public function role(){
        return view('admin.admin.role');
    }
    public function supplier(){
        return view('admin.admin.supplier');
    }
}
