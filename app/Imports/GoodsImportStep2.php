<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use App\Goods;

class GoodsImportStep2 implements ToArray
{
    /**
     * 引入淘宝客数据
     * @return \Illuminate\Support\Collection
     */
    public function array(array $row)
    {

        unset($row[0]);
        foreach ($row as $val) {
            $goods = Goods::where('order_number', ' ' . trim($val[13]) . ' ')->first();
                if ($goods) {
                    $goods = $goods->id;
                    $save = Goods::find($goods);
                    $save->accounting_time_two = $val[2];
                    $save->taobao_customer_return_point = $val[9];
                    $save->service_fee_for_head_of_regiment = $val[11];
                    $save->save();
                }

//            Goods::updateStep2(' ' . trim($val[13]) . ' ',
//                [
//                    'accounting_time_two' => $val[2],
//                    'taobao_customer_return_point' => $val[9],
//                    'service_fee_for_head_of_regiment' => $val[11],
//                ]);
//            dd($val);
        }
        dd($row);
//        dispatch((new GoodsOperation($row)));
    }
}
