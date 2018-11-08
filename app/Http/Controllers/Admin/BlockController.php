<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlockController extends Controller
{
    //
    public function pageList(){
        return view('admin.block.pageList');
    }
}
