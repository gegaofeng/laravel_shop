<?php

namespace App\Http\Controllers;

use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\NavigationRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    protected $model;
    public function __construct() {
        $this->model=new GoodsRepository();
    }

    public function test(){
        return $this->model->getGoodsById('62');
    }
}
