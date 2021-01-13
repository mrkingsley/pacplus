@extends('layouts.db')


@section('main')

<section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header box-header-primary">
                  <div class="row">
                  <div class="col-xs-12">
                  </div>
                  </div>
                  <form action="{{ route('order.index') }}"  method="get">
                    <div class="row">
                    <div class="box-header with-border">
                    <h4 class="box-title"> Placed Order List</h4></div>
                        <div class="col-sm-7"><input type="text" name="search"
                                class="form-control form-control-sm col-sm-10 float-right"
                                placeholder="Global Search..." onblur="this.form.submit()"></div>
                        <div class="col-sm-2"><a href="{{ url('/order/create')}}"
                                class="btn btn-primary btn-sm float-left btn-block">Add</a></div>
                    </div>
                </form>
                </div>
          <div class="box-body">
                  <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered " style="font-size:15px"  id="order_table" >
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Products</th>
                                    <th>Model</th>
                                    <th>Category</th>
                                    <th>Qty</th>
                                    <th>Unit Price</th>
                                    <th>Amount</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Total:</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <td>{{ $order->sum('product_code') * $order->sum('code') + $order->sum ('price') * $order->sum('qty') }}</td>
                                        <th></th>

                                        {{-- <th><span>&#165;</span>{{ $order->sum('amount')}}</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th ></th>
                                        <th ></th> --}}
                                    </tr>
                                    </tfoot>
                                <tbody>
                                @foreach($order as $index=>$order)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{ $order->product_name}}</td>
                                <td>{{ $order->model }}</td>
                                <td>{{ $order->category}}</td>
                                <td>{{ $order->qty}}</td>
                                <td>{{ $order->product_code}}</td>
                                <td>{{ $order->code}}</td>
                                <td>{{ $order->price}}</td>
                                <td><span>&#8358;</span>{{ $order->product_code * $order->code + $order->price }}</td>
                                <td><span>&#8358;</span>{{ $order->product_code * $order->code + $order->price * $order->qty }} </td>
                                         {{-- <td><span>&#165;</span>{{ $purchase->amount}}</td>
                                <td>{{ $purchase->code}}</td>
                                <td><span>&#8358;</span>{{
                                    $purchase->amount / $purchase->qty * $purchase->code}}</td>
                                <td><span>&#8358;</span>{{ $purchase->qty * $purchase->amount / $purchase->qty * $purchase->code,2,',','.'}}</td> --}}
                                <td>{{ $order->created_at->diffForHumans() . $order->created_at->format('F d, Y')}}</td>
                            </td>
                                <td>

                                    <a class="btn " data-toggle="tooltip"data-placement="top"  href="{{ route('order.edit',$order->id) }}"><i class="fa fa-pencil"></i> </a>
                                        <form onsubmit="return confirm('are you sure you want to delect this user')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('order.destroy', $order->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn "><i class="fa fa-trash-o"></i></button>
                                </form>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>

                </div><!-- /.box-body -->


            </div><!-- /.box -->



        </div> <!-- /.col -->
    </div>
    <!-- /.row -->


</section><!-- /.content -->


@endsection



@section('page-js')
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#order_table').DataTable({order: [],
    scrollX: true,

    });
        } );
    </script>

@endsection
