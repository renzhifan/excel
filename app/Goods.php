<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $guarded=[];
    public $hidden=['id','created_at','updated_at'];
    public static function is_exit($order_number)
    {
        return !static ::where('order_number',$order_number)->first();
    }
}
