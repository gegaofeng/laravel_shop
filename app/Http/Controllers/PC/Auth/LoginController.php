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
        $refer_url=isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:url('/');
        return view('pc.user.popLogin')->with('refer_url',$refer_url);
    }
    public function login(Request $request){
        $username=$request['username'];
        $password=$request['password'];
        $refer_url=$request['referurl'];
        if (Auth::attempt(array('name'=>$username,'password'=>$password))){
            return json_encode(['status'=>1,'url'=>$refer_url]);
        }else{
            return 'error';
        }
    }
}
