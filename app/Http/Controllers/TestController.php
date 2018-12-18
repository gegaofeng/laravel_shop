<?php

namespace App\Http\Controllers;

use App\Model\GoodsSpec;
use App\Model\GoodsSpecItem;
use App\Model\User;
use App\Repositories\CartRepository;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\GoodsSpecPriceRepository;
use App\Repositories\NavigationRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class TestController extends Controller
{
    //
    protected $model;
    public function __construct() {
        $this->model=new GoodsRepository();
        $this->goodsSpecPriceRepository=new GoodsSpecPriceRepository();
//        $this->model=new GoodsRepository();
    }

    public function test(Request $request){
        var_dump(Auth::check());
        var_dump(Auth::user());
        return Auth::id();
        $data=['name'=>'test','email'=>'123@qq.com','password'=>'test'];
        return \App\User::create([
                                'name' => $data['name'],
                                'email' => $data['email'],
                                'password' => Hash::make($data['password']),
                            ]);
        var_dump(Auth::user());
        var_dump(Auth::id());
        $request->session()->put('time',time());
        $request->session()->put('user_id',time());
        var_dump($request->session()->all());
        var_dump($request->session()->get('_token'));
//        $request->session()->regenerate();
        var_dump($request->session()->all());
        var_dump($request->session()->get('_token'));
    }
}
