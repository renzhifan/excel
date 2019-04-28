<?php

namespace App\Exports;

use App\Goods;
use App\Jobs\GoodsOperation;
use Maatwebsite\Excel\Concerns\ToArray;

class GoodsImport implements ToArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(array $row)
    {
        dispatch((new GoodsOperation($row)));
    }
}
