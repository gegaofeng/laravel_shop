<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/28
 * Time: 11:28
 */
namespace App\Http\ViewComposer;
use App\Repositories\GoodsCategoryRepository;
use App\Repositories\NavigationRepository;
use Illuminate\Contracts\View\View;

class NavigationComposer{
    protected $navigation;
    protected $goods_category;

    /**
     * NavigationComposer constructor.
     * @param NavigationRepository $navigationRepository
     * @param GoodsCategoryRepository $goodsCategoryRepository
     */
    public function __construct(NavigationRepository $navigationRepository, GoodsCategoryRepository $goodsCategoryRepository) {
        $this->navigation=$navigationRepository;
        $this->goods_category=$goodsCategoryRepository;
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     * @param View $view
     */
    public function compose(View $view){
        $view->with('navigation',$this->navigation->getAll());
        $view->with('goods_category_tree',$this->goods_category->getGoodsCategoryTree());
    }

}