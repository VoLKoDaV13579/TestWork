<?php

namespace App\Imports;

use App\Models\Test;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TestImport implements ToCollection, WithHeadingRow, ToModel
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {

    }
    public function model(array $row) {

        Test::create([
            'name' => $row['name'],
            'email' => $row['email'],
            'address' => $row['address'],
            'phone' => $row['phone'],
        ]);
    }
    public function headingRow(): int {
        return 1;
    }
}
