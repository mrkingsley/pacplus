<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\PurchaseImport;
use Maatwebsite\Excel\Facades\Excel;

class PurchaseImportController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new PurchaseImport, $file);

        return redirect('product.index')->with('success', 'All good!');
    }
}
