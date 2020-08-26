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
                  <h3 class="box-title">Users</a></h3></h3>
                </div>
          <div class="box-body">
                  <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered " style="font-size:14px" id="order_table" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                        <td>{{  $user->id }}</td>
                        <td>{{  $user->name }}</td>
                        <td>{{  $user->email }}</td>
                    </td>
                        <td>
                        <a class="btn " href="{{route('user.show',$user->id) }}"><i class="fa fa-pencil"></i></a>


                            <form onsubmit="return confirm('are you sure you want to delect this user')" class="d-inline-block" style="display: inline-block" method="post" action="{{ route('user.destroy', $user->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn "><i class="fa fa-trash-o"></i></button>
                        </form>
                        </td>
                        </tr>
                        @endforeach
                        
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

