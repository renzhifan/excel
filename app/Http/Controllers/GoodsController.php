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
        return Excel::download(new GoodsExport, '最终excel数据表.xlsx');
    }
    public function import()
    {
       Excel::import(new GoodsImport, request()->file('file'));
       return redirect('/home');
    }
}//class end
