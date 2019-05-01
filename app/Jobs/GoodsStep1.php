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
                    $this->createOrUpdate($value);
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }

    public function createOrUpdate($value)
    {
        if (Goods::is_exit(trim($value[0]))) {
            $goods = new Goods;
            $goods->order_number = ' ' . trim($value[0]) . '';//订单编号
            $goods->date = trim($value[19]);//日期
            $goods->buyer_nickname = trim($value[1]);//买家会员名
            $goods->goods_name = trim($value[21]);//产品名称
            $goods->goods_num = trim($value[22]);//数量
            $goods->order_state = trim($value[29]);//订单状态
            $goods->total_sum = trim($value[8]);//总金额
            $goods->actual_payment = trim($value[10]);//实际支付
            $goods->payment_date_one = trim($value[53]);//到账时间1
            $goods->amount_of_account_payable_one = trim($value[54]);//到账金额
            $goods->addressee = trim($value[14]);//收件人
            $goods->phone = trim($value[18]);//电话
            $goods->receiving_address = trim($value[15]);//收货地址
            $goods->save();
        } else {
            Goods::updateGoods(trim($value[0]),
                [
                    'date ' => trim($value[19]),//日期
                    'buyer_nickname ' => trim($value[1]),//买家会员名
                    'goods_name ' => trim($value[21]),//产品名称
                    'goods_num ' => trim($value[22]),//数量
                    'order_state ' => trim($value[29]),//订单状态
                    'total_sum ' => trim($value[8]),//总金额
                    'actual_payment ' => trim($value[10]),//实际支付
                    'payment_date_one ' => trim($value[53]),//到账时间1
                    'amount_of_account_payable_one ' => trim($value[54]),//到账金额
                    'addressee ' => trim($value[14]),//收件人
                    'phone ' => trim($value[18]),//电话
                    'receiving_address ' => trim($value[15]),//收货地址
                ]);
        }
    }
}
