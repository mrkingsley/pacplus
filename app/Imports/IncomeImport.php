<?php

namespace App\Imports;

use App\Income;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class IncomeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Income([
            'user_id' => Auth::id(),
            'income_title'  => $row[0],
            'income_amount'   => $row[1],
        ]);
    }
}
