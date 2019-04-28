<?php

namespace App\Exports;

use App\Goods;
use Maatwebsite\Excel\Concerns\FromArray;

class GoodsExport implements FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function array(): array
    {

        $rawData = Goods::all()->toArray();
        $resData = [config('excel.header')];
        foreach ($rawData as $val) {
            $resData[] = $val;
        }
        return $resData;
    }
}
