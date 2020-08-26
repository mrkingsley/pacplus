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
                  <h3 class="box-title">Detailed Customer Informations</h3>
                </div>
          <div class="box-body">
                  <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered" style="font-size:14px" id="order_table" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Customer_Name</th>
                            <th>Phone</th>
                            <th>Remark</th>
                            <th>Time</th>
                            <th style="width:100px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($client as $client)
                        <tr>
                        <td>{{ $client->ID }}</td>
                        <td>{{ $client->customer_name }}</td>
                        <td>{{ $client->phone}}</td>
                        <td>{{ $client->remark}}</td>
                        <td>{{ $client->created_at->diffForHumans() . $client->created_at->format('F d, Y')}}</td>
                    </td>
                        <td>

                            <a class="btn " data-toggle="tooltip"data-placement="top"  href="{{ route('client.edit',$client->id) }}"><i class="fa fa-pencil"></i> </a> 


                                <form onsubmit="return confirm('are you sure you want to delect this user')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('client.destroy', $client->id)}}">
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