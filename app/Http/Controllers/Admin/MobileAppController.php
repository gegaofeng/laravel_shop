<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MobileAppController extends Controller
{
    //
    public function index(){
        return view('admin.mobileapp.index');
    }
    public function iosAudit(){
        return view('admin.mobileapp.iosAudit');
    }
}
