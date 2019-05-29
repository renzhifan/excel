<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Goods;

class GoodsStep implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $row;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($row)
    {
        $this->row = $row;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            if ($this->row) {
                Goods::truncate();
                foreach ($this->row as $value) {
                    $this->create($value);
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function create($row)
    {
        $goods = new Goods;
        $goods->date =trim($row[1]);
        $goods->order_number =$this->getOrderNumber(trim($row[2]));
        $goods->buyer_nickname =trim($row[3]);
        $goods->goods_name =trim($row[4]);
        $goods->goods_num =trim($row[5]);
        $goods->loan_cost =trim($row[6]);
        $goods->prediction_of_express_packaging =trim($row[7]);
        $goods->estimated_cost =trim($row[8]);
        $goods->total_sum =trim($row[9]);
        $goods->actual_payment =trim($row[10]);
        $goods->profit_forecast =trim($row[11]);
        $goods->refund_amount =trim($row[12]);
        $goods->order_state =trim($row[13]);
        $goods->channel =trim($row[14]);
        $goods->payment_method =trim($row[15]);
        $goods->payment_date_one =trim($row[16]);
        $goods->amount_of_account_payable_one =trim($row[17]);
        $goods->payment_date_two =trim($row[18]);
        $goods->refund =trim($row[19]);
        $goods->payment_date_three =trim($row[20]);
        $goods->amount_of_account_payable_three =trim($row[21]);
        $goods->account_statement =trim($row[22]);
        $goods->accounting_time_one =trim($row[23]);
        $goods->amount_of_account_one =trim($row[24]);
        $goods->accounting_time_two =trim($row[25]);
        $goods->taobao_customer_return_point =trim($row[26]);
        $goods->service_fee_for_head_of_regiment =trim($row[27]);
        $goods->credit_card_time =trim($row[28]);
        $goods->service_fee_for_card =trim($row[29]);
        $goods->body_plan_time_four =trim($row[30]);
        $goods->amount_of_account_four =trim($row[31]);
        $goods->freight_insurance_time_five =trim($row[32]);
        $goods->amount_of_account_five =trim($row[33]);
        $goods->accounting_time_six =trim($row[34]);
        $goods->amount_of_account_six =trim($row[35]);
        $goods->accounting_description =trim($row[36]);
        $goods->invoice =trim($row[37]);
        $goods->remarks =trim($row[38]);
        $goods->supplier =trim($row[39]);
        $goods->addressee =trim($row[40]);
        $goods->phone =$this->getPhone(trim($row[41]));
        $goods->receiving_address =trim($row[42]);
        $goods->save();
    }
    public function getOrderNumber($order)
    {
        if(strpos(trim($order),'=') !== false){
            $order_number=substr($order,1);
        }elseif(empty($order)){
            $order_number='';
        }else{
            $order_number='"'.trim($order).'"';
        }
        return $order_number;
    }
    public function getPhone($phone)
    {
        if(strpos(trim($phone),"'") !== false){
            $order_number='"'.substr($phone,1).'"';
        }elseif(empty($phone)){
            $order_number='';
        }else{
            $order_number='"'.trim($phone).'"';
        }
        return $order_number;
    }
}
