<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdController extends Controller
{
    //
    public function adList(){
        return view('admin.ad.adList');
    }
    public function positionList(){
        return view('admin.ad.positionList');
    }
}
