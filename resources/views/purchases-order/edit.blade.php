@extends('layouts.app')

@section('purchase_order')
    active
@endsection


@section('content')

@include('inc/sidebar')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Purchase Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchase Order</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Purchase Order</h3>
                        </div>
                        <form action="{{route('purchases-order.update',$orderDetail->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="supplier_id">Supplier Name</label>
                                            <select name="supplier_id" id="supplier_id" class="form-control">
                                                <option value="">Select Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{$supplier->id}}" {{$orderDetail->supplier_id==$supplier->id?'selected':''}}>{{$supplier->name}}</option>
                                                @endforeach
                                            </select>
                                        @error('supplier_id')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_no">Order No</label>
                                            <input type="text" name="order_no" class="form-control" id="order_no" value="{{$orderDetail->order_no}}">
                                        @error('order_no')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_date">Order Date</label>
                                            <input type="date" name="order_date" class="form-control" id="order_date" value="{{$orderDetail->order_date}}">
                                        @error('order_date')
                                          <span class="text-danger">{{$message}}</span>
                                          @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody class="addMoreProduct">
                                            @php
                                            $total = 0;
                                            @endphp
                                            @foreach($orderDetail->orderItems as $orderItem)

                                            @php
                                            $total += $orderItem->qty * $orderItem->unit_price;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <div class="form-group">
                                                        <select name="product_id[]" id="product_id" class="form-control product_id">
                                                            <option value="">Select Product</option>
                                                            @foreach($products as $product)
                                                            <option {{$product->id==$orderItem->purchases_id?'selected':''}} value="{{$product->id}}">{{$product->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    @error('product_id.*')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="qty[]" class="form-control qty" id="qty" value="{{$orderItem->qty}}">
                                                    @error('qty.*')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="number" name="unit_price[]" class="form-control unit_price" id="unit_price" value="{{$orderItem->unit_price}}">
                                                    @error('unit_price.*')
                                                      <span class="text-danger">{{$message}}</span>
                                                      @enderror
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="form-group">
                                                        <input type="text" disabled  class="form-control total" value="{{$orderItem->qty * $orderItem->unit_price}}">
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>
                                                </th>
                                                <th colspan="2">Total Cost</th>
                                                <th id="subtotal">{{$total}}</th>
                                                <th></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>

                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('script');
<script type="text/javascript">
    $(document).ready(function() {
        $('#add').on('click',function(e) {
            e.preventDefault();
            var product = $('.product_id').html();
            var tr = '<tr><td><div class="form-group"> <select name="product_id[]" id="product_id" class="form-control product_id">'
            +product+' </div></td>'+
            '<td><div class="form-group"><input type="number" name="qty[]" class="form-control qty" id="qty" placeholder="Enter qty"></div></td>'+
            '<td><div class="form-group"><input type="number" name="unit_price[]" class="form-control unit_price" id="unit_price" placeholder="Enter price"></div> </td>'+
            '<td><div class="form-group">  <input type="text" disabled  class="form-control total" value="0"></div></td>'+
            '<td><div class="form-group"><button class="btn btn-danger btn-sm remove">X</button></div></td></tr>';
            $('.addMoreProduct').append(tr);
        });

        // Remove Section
        $('.addMoreProduct').delegate('.remove','click',function(e){
            e.preventDefault();
            $(this).parent().parent().parent().remove();
            subTotal();
        });

        $('#fixed').on('click',function(e){
            e.preventDefault();
            alert('Please insert minimum one value');
        });

        //Subtotal
        function subTotal() {
            var subtotal = 0;
            $('.total').each(function(i,e) {
                var amount = $(this).val() - 0;
                subtotal+=amount;
            });
            console.log(subtotal);
            $('#subtotal').html(subtotal);
        }

        //Calculation
        $('.addMoreProduct').delegate('.qty , .unit_price','keyup',function(){
            var tr = $(this).parent().parent().parent();
            var qty = tr.find('.qty').val();
            var unit_price = tr.find('.unit_price').val();
            tr.find('.total').val(qty * unit_price);
            subTotal();
        });
        
    });
</script>
@endpush

