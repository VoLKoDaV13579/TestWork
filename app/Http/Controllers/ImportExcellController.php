<?php

namespace App\Http\Controllers;

use App\Imports\ImportExcel;
use App\Models\Inventar;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcellController extends Controller
{
    public function index() {
        return view('/welcome');
    }

    public function import(Request $request) {
        Excel::import(new ImportExcel(), $request->file('excel_file'));

        // После импорта сразу перенаправляем на метод chart
        return redirect()->route('excel.chart');
    }

    public function test() {
        return view('/test');
    }

    public function testimport(Request $request) {
        Excel::import(new ImportExcel(), $request->file('excel_test_file'));
        return redirect()->route('excel.chart'); // Аналогично перенаправляем на chart
    }

    public function chart(Request $request) {
        // Получаем данные для диаграммы
        $data = Inventar::where('id', '>', 2)->get();
        $indicator = [];
        $values = [];

        foreach ($data as $d) {
            $indicator[] = ($d->indicator == 'НЭП') ? $d->nep : $d->indicator;
            $values[] = $d->qty;
        }
        return view('/chart', ['indicator' => $indicator, 'values' => $values]);
    }
}
