<?php

namespace App\Http\Controllers\PC\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    //
    public function index(){
        return view('pc.user.reg');
    }
}
