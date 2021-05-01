<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prince Ajah Communication</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/png" href="images/icons/avatar-02.jpg"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/js/chosen.min.css') }}">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="{{ asset('assets/js/chosen.jquery.min.js') }}"></script>
</head>
<body class="bg-dark">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title">Add Purchases</h3><div class="col-sm-2"><a href="{{ url('purchase')}}"
                            class="btn  btn-sm float-left btn-block">Back</a></div>
                    </div><!-- /.box-header -->
                    <div class="card-body">
                        @if(Session::has('error'))
                            @include('layouts.flash-error',[ 'message'=> Session('error') ])
                        @endif
                        <form class="form-horizontal" action="{{route('purchase.store')}}" enctype="multipart/form-data" method="post">
                            @csrf

                            <div class="form-group  {{ $errors->has('supplier_name')? 'has-error' : '' }}">
                                <div class="form-control">
                                <label for="supplier_name">Supplier::</label>
                                <select class="chosen" style="width:500px;" placeholder="Select Product, " name="supplier_name">
                                        <option value="" disabled selected>select Supplier</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->supplier_name }}">{{$supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control">
                                <label for="model">Product : </label>
                                <select class="chosen" style="width:500px;" placeholder="Select Product, " name="product">
                                        <option value="" disabled selected>select  product</option>
                                @foreach($products as $product)
                                    <option value="{{$product->name }} {{$product->model}}">{{$product->name }} {{$product->model}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('amount')? 'has-error' : '' }}">
                                <label class="control-label col-sm-3">Amount</label>
                                <div class="col-sm-7">
                                    <input type="text" name="amount" class="form-control" value="{{ old('amount') }}" placeholder="enter amount">
                                    {!! $errors->has('amount')? '<p class="help-block"> '.$errors->first('u-price').' </p>':'' !!}
                                </div>
                            </div>

                        <div class="form-group {{ $errors->has('qty')? 'has-error' : '' }}">
                            <label class="control-label col-sm-3">Qty:</label>

                            <div class="col-sm-7">
                                <input type="text" name="qty" class="form-control" value="{{ old('qty') }}" placeholder="Enter product quantity">
                                {!! $errors->has('qty')? '<p class="help-block"> '.$errors->first('qty').' </p>':'' !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('code')? 'has-error' : '' }}">
                            <label class="control-label col-sm-3">Code</label>
                            <div class="col-sm-7">
                                <input type="text" name="code" class="form-control" value="{{ old('code') }}" placeholder="Sales Code">
                                {!! $errors->has('code')? '<p class="help-block"> '.$errors->first('code').' </p>':'' !!}
                            </div>
                        </div>

                            <div class="form-control">
                                <div class="col-sm-7 col-sm-offset-3">
                                    <button type="submit"class="btn btn-primary" required="required"><i class="fa fa-plus-square-o"></i> Submit</button>
                                </div>
                            </div>
                </form>
         </div>
    </div>

</div>


<script type="text/javascript">
      $(".chosen").chosen();
</script>


</body>
</html>
