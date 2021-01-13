<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\WorkshopImport;
use Maatwebsite\Excel\Facades\Excel;

class WorkshopImportController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new WorkshopImport, $file);

        return redirect('product.index')->with('success', 'All good!');
    }

}
