<?php

namespace App\Exports;

use App\Goods;
use Maatwebsite\Excel\Concerns\FromCollection;

class GoodsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Goods::all();
    }
}
