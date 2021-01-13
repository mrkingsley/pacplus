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
                  <form action="{{ route('purchase.index') }}"  method="get">
                    <div class="row">
                    <div class="box-header with-border">
                    <h4 class="box-title"> Purchases List</h4></div>
                        <div class="col-sm-7"><input type="text" name="search"
                                class="form-control form-control-sm col-sm-10 float-right"
                                placeholder="Global Search..." onblur="this.form.submit()"></div>
                        <div class="col-sm-2"><a href="{{ url('/purchase/create')}}"
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
                                    <th>SupplierName</th>
                                    <th>Products</th>
                                    <th>Qty</th>
                                    <th>UnityPrice</th>
                                    <th>Amount</th>
                                    <th>Code</th>
                                    <th>UnityAmount</th>
                                    <th>TotalAmount</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Total:</th>
                                        <th></th>
                                        <th></th>
                                        <td>{{ $purchase->sum('qty')}}</td>
                                        <th></th>
                                        <th><span>&#165;</span>{{ $purchase->sum('amount')}}</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th ></th>
                                        <th ></th>
                                    </tr>
                                    </tfoot>
                                <tbody>
                                @foreach($purchase as $index=>$purchase)
                                <tr>
                                <td>{{$index+1}}</td>
                                <td>{{ $purchase->supplier_name}}</td>
                                <td>{{ $purchase->product }}</td>
                                <td>{{ $purchase->qty}}</td>
                                <td><span>&#165;</span>{{ $purchase->amount / $purchase->qty}}</td>
                                         <td><span>&#165;</span>{{ $purchase->amount}}</td>
                                <td>{{ $purchase->code}}</td>
                                <td><span>&#8358;</span>{{
                                    $purchase->amount / $purchase->qty * $purchase->code}}</td>
                                <td><span>&#8358;</span>{{ $purchase->qty * $purchase->amount / $purchase->qty * $purchase->code,2,',','.'}}</td>
                                <td>{{ $purchase->created_at->diffForHumans() . $purchase->created_at->format('F d, Y')}}</td>
                            </td>
                                <td>

                                    <a class="btn " data-toggle="tooltip"data-placement="top"  href="{{ route('purchase.edit',$purchase->id) }}"><i class="fa fa-pencil"></i> </a>


                                        <form onsubmit="return confirm('are you sure you want to delect this user')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('purchase.destroy', $purchase->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn "><i class="fa fa-trash-o"></i></button>
                                </form>
                                </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <form action="/purchase/import" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-success">Import  Data</button>
                                <a class="btn btn-warning" href="{{ route('export') }}">Export Product Data</a>
                            </form>

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
