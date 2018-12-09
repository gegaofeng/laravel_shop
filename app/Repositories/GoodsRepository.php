<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/29
 * Time: 22:32
 */
namespace App\Repositories;
use App\Model\Goods;
use Illuminate\Support\Facades\DB;


class GoodsRepository extends BaseRepository{
    protected $goods;
    protected $goodsCategoryRepository;

    /**
     * GoodsRepository constructor.
     */
    public function __construct() {
        $this->goods=new Goods();
        $this->goodsCategoryRepository=new GoodsCategoryRepository();
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/9
     * @param $category_id
     * @return mixed
     */
    public function getGoodsListByCategoryId($category_id){
        $goods_list=$this->goods->whereIn('cat_id',$category_id)->paginate(5);
        return $goods_list;
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/9
     * @param $goods_id
     * @return Goods|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|null|object
     */
    public function getGoodsById($goods_id){
        $find=$this->goods->with('brand')->with('goodsImages')->where('goods_id',$goods_id)->first();
        return $find;
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/9
     * @param $goods_id
     * @return mixed
     */
    public function getGoodsCatById($goods_id){
        return $this->goods->where('goods_id',$goods_id)->pluck('cat_id');
    }

    /**
     * Notes:
     * User:Feng
     * Date:2018/12/9
     * @param array $filter
     * @param string $orderby
     * @param string $order
     * @param string $key_word
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getGoodsList(array $filter=[],$orderby='goods_id',$order='asc',$key_word=''){
        $goods_list= $this ->goods-> with('category')->where($filter)->orderBy($orderby,$order)->paginate(15);
        return $goods_list;
    }
    public function search($key_word='',array $where=[],$orderby='goods_id',$order='asc'){
        $goods_list= $this ->goods-> with('category')->where('goods_name','like',$key_word)->orderBy($orderby,$order)->paginate(15);
        return $goods_list;
    }
}