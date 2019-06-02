<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use App\Jobs\GoodsStep2;
class GoodsImportStep2 implements ToArray
{
    /**
     * 引入淘宝客数据
     * @return \Illuminate\Support\Collection
     */
    public function array(array $row)
    {
        unset($row[0]);
        dispatch((new GoodsStep2($row)));
    }
}
