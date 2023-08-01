@extends('layouts.app')

@section('supplier')
    active
@endsection

@section('content')

@include('inc/sidebar')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Suppliers List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Supplier</li>
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
    <a href="{{route('suppliers.create')}}" class="btn btn-primary text-end">Add Supplier</a>
</div>

<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Opening Due</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($suppliers as $supplier)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$supplier->name}}</td>
            <td>{{$supplier->company_name}}</td>
            <td>{{$supplier->address}}</td>
            <td>{{$supplier->phone}}</td>
            <td>{{$supplier->opening_due}}</td>
            <td>
                @if($supplier->status==1)
                    <button class="btn btn-info btn-sm">Active</button>
                @else
                    <button class="btn btn-danger btn-sm">Inactive</button>
                @endif
            </td>
            <td>

                <a href="{{route('suppliers.edit',$supplier)}}" class="btn btn-primary">Edit</a>

            <form action="{{ route('suppliers.destroy',$supplier) }}" method="POST" class="d-inline-block" onclick="return confirm('Are You sure??')">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Opening Due</th>
            <th>Status</th>
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
