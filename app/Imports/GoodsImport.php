<?php

namespace App\Imports;

use App\Goods;
use Maatwebsite\Excel\Concerns\ToModel;

class GoodsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Goods([
            //
        ]);
    }
}
