<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Client;
use App\Purchase;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::all();
        return view('order.index', ['order'=>$order]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $clients = Client::all();
        return view('order.create', ['products'=>$products,'clients'=>$clients]);
    }

    public function findProductCode(Request $request)
    {
        $data=Purchase::select('sales_price','id')->where('purchase',$request->id)->take(100)->get();

        return response()->json ($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'product_name' => 'required',
            'date' => 'required',
            'supplier' => 'required',
            'income_amount' => '',
            'qty' => 'required',
            'price' => 'required',
            'dis' => 'required',
            'amount' => 'required',

        ]);
        foreach ( $request->product_name as $key => $product_name){
            $sale = new Order();
            $sale->product_name = $request->product_name[$key];
            $sale->date = $request->date[$key];
            $sale->supplier = $request->supplier[$key];
            $sale->income_amount = $request->income_amount[$key];
            $sale->qty = $request->qty[$key];
            $sale->price = $request->price[$key];
            $sale->dis = $request->dis[$key];
            $sale->amount = $request->amount[$key];
            $sale->save();
        }
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = Product::all();
        $clients = Client::all();
        return view('order.edit', ['products'=>$products,'clients'=>$clients], compact('order'));
    }
    public function findPrice(Request $request){
        $data = DB::table('products')->select('sales_price')->where('id', $request->id)->first();
        return response()->json($data);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
        'product_name' => 'required',
        'date' => 'required',
        'supplier' => 'required',
        'income_amount' => '',
        'qty' => 'required',
        'price' => 'required',
        'dis' => 'required',
        'amount' => 'required',

    ]);
    foreach ( $request->product_name as $key => $product_name){
        $order->product_name = $request->product_name[$key];
        $order->date = $request->date[$key];
        $order->supplier = $request->supplier[$key];
        $order->income_amount = $request->income_amount[$key];
        $order->qty = $request->qty[$key];
        $order->price = $request->price[$key];
        $order->dis = $request->dis[$key];
        $order->amount = $request->amount[$key];
        $order->save();
    }
    return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back();

    }
}
