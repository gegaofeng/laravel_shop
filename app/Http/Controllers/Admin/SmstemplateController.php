<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SmstemplateController extends Controller
{
    //
    public function index(){
        return view('admin.smstemplate.index');
    }
}
