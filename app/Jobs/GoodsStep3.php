<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Goods;

class GoodsStep3 implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $row3;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($row3)
    {
        $this->row3 = $row3;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            foreach ($this->row3 as $val) {
                if (!Goods::is_exit('"' . (substr(trim($val[4]), 5)) . '"')) {
                    if ($val[5] == '服务费') {
                        Goods::updateGoods('"' . (substr(trim($val[4]), 5)) . '"',
                            [
                                'credit_card_time' => $val[1],//入账时间-信用卡时间
                                'service_fee_for_card' => $val[7],//支出-服务费(信用卡)
                            ]);
                    }
                    if ($val[5] == '交易分账' && strpos($val[13], '扶贫基金会') !== false && $val[7] == '0.02') {
                        Goods::updateGoods('"' . (substr(trim($val[4]), 5)) . '"',
                            [
                                'body_plan_time_four' => $val[1],//入账时间-宝贝计划时间4
                                'amount_of_account_four' => $val[7],//支出-支出金额4
                            ]);
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
