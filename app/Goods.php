<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $guarded=[];
    public $hidden=['id','created_at','updated_at'];

    public function setPaymentNumberAttribute($value)
    {
        if($value){
            $value=explode('，',$value);
            $value=explode('：',$value[1])[1];
        }
        return $this->attributes['payment_number']=$value;
    }
    public static function is_exit($order_number)
    {
        return !static ::where('order_number',' '.$order_number.' ')->first();
    }
    public static function updateGoods($order_number,$arr)
    {
        return static ::where('order_number',' '.$order_number.' ')->update($arr);
    }
}
