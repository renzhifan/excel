<?php

namespace App\Exports;

use App\Goods;
use App\Jobs\GoodsOperation;
use Maatwebsite\Excel\Concerns\ToArray;
class GoodsImport implements ToArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(array $row)
    {
        if($row){
            dispatch((new GoodsOperation($row)));
//            Goods::truncate();
//            foreach($row as $value){
//                 $this->createOrUpdate($value);
//            }
        }
    }
    public function createOrUpdate($value)
    {
        if(Goods::is_exit(trim($value[0]))){
            $goods=new Goods;
            $goods->order_number=trim($value[0]);
            $goods->date=trim($value[19]);
            $goods->buyer_nickname=trim($value[1]);
            $goods->goods_name=trim($value[21]);
            $goods->goods_num=trim($value[22]);
            $goods->order_state=trim($value[29]);
            $goods->total_sum=trim($value[8]);
            $goods->actual_payment=trim($value[10]);
            $goods->payment_method=trim($value[4]);
            $goods->supplier=trim($value[28]);
            $goods->addressee=trim($value[14]);
            $goods->phone=trim($value[18]);
            $goods->receiving_address=trim($value[15]);
            $goods->save();
        }
    }
}
