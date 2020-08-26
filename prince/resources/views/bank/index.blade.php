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
                  <h3 class="box-title">Detailed Pos Transactions </h3>
                </div>
          <div class="box-body">
                  <div class="table-responsive">

                        <table class="table table-hover table-striped table-bordered " style="font-size:15px"  id="order_table" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Phone No.</th>
                            <th>Transaction Type</th>
                            <th>Amount</th>
                            <th>Account Name</th>
                            <th>Account No.</th>
                            <th>S.Charges</th>
                            <th>B.Charges</th>
                            <th>G.Profit</th>
                            <th>Remark</th>
                            <th>Time</th>
                            <th >Action</th>
                        </tr>
                        </thead>
                        <tbody>
                    @foreach($bank as $bank)
                        <tr>
                        <td>{{$bank->id}}</td>
                        <td>{{ $bank->name }}</td>
                        <td>{{ $bank->phone}}</td>
                        <td>{{ $bank->transaction}}</td>
                        <td><span>&#8358;</span>{{ $bank->amount}}</td>
                        <td>{{ $bank->account_name}}</td>
                        <td>{{ $bank->account_no}}</td>
                        <td><span>&#8358;</span>{{ $bank->charge}}</td>
                        <td><span>&#8358;</span>{{ $bank->bank_charge}}</td>
                        <td disabled><span>&#8358;</span>{{$bank->charge - $bank->bank_charge}}</td>
                        <td>{{ $bank->remark}}</td>
                        <td>{{ $bank->created_at->diffForHumans() . $bank->created_at->format('F d, Y')}}</td>
                    </td>
                        <td>

                            <a class="btn " data-toggle="tooltip"data-placement="top"  href="{{ route('bank.edit',$bank->id) }}"><i class="fa fa-pencil"></i> </a> 

                                <form onsubmit="return confirm('are you sure you want to delect this transaction!')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('bank.destroy', $bank->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn "><i class="fa fa-trash-o"></i></button>
                        </form>
                         
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <th   colspan="9">Total</th>
                            <!-- <td class="text-success"><span>&#8358;</span> {{$bank->sum('bank_charge') }}</td>

                            <td class="text-success" colspan="8"><span>&#8358;</span>{{ $bank->sum('charge') }}</td> -->
                            <td class="text-success" ><span>&#8358;</span>{{$bank->sum('charge')  - $bank->sum('bank_charge')}}</td>
    
                        </tfoot>
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

       
