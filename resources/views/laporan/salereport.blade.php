@extends('layouts.db')


@section('main')
<div class="content">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="box">
                    <div class="row">
                    <div class="box-header bg-white">
                    <div class="box-header with-border"><h4 class="font-weight-bold">Report</h4></div>
                    <div class="box-header with-border"><a class="btn btn-primary float-right btn-sm" onclick="window.print()"><i class="fas fa-print"></i> Print</a>
                        <a href="{{ URL::previous() }}" class="btn btn-success float-right btn-sm"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    </div>
                </div>

                        <table class="table table-hover table-striped table-bordered " style="font-size:14px" id="order_table" >
                                <thead>
                                    <tr>
                                    <th>No</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Saling price</th>
                                    <th>purchasing price</th>
                                    <th>Total price</th>
                                    <th>Gross Profit</th>
                                </tr>
                                </thead>
                                <tbody>
                                     @foreach ($transaksi->productTranscation as $index=>$item)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$item->product->name}}</td>
                                            <td>{{$item->qty}}</td>
                                            <td><span>&#8358;</span>{{$item->product->price}}</td>
                                            <td><span>&#8358;</span>{{$item->product->sales_price}}</td>
                                            <td><span>&#8358;</span>{{$item->product->price  * $item->qty}}</td>
                                            <td><span>&#8358;</span>{{$item->product->price  * $item->qty - $item->product->sales_price * $item->qty}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    </div>
                    </div>
                    </div>
    <!-- /.row -->



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

