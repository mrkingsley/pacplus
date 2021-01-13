<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductImport;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;

class ProductImportController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new ProductImport, $file);

        return redirect('product.index')->with('success', 'All good!');
    }

}
