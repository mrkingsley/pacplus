<?php

namespace App\Imports;

use App\Workshop;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class WorkshopImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Workshop([
            'name'  => $row[0],
            'hardware'   => $row[1],
            'software'  => $row[2],
        ]);
    }
}
