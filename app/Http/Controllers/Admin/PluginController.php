<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PluginController extends Controller
{
    //
    public function index(){
        return view('admin.plugin.index');
    }
}
