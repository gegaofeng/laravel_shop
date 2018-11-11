<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    //
    public function index(){
        return view('admin.report.index');
    }
    public function saleTop(){
        return view('admin.report.saleTop');
    }
    public function userTop(){
        return view('admin.report.userTop');
    }
    public function saleList(){
        return view('admin.report.saleList');
    }
    public function user(){
        return view('admin.report.user');
    }
    public function finance(){
        return view('admin.report.finance');
    }
    public function expenseLog(){
        return view('admin.report.expenseLog');
    }
}
