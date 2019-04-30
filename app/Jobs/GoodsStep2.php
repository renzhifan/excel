<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Goods;
class GoodsStep2 implements ShouldQueue
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
                foreach ($this->row as $val) {
                    if(!empty(Goods::where('order_number',' ' . trim($val[13]) . ' ')->first())){
                        Goods::updateStep2(' ' . trim($val[13]) . ' ',
                            [
                                'accounting_time_two' => $val[2],
                                'taobao_customer_return_point' => $val[9],
                                'service_fee_for_head_of_regiment' => $val[11],
                            ]);
                    }
                }
            }
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
        }
    }
}
