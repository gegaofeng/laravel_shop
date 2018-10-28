<?php

namespace App\Http\Controllers\PC\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //
    /**
     * Notes:
     * User:
     * Date:2018/10/28
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        return view('pc.auth.login');
    }
}
