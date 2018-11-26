<?php

namespace App\Model;

use App\Scopes\ShowScope;
use Illuminate\Database\Eloquent\Model;

class GoodsCategory extends Model
{
    //
    /**
     * Notes:
     * User:
     * Date:2018/10/28
     */
    public static function boot(){
        parent::boot();
        static::addGlobalScope(new ShowScope());
//        static::addGlobalScope("is_show",function (Builder $builder)
//        {
//            $builder->whereIn('is_show',[1]);
//        });
    }
}
