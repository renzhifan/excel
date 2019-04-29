<?php

namespace App\Http\Controllers;

use App\Imports\GoodsImportStep2;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GoodsExport;
use App\Imports\GoodsImport;
class GoodsController extends Controller
{
    public function export()
    {
        return Excel::download(new GoodsExport, '最终excel数据表.xlsx');
    }
    public function import()
    {
       Excel::import(new GoodsImport, request()->file('file'));
        return redirect()
            ->route('home')
            ->with('success', '上传成功.');
    }
    public function importStep2()
    {
       Excel::import(new GoodsImportStep2(), request()->file('file'));
        return redirect()
            ->route('home')
            ->with('importStep2', '上传成功.');
    }
}//class end
