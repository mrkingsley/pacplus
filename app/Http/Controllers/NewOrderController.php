<?php

namespace App\Http\Controllers;
use http\Env\Response;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewOrderController extends Controller
{
    public function search(Request $request){

        if($request->ajax()) {

            $data = Product::select("name")->where('name', 'LIKE', $request->name.'%')
                ->get();

            $output = '';

            if (count($data)>0) {

                $output = '<ul class="list-group" style="display: block; position: relative; z-index: 1">';

                foreach ($data as $row){

                    $output .= '<li class="list-group-item">'.$row->name.'</li>';
                }

                $output .= '</ul>';
            }
            else {

                $output .= '<li class="list-group-item">'.'No results'.'</li>';
            }

            return $output;
        }
    }
    public function dataAjax(Request $request)
    {
    	$data = [];

        if($request->has('q')){
            $search = $request->q;
            $data =Product::select("name")
            		->where('name','LIKE',"%$search%")
            		->get();
        }
        return response()->json($data);
    }
}
