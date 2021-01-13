<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class NewOrderController extends Controller
{
   public function prodfunct(){
        $prod=Product::all();
        return view('order.create',compact('prod'));
   }
}
