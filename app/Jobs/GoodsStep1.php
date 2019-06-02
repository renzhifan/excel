<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Goods;

class GoodsStep1 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $rows;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($rows)
    {
        $this->rows = $rows;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            if ($this->rows) {
                foreach ($this->rows as $value) {
                    $this->createOrUpdate($value);
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function createOrUpdate($value)
    {
        if (Goods::is_exit(getOrderNumber(trim($value[0])))) {
            /*if (!empty($value[4]) && !is_null($value[4])) {
                $payment_number = explode('，', trim($value[4]));
                $payment_number = explode('：', $payment_number[1])[1];
            }
            $goodsData = new Goods;
            $goodsData->order_number =getOrderNumber(trim($value[0]));//订单编号
            $goodsData->date = trim($value[19]);//日期
            $goodsData->buyer_nickname = trim($value[1]);//买家会员名
            $goodsData->goods_name = trim($value[21]);//产品名称
            $goodsData->goods_num = trim($value[22]);//数量
            $goodsData->order_state = trim($value[12]);//订单状态
            $goodsData->total_sum = trim($value[8]);//总金额
            $goodsData->actual_payment = trim($value[10]);//实际支付
            $goodsData->payment_number = $payment_number;//支付宝支付单号
            $goodsData->payment_date_one = trim($value[53]);//收入时间1
            $goodsData->amount_of_account_payable_one = trim($value[54]);//收入金额1
            $goodsData->addressee = trim($value[14]);//收件人
            $goodsData->phone = getPhone(trim($value[18]));//电话
            $goodsData->receiving_address = trim($value[15]);//收货地址
            $goodsData->save();*/
        } else {
            Goods::updateGoods(getOrderNumber(trim($value[0])),
                [
//                    'order_state ' => trim($value[12]),//订单状态
                    'payment_date_one ' => trim($value[53]),//收入时间1
                    'amount_of_account_payable_one ' => trim($value[54]),//收入金额1
                ]);
        }
    }
}
