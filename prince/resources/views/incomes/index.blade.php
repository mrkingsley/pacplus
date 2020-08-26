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
                  <h3 class="box-title"><a href="{{ route('incomes.create') }}" >Enter New Income</a></h3></h3>
                </div>
          <div class="box-body">
                  <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered " style="font-size:14px" id="order_table" >
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Income Description</th>
                            <th>Amount</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($incomes as $income)
                        <tr>
                        <td>{{ $income->id }}</td>
                        <td>{{ $income->income_title }}</td>
                        <td><span>&#8358;</span>{{ $income->income_amount }}</td>
                        <td>{{ $income->income_date }}</td>
                    </td>
                        <td>

                            <a class="btn " data-toggle="tooltip"data-placement="top"  href="{{ route('incomes.edit',$income->id) }}"><i class="fa fa-pencil"></i> </a> 

                                <form onsubmit="return confirm('are you sure you want to delect this transaction!')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('incomes.delete',$income->id) }}">
                                @csrf
                                @method('get')
                                <button type="submit" class="btn "><i class="fa fa-trash-o"></i></button>
                        </form>
                         
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                        <th  colspan="2">Total</th>
                        <th class="text-success"><span>&#8358;</span>{{ $incomes->sum('income_amount') }}</th>
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
