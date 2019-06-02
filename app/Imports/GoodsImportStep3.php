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
        unset($row[0]);
        unset($row[1]);
        unset($row[2]);
        dd($row);
        foreach ($row as $val) {
            if(!empty(Goods::where('payment_number',trim($val[2]))->first())){
                $payment_method='';
                $payment_date_two='';
                $refund='';
                if(strpos($val[10],'信用卡')!== false){
                    $payment_method='信用卡';
                }
                if($val[5]==' ' && $val[13]=='*昊'){
                    $payment_date_two=$val[1];
                    $refund=$val[6];
                }

                Goods::updateGoods(' ' . trim($val[13]) . ' ',
                    [
                        'payment_method' =>$payment_method,
                        'payment_date_two' =>$payment_date_two,
                        'refund' =>$refund,
//                        'taobao_customer_return_point' => $val[9],
//                        'service_fee_for_head_of_regiment' => $val[11],
                    ]);
            }
        }
    }
}
