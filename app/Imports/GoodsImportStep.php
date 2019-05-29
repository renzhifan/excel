<?php

namespace App\Imports;

use App\Jobs\GoodsStep;
use Maatwebsite\Excel\Concerns\ToArray;

class GoodsImportStep implements ToArray
{
    /**
     * 上传已有的excel数据表格
     * @return \Illuminate\Support\Collection
     */
    public function array(array $row)
    {
        unset($row[0]);
        dispatch((new GoodsStep($row)));
    }
}
