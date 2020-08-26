@extends('layouts.db')


@section('main')

        <!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header box-header-primary">
                  <div class="row">
                  <div class="col-xs-12">
                  </div>
                  </div>
                  <h3 class="box-title">Suppliers</h3>
                </div>
          <div class="box-body">
                  <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered " style="font-size:14px" id="order_table" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Supplier Name</th>
                            <th>Phone No:</th>
                            <th>Email</th>
                            <th>Products</th>
                            <th>Remark</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($supplier as $supplier)
                        <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->supplier_name }}</td>
                        <td>{{ $supplier->phone}}</td>
                        <td>{{ $supplier->email}}</td>
                        <td>{{ $supplier->company}}</td>
                        <td>{{ $supplier->remark}}</td>
                        <td>{{ $supplier->created_at->diffForHumans() . $supplier->created_at->format('F d, Y')}}</td>
                    </td>
                        <td>

                            <a class="btn " data-toggle="tooltip"data-placement="top"  href="{{ route('supplier.edit',$supplier->id) }}"><i class="fa fa-pencil"></i> </a> 


                                <form onsubmit="return confirm('are you sure you want to delect this user')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('supplier.destroy', $supplier->id)}}">
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
    $('#order_table').DataTable();
} );

    </script>
@endsection
