<?php

namespace App\Http\Controllers;

use App\Repositories\GoodsCategoryRepository;
use App\Repositories\GoodsImagesRepository;
use App\Repositories\GoodsRepository;
use App\Repositories\NavigationRepository;
use App\Tools\Tools;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    protected $model;
    public function __construct() {
        $this->model=new GoodsImagesRepository();
    }

    public function test(){
        var_dump( $this->model->getGoodsImagesByGoodsId(58));
    }
}
