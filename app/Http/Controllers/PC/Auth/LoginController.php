<?php

namespace App\Http\Controllers\PC\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    protected $username='username';
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
        $refer_url=$request['pre_url'];
        if ($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)){
            return json_encode(['status'=>1,'url'=>$refer_url]);
        }else{
            return 'error';
        }
    }
    public function attemptLogin(Request $request){
        return $this->guard()->attempt($request->only('username','password'),$request->filled('remember'));
    }
}
