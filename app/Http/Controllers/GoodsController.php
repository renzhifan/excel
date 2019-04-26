<?php

namespace App\Http\Controllers;

use App\Goods;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GoodsExport;
use App\Exports\GoodsImport;
class GoodsController extends Controller
{
    public function export()
    {
        return Excel::download(new GoodsExport, 'users.xlsx');
    }
    public function import()
    {
        Excel::import(new GoodsImport, request()->file('file'));
    }
}//class end
