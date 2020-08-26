@extends('layouts.db')


@section('page-css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/select2/select2.min.css') }}">
@endsection

@section('main')

        <!-- Content Header (Page header) -->


<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

           
                    
                <form class="form-horizontal" action="{{route('user.store')}}" enctype="multipart/form-data" method="post">
                        @csrf


                    <div class="form-group {{ $errors->has('name')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="name">
                            {!! $errors->has('name')? '<p class="help-block"> '.$errors->first(' name').' </p>':'' !!}
                        </div>
                    </div>



                    <div class="form-group {{ $errors->has('email')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Email</label>
                        <div class="col-sm-7">
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email">
                            {!! $errors->has('email')? '<p class="help-block"> '.$errors->first('email').' </p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Password</label>
                        <div class="col-sm-7">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        {!! $errors->has('password')? '<p class="help-block"> '.$errors->first('password').' </p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('password_confirmation')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Confirm Password</label>
                        <div class="col-sm-7">
                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                        {!! $errors->has('password_confirmation')? '<p class="help-block"> '.$errors->first('password_confirmation').' </p>':'' !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-7 col-sm-offset-3">
                            <button type="submit" name="submit" class="btn btn-primary" required="required"><i class="fa fa-plus-square-o"></i> Add user</button>
                        </div>
                    </div>
                    </form>






                </div><!-- /.box-body -->


            </div><!-- /.box -->



        </div> <!-- /.col -->
    </div>
    <!-- /.row -->


</section><!-- /.content -->


@endsection