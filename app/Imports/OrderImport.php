<?php

namespace App\Imports;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class OrderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Order([
            'product_name'  => $row[0],
            'category'   => $row[1],
            'product_code'  => $row[2],
        ]);
    }
}
