<?php

namespace App\Imports;

use App\Goods;
use Maatwebsite\Excel\Concerns\ToArray;

class GoodsImportStep3 implements ToArray
{
    /**
     * 引入支付宝数据
     * @return \Illuminate\Support\Collection
     */
    public function array(array $row)
    {
        dd($row);
        /*foreach ($row as $val) {
            if(!empty(Goods::where('order_number',' ' . trim($val[13]) . ' ')->first())){
                Goods::updateStep2(' ' . trim($val[13]) . ' ',
                    [
                        'accounting_time_two' => $val[2],
                        'taobao_customer_return_point' => $val[9],
                        'service_fee_for_head_of_regiment' => $val[11],
                    ]);
            }
        }*/
    }
}
