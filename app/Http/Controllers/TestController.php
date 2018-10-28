<?php

namespace App\Http\Controllers;

use App\Repositories\GoodsCategoryRepository;
use App\Repositories\NavigationRepository;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    protected $model;
    public function __construct(GoodsCategoryRepository $navigationRepository) {
        $this->model=$navigationRepository;
    }

    public function test(){
        return $this->model->getGoodsCategoryTree();
    }
}
