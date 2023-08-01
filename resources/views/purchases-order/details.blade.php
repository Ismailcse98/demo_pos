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
                    <h1 class="m-0">Details Purchase Order</h1>
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
                    <div class="card card-white">
                        <div class="card-header text-right">
                            <a href="{{ url('/printpriview',$orderDetail->id) }}" class="btn btn-info btn-lg">Print Privew</a>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <tr>
                                            <td><strong>Order No</strong></td>
                                            <td>{{$orderDetail->order_no}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Order Date</strong></td>
                                            <td>{{$orderDetail->order_date}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Receive Date</strong></td>
                                            <td>{{$orderDetail->receive_date??'Not receive yet'}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <tr class="text-center">
                                            <td colspan="2"><strong>Supplier Information</strong></td>
                                        </tr>
                                        <tr>
                                            <td><strong>Name</strong></td>
                                            <td>{{optional($orderDetail->supplier)->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Company Name</strong></td>
                                            <td>{{optional($orderDetail->supplier)->company_name}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Mobile</strong></td>
                                            <td>{{optional($orderDetail->supplier)->phone}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Address</strong></td>
                                            <td>{{optional($orderDetail->supplier)->address}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Unit Price</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                            @foreach($orderDetail->orderItems as $orderItem)
                                            <tr>
                                                <td>{{$orderItem->product->name}}</td>
                                                <td>{{$orderItem->qty}} {{$orderItem->product->unit->name}}</td>
                                                <td>{{$orderItem->unit_price}}</td>
                                                <td>{{$orderItem->qty * $orderItem->unit_price}}</td>
                                    @php 
                                    $total +=$orderItem->qty * $orderItem->unit_price
                                    @endphp
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2"></th>
                                                <th>Total Amount</th>
                                                <th>{{$total}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('script');
<script type="text/javascript">

</script>
@endpush

