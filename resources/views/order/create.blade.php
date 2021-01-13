@extends('layouts.db')

@section('main')


<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Order</h3>
                </div><!-- /.box-header -->
                <div class="box-body">



                <form class="form-horizontal" action="{{route('order.store')}}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="form-group {{ $errors->has('supplier')? 'has-error' : '' }}">
                            <label class="control-label col-sm-3">Client:</label>

                            <div class="col-sm-7">
                                <select class="form-control" name="supplier">
                                <option value="" disabled selected>select customer</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->supplier_name }}">{{$supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                        <div class="form-group {{ $errors->has('product_name')? 'has-error' : '' }}">
                            <label class="control-label col-sm-3">Product:</label>

                            <div class="col-sm-7">
                                <select class="form-control" placeholder="Select Product, " name="product_name">
                                <option value="" disabled selected>select  product</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->name }} {{$product->model}}">{{$product->name }} {{$product->model}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>

                        <div class="form-group {{ $errors->has('category')? 'has-error' : '' }}">
                            <label class="control-label col-sm-3">Category:</label>
                            <div class="col-sm-7">
                                <select class="form-control" id="model" placeholder="Select Product, " name="category">
                                <option value="0" disabled="true" selected="true">select product category</option>
                                            @foreach($products as $product)
                                                <option value="{{$product->category}}">{{$product->category}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            </div>


                            <div class="form-group {{ $errors->has('qty')? 'has-error' : '' }}">
                                <label class="control-label col-sm-3">Qty:</label>

                                <div class="col-sm-7">
                                    <input type="text" name="qty" class="form-control" value="{{ old('qty') }}" placeholder="Enter product quantity">
                                    {!! $errors->has('qty')? '<p class="help-block"> '.$errors->first('qty').' </p>':'' !!}
                                </div>
                            </div>

                        <div class="form-group {{ $errors->has('price')? 'has-error' : '' }}">
                            <label class="control-label col-sm-3">Suppling price</label>
                            <div class="col-sm-7">
                                <input type="text" name="price" class="form-control" value="{{ old('price') }}" placeholder="enter price">
                                {!! $errors->has('price')? '<p class="help-block"> '.$errors->first('u-price').' </p>':'' !!}
                            </div>
                        </div>

                    <div class="form-group {{ $errors->has('product_code')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Product Code</label>
                        <div class="col-sm-7">
                            <input type="text" name="product_code" class="form-control" value="{{ old('code') }}" placeholder="product Code"></input>
                            {!! $errors->has('product_code')? '<p class="help-block"> '.$errors->first('product_code').' </p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('code')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Code</label>
                        <div class="col-sm-7">
                            <input type="text" name="code" class="form-control" value="{{ old('code') }}" placeholder="Sales Code"></input>
                            {!! $errors->has('code')? '<p class="help-block"> '.$errors->first('code').' </p>':'' !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('status')? 'has-error' : '' }}">
                        <label class="control-label col-sm-3">Status:</label>

                        <div class="col-sm-7">
                            <select class="form-control" name="status">
                            <option value="" disabled selected>Status</option>
                                            <option value="process">process</option>
                                            <option value="supply">supply</option>
                                    </select>
                            </div>
                        </div>

                    <div class="form-group">
                        <div class="col-sm-7 col-sm-offset-3">
                            <button type="submit"class="btn btn-primary" required="required"><i class="fa fa-plus-square-o"></i> Submit</button>
                        </div>
                    </div>

                    </form>

                </div><!-- /.box-body -->


            </div><!-- /.box -->



        </div> <!-- /.col -->
    </div>
    </div>
    <!-- /.row -->



</section><!-- /.content -->
<script
src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function(){

     $(document).on('change','.productcategory',function(){
         var cat_id=$(this).val();

         var div=$(this).parent();

         var op=" ";


        //  var product_id=$(this).val();

         $.ajax({
             type:'get',
             url:'{!!URL::to('findProductCode')!!}',
             data:{'id':order_id},
             success:function(data){

                 for(var i-0;i<data.length;i++){
                 op+='<option value="0" selected disabled>chose product</option>';
             }

             div.find('.ProductName').html(" ");
             div.find('.ProductName').append(op);
             }

             error:function(){

             },
         });

     });
 });
</script>


@endsection
