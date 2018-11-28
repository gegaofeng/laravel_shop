<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsAttribute extends Model
{
    //
    protected $primarykey='attr_id';
    public function goodsType(){
        return $this -> belongsTo(GoodsType::class,'type_id','id');
    }
}
