<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class ArrayConstructExport implements FromArray
{
    public $users;

    public function __construct( array $users)
    {
        $this->users = $users;
    }

    public function array(): array
    {
        return $this->users;
    }
}
