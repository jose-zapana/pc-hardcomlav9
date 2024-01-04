<?php

namespace App\Http\Controllers;

use App\Exports\ArrayConstructExport;
use App\Exports\ArraySingleExport;
use App\Exports\CollectionExport;
use App\Exports\UsersExport;
use App\Exports\ViewExport;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class ExportController extends Controller
{
    public function index()
    {
        return view('export.index');
    }

    public function pdfBasicStream()
    {
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }

    public function pdfBasicDownload()
    {
        $pdf = PDF::loadHTML('<h1>Test</h1>');
        $name = 'REC-11111111-27032021.pdf';
        return $pdf->download($name);
    }

    public function pdfSaveDownload()
    {
        $pdf = PDF::loadHTML('<h1>Test con nuevo nombre otro nombre</h1>');
        $name = 'RECETA-27032021.pdf';
        $path = public_path().'/exports/'.$name;
        $pdf->save($path);
        return $pdf->stream('REC-27032021.pdf');
    }

    public function pdfViewStream()
    {
        $roles = Role::with('permissions')->get();
        //dd($roles);
        $vista = view('export.rolesPDF', compact('roles'));

        $pdf = PDF::loadHTML($vista);
        $name = 'roles_permisos.pdf';
        return $pdf->stream($name);
    }

    public function excelBasic()
    {
        return Excel::download(new UsersExport(), 'users.xlsx');
    }

    public function excelCollection()
    {
        return Excel::download(new CollectionExport(), 'collection.xlsx');
    }

    public function excelArray()
    {
        return Excel::download(new ArraySingleExport(), 'array.xlsx');
    }

    public function excelConstruct()
    {
        $array = [
            ['ID usuario', 'Nombre usuario', 'DNI usuario']
        ];

        $users = User::get(['id', 'name', 'dni'])->toArray();
        array_push($array, $users);

        return Excel::download(new ArrayConstructExport($array), 'constructor.xlsx');
    }

    public function excelView()
    {
        return Excel::download(new ViewExport(), 'view.xlsx');
    }


}
