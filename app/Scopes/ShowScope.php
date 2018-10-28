<?php
/**
 * Created by PhpStorm.
 * User: feng
 * Date: 2018/10/28
 * Time: 10:43
 */
namespace App\Scopes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Builder;
class ShowScope implements Scope{
    /**
     * Notes:
     * User:
     * Date:2018/10/28
     * @param Builder $builder
     * @param Model $model
     */
    public function apply(Builder $builder, Model $model)
    {
        // TODO: Implement apply() method.
        $builder->where('is_show',1);
    }
}