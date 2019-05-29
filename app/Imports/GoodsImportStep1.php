<?php

namespace App\Imports;

use App\Goods;
use App\Jobs\GoodsStep1;
use Maatwebsite\Excel\Concerns\ToArray;

class GoodsImportStep1 implements ToArray
{
    /**
     * 引入淘宝订单数据
     * @return \Illuminate\Support\Collection
     */
    public function array(array $rows)
    {
        unset($rows[0]);
        dispatch((new GoodsStep1($rows)));
    }
}
