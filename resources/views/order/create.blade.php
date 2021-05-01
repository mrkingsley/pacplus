@extends('layouts.master')

@section('main')


<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-edit"></i> Supply Invoice</h3>
                </div>
                     <div class="box-body">

                        <form class="form-horizontal"  method="POST" action="{{route('order.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class=" col-md-3">
                                    <label class="control-label">Customer Name</label>
                                    <select name="supplier" class="form-control">
                                        <option>Select Customer</option>
                                        @foreach($clients as $client)
                                            <option name="supplier" value="{{$client->customer_name}}">{{$client->customer_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class=" col-md-3">
                                    <label class="control-label">Date</label>
                                    <input name="date"  class="form-control datepicker"  value="<?php echo date('Y-m-d')?>" type="date" placeholder="Enter your email">
                                </div>
                            </div>

                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th scope="col">Product Name</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Product code</th>
                                <th scope="col">salling code</th>
                                <th scope="col">Amount</th>
                                <th scope="col">sallingcost</th>
                                <th scope="col"><a class="addRow"><i class="fa fa-plus"></i></a></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><select name="product_name[]" class="form-control productname" >
                                        <option>Select Product</option>
                                    @foreach($products as $product)
                                            <option name="$product->product" value="{{$product->id}}{{$product->name}}">{{$product->name}}</option>
                                        @endforeach
                                    </select></td>
                                <td><input type="text" name="qty[]" class="form-control qty" ></td>
                                <td><input type="text" name="price[]" class="form-control price" ></td>
                                <td><input type="text" name="dis[]" class="form-control dis" ></td>
                                <td><input type="text" name="amount[]" class="form-control amount" ></td>
                                </td>
                                <td><input type="text" step="any" min="0.01" id="income_amount" class="form-control income_amount" required="required" name="income_amount[]">
                                <td><a   class="btn btn-danger remove"> <i class="fa fa-remove"></i></a></td>
                             </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><b>Total</b></td>
                                <td><b class="total"></b></td>
                                <td></td>
                            </tr>
                            </tfoot>

                        </table>

                            <div >
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                     </form>
                    </div>
                </div>
            </div>
        </div>

@endsection
@push('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
     <script src="{{asset('/')}}js/multifield/jquery.multifield.min.js"></script>




    <script type="text/javascript">
        $(document).ready(function(){



            $('tbody').delegate('.productname', 'change', function () {

                var  tr = $(this).parent().parent();
                tr.find('.qty').focus();

            })

            $('tbody').delegate('.productname', 'change', function () {

                var tr =$(this).parent().parent();
                var id = tr.find('.productname').val();
                var dataId = {'id':id};
                $.ajax({
                    type    : 'GET',
                    url     :'{!! URL::route('findPrice') !!}',

                    dataType: 'json',
                    data: {"_token": $('meta[name="csrf-token"]').attr('content'), 'id':id},
                    success:function (data) {
                        tr.find('.price').val(data.sales_price);
                    }
                });
            });


            $('tbody').delegate('.qty,.price,.dis,.income_amount', 'keyup', function () {

                var tr = $(this).parent().parent();
                var qty = tr.find('.qty').val();
                var price = tr.find('.price').val();
                var dis = tr.find('.dis').val();
                var income_amount = tr.find('.income_amount').val();
                var amount = (dis * price) * (qty);
                tr.find('.amount').val(amount);
                total();
                });
                function total(){
                var total = 0;
                $('.amount').each(function (i,e) {
                    var amount =$(this).val()-0;
                    total += amount;
                })
                $('.total').html(total);
                }

                $('.addRow').on('click', function () {
                addRow();

                });

                function addRow() {
                var addRow = '<tr>\n' +
                    '         <td><select name="product_name[]" class="form-control productname " >\n' +
                    '         <option value="0" selected="true" disabled="true">Select Product</option>\n' +
                '                                        @foreach($products as $product)\n' +
                '                                            <option value="{{$product->id}}">{{$product->name}}</option>\n' +
                '                                        @endforeach\n' +
                    '               </select></td>\n' +
                '                                <td><input type="text" name="qty[]" class="form-control qty" ></td>\n' +
                '                                <td><input type="text" name="price[]" class="form-control price" ></td>\n' +
                '                                <td><input type="text" name="dis[]" class="form-control dis" ></td>\n' +
                '                                <td><input type="text" name="amount[]" class="form-control amount" ></td>\n' +
                '                                <td><input type="text" step="any" min="0.01" id="income_amount" class="form-control income_amount" required="required" name="income_amount[]"></td>\n' +
                '                                <td><a   class="btn btn-danger remove"> <i class="fa fa-remove"></i></a></td>\n' +
                '                             </tr>';
                $('tbody').append(addRow);
                };


                $('.remove').live('click', function () {
                var l =$('tbody tr').length;
                if(l==1){
                    alert('you cant delete last one')
                }else{

                    $(this).parent().parent().remove();

                }

        });
    });


</script>

@endpush

