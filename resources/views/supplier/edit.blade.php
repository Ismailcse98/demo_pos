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
                    <h1 class="m-0">Suppliers</h1>
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
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Supplier Edit</h3>
                        </div>
                        <form action="{{route('suppliers.update',$supplier)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$supplier->name}}">
                                @error('name')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" name="company_name" class="form-control" id="company_name" value="{{$supplier->company_name}}">
                                @error('company_name')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone" value="{{$supplier->phone}}">
                                @error('phone')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" name="address" class="form-control" id="address" value="{{$supplier->address}}">
                                @error('address')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="opening_due">Opening Due</label>
                                    <input type="text" name="opening_due" class="form-control" id="opening_due" value="{{$supplier->opening_due}}">
                                @error('opening_due')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                <div class="form-check">
                                    <input type="radio" value="1" name="status" class="form-check-input" id="status1" {{$supplier->status==1?'checked':''}}>
                                    <label class="form-check-label" for="status1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="0" name="status" class="form-check-input" id="status2" {{$supplier->status==0?'checked':''}}>
                                    <label class="form-check-label" for="status2">Inactive</label>
                                </div>
                                @error('status')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
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