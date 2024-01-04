<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CollectionExport implements FromCollection, WithCustomStartCell, WithColumnWidths, WithStyles
{
    public $collect;

    public function collection()
    {
        $collection = new Collection([
            ['Encabezado 1', 'Encabezado 2', 'Encabezado 3'],
            ['Dato 1', 'Dato 2', 'Dato 3']
        ]);

        $user = User::get(['id', 'name', 'dni'])->toArray();
        $collection->push($user);

        $this->collect = $collection;

        return $collection;
    }

    public function startCell(): string
    {
        // TODO: Implement startCell() method.
        return 'B2';
    }

    public function columnWidths(): array
    {
        // TODO: Implement columnWidths() method.
        return [
            'A' => 10,
            'B' => 25,
            'C' => 25,
            'D' => 25,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        // TODO: Implement styles() method.
        $cant = sizeof($this->collect);

        $array = [
            // Style the first row as bold text.
            2 => ['font' => ['bold' => true, 'size' => 24]],
        ];

        for ($i=2; $i<$cant-1; $i++)
        {
            array_push($array, [ $i => ['font' => ['italic' => true, 'size' => 18] ] ]);
        }

        return $array;
    }
}
