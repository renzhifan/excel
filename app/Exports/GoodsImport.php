<?php

namespace App\Exports;

use App\Goods;
use Maatwebsite\Excel\Concerns\ToArray;
class GoodsImport implements ToArray
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(array $row)
    {
        dd($row);
        return new User([
            'name'     => $row[0],
            'email'    => $row[1],
            'password' => Hash::make($row[2]),
        ]);
    }
}
