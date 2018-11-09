<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    //
    public function index(){
        return view('admin.team.index');
    }
    public function teamList(){
        return view('admin.team.teamList');
    }
    public function orderList(){
        return view('admin.team.orderList');
    }
}
