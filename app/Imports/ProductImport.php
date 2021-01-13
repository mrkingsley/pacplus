<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Auth;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'user_id' => Auth::id(),
            'name'  => $row[0],
            'model'   => $row[1],
            'category'  => $row[2],
            'price'    => $row[3],
            'sales_price'  => $row[4],
            'qty' => $row[5],
        ]);
    }
}
