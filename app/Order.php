<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];
    public function clients()
    {
        return $this->belongsTo(Client::class, 'clients_id');
    }
    public function products()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

}
