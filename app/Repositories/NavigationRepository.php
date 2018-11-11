<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/28
 * Time: 10:49
 */
namespace App\Repositories;
use App\Model\Navigation;

class NavigationRepository extends BaseRepository {
    protected $navigation;

    /**
     * NavigationRepository constructor.
     * @param Navigation $navigation
     */
    public function __construct(Navigation $navigation) {
        $this->navigation=$navigation;
    }

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     * @param string $sortColumn
     * @param string $sort
     */
    public function getAll($sortColumn='sort',$sort='desc')
    {
        return $this->navigation->orderBy($sortColumn, $sort)->get();
    }
}