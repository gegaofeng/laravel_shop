<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsSpecItem extends Model
{
    //
    public function spec(){
        return $this->belongsTo(GoodsSpec::class,'spec_id','id');
    }
}
