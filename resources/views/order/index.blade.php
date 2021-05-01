@extends('layouts.master')

@section('main')


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
            <form action="{{ route('order.index') }}"  method="get">
              <div class="row">
              <div class="box-header with-border">
              <h4 class="box-title">Invoice</h4></div>
                  <div class="col-sm-7"><input type="text" name="search"
                          class="form-control form-control-sm col-sm-10 float-right"
                          placeholder="Global Search..." onblur="this.form.submit()"></div>
                  <div class="col-sm-2"><a href="{{ url('/order/create')}}"
                          class="btn btn-primary btn-sm float-left btn-block">Create</a></div>
              </div>
          </form>
          </div>
          <div class="box-body">
            <div class="table-responsive">
                  <table class="table table-hover table-striped table-bordered " style="font-size:15px"  id="order_table" >
                      <thead>
                          <tr>
                            <th>S/N </th>
                            <th>Invoice ID </th>
                            <th>Customer Name </th>
                            <th>Date </th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($order as $orders)
                            <tr>
                                <td>{{$orders->id}}</td>
                                <td>INV-{{1000+$orders->id}}</td>
                                <td>{{$orders->supplier}}</td>
                                <td>{{$orders->created_at->format('Y-m-d')}}</td>
                                <td>
                                    <a class="btn btn-primary" href="{{route('order.show', $orders->id)}}"><i class="fa fa-bandcamp" ></i></a>
                                    <a class="btn btn-primary" href="{{route('order.edit', $orders->id)}}"><i class="fa fa-edit" ></i></a>
                                    <form onsubmit="return confirm('are you sure you want to delect this INVOICE')" class="d-inline-block"style="display: inline-block" method="post" action="{{ route('order.destroy', $orders->id)}}">
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


@push('js')
    <script type="text/javascript" src="{{asset('/')}}js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="{{asset('/')}}js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteTag(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
