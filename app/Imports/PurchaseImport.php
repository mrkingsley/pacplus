<?php

namespace App\Imports;

use App\Purchase;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class PurchaseImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Purchase([
            'supplier_name'  => $row[0],
            'product'   => $row[1],
            'amount'  => $row[2],
            'qty'    => $row[3],
        ]);
    }
}
