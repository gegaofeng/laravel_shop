<?php

namespace App\Http\Controllers\PC\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('pc.user.login');
    }
    public function popLogin(){
        return view('pc.user.popLogin');
    }
    public function login(Request $request){
        $username=$request['username'];
        $password=$request['password'];
        $pre_url=$request['pre_url'];
        if (Auth::attempt(array('name'=>$username,'password'=>$password))){
            return json_encode(['status'=>1,'url'=>$pre_url]);
        }else{
            return 'error';
        }
    }
}
