<?php

namespace App\Imports;

use App\Models\Inventar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportExcel implements ToCollection, ToModel
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        //dd($collection);
    }
    public function model(array $row)
    {

        if (empty($row[0]) || $row[0] == 'NN строк' || $row[1] =='Показатели' || $row[4] == 'Количество') {
            return;
        }
        if (!empty($row[2])) {
            $row[1] = 'НЭП';
        } else {
            $row[2] = 'Пусто';
        }
        if (empty($row[3] ) ) {
            $row[3] = "В среднем в сутки";
        }
        if ($row[0] === 'Фильтр: Тяга: Электровозная Депо прип. лок.: 6811-АСТАНА ') {
            $row[3] = 'Пусто';
        }
        if ($row[0] === 'Анализ отчета ЦО-2 раздел 1. Наличие и распределение локомотивов
за  период с 01.08.2024 по 31.08.2024') {
            $row[3] = 'Пусто';
        }
        if ($row[0] === '1') {
            $row[3] = 'Пусто';
        }
        Inventar::create([
            'nn'=>$row[0],
            'indicator' => $row[1],
            'nep'=>$row[2],
            'middle'=>$row[3],
            'qty'=>empty($row[4]) ? 0 : $row[4],
        ]);

    }
}
