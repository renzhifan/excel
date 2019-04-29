<?php

namespace App\Imports;

use App\Jobs\GoodsOperation;
use Maatwebsite\Excel\Concerns\ToArray;

class GoodsImport implements ToArray
{
    /**
     * 引入淘宝订单数据
     * @return \Illuminate\Support\Collection
     */
    public function array(array $row)
    {
        dispatch((new GoodsOperation($row)));
    }
}
