<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\IncomeImport;
use Maatwebsite\Excel\Facades\Excel;

class IncomeImportController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new IncomeImport, $file);

        return redirect('product.index')->with('success', 'All good!');
    }

}
