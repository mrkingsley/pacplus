<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name' ,'transaction','amount','account_name','account_no', 'phone','bank_charge','charge','remark',
    ];
}
