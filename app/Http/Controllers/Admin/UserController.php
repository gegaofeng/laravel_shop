<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function index(){
        return view('admin.user.index');
    }
        public function levelList(){
        return view('admin.user.levellist');
    }
        public function reCharge(){
        return view('admin.user.recharge');
    }
        public function withDrawals(){
        return view('admin.user.withdrawals');
    }
        public function remittance(){
        return view('admin.user.remittance');
    }
        public function signList(){
        return view('admin.user.signlist');
    }
    
}
