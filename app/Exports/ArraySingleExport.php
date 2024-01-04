<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ArraySingleExport implements FromArray
{
    public function array(): array
    {
        return [
            [1,2,3],
            [4,5,6]
        ];
    }
}
