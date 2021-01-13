<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\OrderImport;
use Maatwebsite\Excel\Facades\Excel;

class OrderImportController extends Controller
{
    public function store(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new OrderImport, $file);

        return redirect('product.index')->with('success', 'All good!');
    }
    public function order(Request $request)
    {
        $file = $request->file('file');
        Excel::import(new OrderImport, $file);

        return redirect('product.index')->with('success', 'All good!');
    }
}
