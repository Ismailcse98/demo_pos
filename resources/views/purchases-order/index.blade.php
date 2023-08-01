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
                    <h1 class="m-0">Purchase Orders List</h1>
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
                <div class="card">
<div class="card-header">
    <a href="{{route('purchases-order.create')}}" class="btn btn-primary text-end">Add Purchase Order</a>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>SL</th>
            <th>Supplier Name</th>
            <th>Order No</th>
            <th>Order Date</th>
            <th>Receive Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($purchaseOrders as $purchaseOrder)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{optional($purchaseOrder->supplier)->name}}</td>
            <td>{{$purchaseOrder->order_no}}</td>
            <td>{{$purchaseOrder->order_date}}</td>
            <td>{{$purchaseOrder->receive_date??'Not receive yet'}}</td>
            <td>
                <a href="{{route('purchases-order.show',$purchaseOrder->id)}}" class="btn btn-primary">Show</a>

                <a href="{{route('purchases-order.edit',$purchaseOrder->id)}}" class="btn btn-primary">Edit</a>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>SL</th>
            <th>Supplier Name</th>
            <th>Order No</th>
            <th>Order Date</th>
            <th>Receive Date</th>
            <th>Action</th>
        </tr>
    </tfoot>
</table>
</div>

</div>
            </div>
            </div>
        </div>
    </section>
</div>
@endsection


@push('script')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('assets/dist/js/adminlte.min2167.js?v=3.2.0')}}"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
@endpush
