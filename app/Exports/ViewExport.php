<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Spatie\Permission\Models\Role;

class ViewExport implements FromView
{

    public function view(): View
    {
        return view('export.users', [
            'roles' => Role::with('permissions')->get()
        ]);
    }

}
