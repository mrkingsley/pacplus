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
            'category'  => $row[1],
            'price'    => $row[2],
            'sales_price'  => $row[3],
            'qty' => $row[4],
        ]);
    }
}
