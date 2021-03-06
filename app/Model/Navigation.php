<?php

namespace App\Model;

use App\Scopes\ShowScope;
use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    //
    protected $table='navigation';

    /**
     * Notes:
     * User:
     * Date:2018/10/28
     */
    public static function boot()
    {
        parent::boot();
        static::addGlobalScope(new ShowScope());
    }
}
