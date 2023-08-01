<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Invoice print</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="../../../code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/jqvmap/jqvmap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min2167.css?v=3.2.0')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/summernote/summernote-bs4.min.css')}}">

</head>
<body>

    <div class="content-header">
        <div class="container">
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
                    <div class="card card-white">
                        <div class="card-header text-right">
                            <a href="{{ url('/printpriview',$orderDetail->id) }}" class="btn btn-info btn-lg btnprn">Print</a>
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

<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('assets/plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('assets/plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('assets/plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte2167.js?v=3.2.0')}}"></script>
<script src="{{asset('assets/dist/js/demo.js')}}"></script>
<script src="{{asset('assets/dist/js/pages/dashboard.js')}}"></script>
<script src="http://www.position-absolute.com/creation/print/jquery.printPage.js"></script>

<script type="text/javascript">
$(document).ready(function(){
$('.btnprn').printPage();
});
</script>

</body>
</html>

