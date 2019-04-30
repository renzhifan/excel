<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GoodsExport;
use App\Imports\GoodsImportStep1;
use App\Imports\GoodsImportStep2;
use App\Imports\GoodsImportStep3;
class GoodsController extends Controller
{
    public function export()
    {
        return Excel::download(new GoodsExport, '最终excel数据表.xlsx');
    }
    public function importStep1()
    {
       Excel::import(new GoodsImportStep1, request()->file('file'));
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
    public function importStep3()
    {
       Excel::import(new GoodsImportStep3(), request()->file('file'));
        return redirect()
            ->route('home')
            ->with('importStep3', '上传成功.');
    }
}//class end
