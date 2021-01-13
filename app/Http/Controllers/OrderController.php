<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use App\Supplier;
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
        $user = User::all();
        $orders = Order::when(request('search'), function($query){
            return $query->where('supplier_name','like','%'.request('search').'%')
            ->orwhere('product','like','%'.request('search').'%') ->orwhere('amount','like','%'.request('search').'%')
            ->orwhere('created_at','like','%'.request('search').'%');
        })
        ->orderBy('created_at','desc')->paginate(100);
        return view('order.index', ['order' => $orders, 'user' => $user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('order.create', ['products'=>$products,'suppliers'=>$suppliers]);
    }

    public function findProductCode(Request $request)
    {
        $data=Product::select('sales_price','id')->where('model',$request->id)->take(100)->get();

        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'product_name' => 'required',
            'status' => 'required',
            'supplier' => 'required',
            'category' => 'required',
            'qty' => 'required',
            'price' => '',
            'product_code' => '',
            'code' => '',
            'status' => '',

        ]);
        $input = $request->all();
        $order = Order::create($input);
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //       $id = Auth::user()->id;
    //         //
    //         $data['data'] = DB::table('orders')->where('user_id','=', $id)->first();

    //         return view('order.show',compact('data'));

    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $products = Product::all();
        $suppliers = Supplier::all();
        return view('order.edit', ['products'=>$products,'suppliers'=>$suppliers], compact('order'));
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
        $order->product_name = $request->product_name;
        $order->model = $request->model;
        $order->category = $request->category;
        $order->qty = $request->qty;
        $order->price = $request->price;
        $order->product_code = $request->product_code;
        $order->code = $request->code;
        $order->save();
        return redirect(route('order.index'));
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
        return redirect(route('order.index'));
    }
}
