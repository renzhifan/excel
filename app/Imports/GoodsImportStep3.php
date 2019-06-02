<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use App\Jobs\GoodsStep3;
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
        dispatch((new GoodsStep3($row)));
    }
}
