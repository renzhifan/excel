<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Goods;

class GoodsOperation implements ShouldQueue
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
            $goods->order_number = ' '.trim($value[0]).'';
            $goods->date = trim($value[19]);
            $goods->buyer_nickname = trim($value[1]);
            $goods->goods_name = trim($value[21]);
            $goods->goods_num = trim($value[22]);
            $goods->order_state = trim($value[29]);
            $goods->total_sum = trim($value[8]);
            $goods->actual_payment = trim($value[10]);
            $goods->payment_method = trim($value[4]);
            $goods->supplier = trim($value[28]);
            $goods->addressee = trim($value[14]);
            $goods->phone = trim($value[18]);
            $goods->receiving_address = trim($value[15]);
            $goods->save();
        }
    }
}
