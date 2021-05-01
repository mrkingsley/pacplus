<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Prince Ajah Communication</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="icon" type="image/png" href="images/icons/avatar-02.jpg"/>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
</head>
<body class="bg-dark">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="card">
                    <div class="card-header with-border">
                        <h3 class="card-title font-weight-bold">Supply</h3><div class="col-sm-2"><a href="{{ url('order')}}"
                            class="btn  btn-sm float-left btn-block">Back</a></div>
                    </div><!-- /.box-header -->
                    <div class="card-body">
                        @if(Session::has('error'))
                            @include('layouts.flash-error',[ 'message'=> Session('error') ])
                        @endif
                        <form class="form-horizontal" action="{{route('order.store')}}" enctype="multipart/form-data" method="post">
                                @csrf

                            <div class="form-group">
                                <div class="form-control">
                                <label for="model">CUSTOMER:</label>
                                <select class="chosen" style="width:500px;" placeholder="Select Product, " name="supplier">
                                        <option value="" disabled selected>select customer</option>
                                        @foreach($suppliers as $supplier)
                                        <option value="{{$supplier->supplier_name }}">{{$supplier->supplier_name }}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-control">
                                <label for="model">PRODUCT : </label>
                                <select class="chosen" style="width:500px;" placeholder="Select Product, " name="product_name">
                                        <option value="" disabled selected>select  product</option>
                                @foreach($products as $product)
                                    <option value="{{$product->name }} {{$product->model}}">{{$product->name }} {{$product->model}}</option>
                                @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-control">
                                <div class="col-sm-7">
                                <label for="model">CATEGORY:</label>
                                <select class="chosen" style="width:500px;" placeholder="Select Product, " name="category">
                                        <option value="" disabled selected>select  category</option>
                                        @foreach($products as $product)
                                        <option value="{{$product->category}}">{{$product->category}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>

                            <div class="form-control">
                            <div class="col-sm-7">
                                <label for="model">QTY:</label>
                                    <input type="text" name="qty" class="form-control" value="" placeholder="Enter product quantity">
                                </div>
                            </div>

                            <div class="form-control">
                            <div class="col-sm-7">
                                <label for="model">SUPPLY PRICE:</label>
                                    <input type="text" name="price" class="form-control" value="" placeholder="Enter product price">
                                </div>
                            </div>

                            <div class="form-control">
                            <div class="col-sm-7">
                                <label for="product_code">CODE:</label>
                                    <input type="text" name="product_code" class="form-control" value="" placeholder="Enter product Code">
                                </div>
                            </div>
                            <div class="form-control">
                            <div class="col-sm-7">
                                <label for="code">SUPPLY CODE:</label>
                                    <input type="text" name="code" class="form-control" value="" placeholder="Enter supply code">
                                </div>
                            </div>

                            <div class="form-control">
                            <div class="col-sm-7">
                                <label for="code">STATUS:</label>
                                <select class="form-control"  name="status">
                                <option value="" disabled selected placeholder="supply status"></option>
                                                <option value="process">process</option>
                                                <option value="supply">supply</option>
                                        </select>
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
