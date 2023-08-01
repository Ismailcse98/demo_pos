@extends('layouts.app')

@section('purchase')
    active
@endsection


@section('content')

@include('inc/sidebar')

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Purchases</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Purchases</li>
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
                            <h3 class="card-title">Purchases Edit</h3>
                        </div>
                        <form action="{{route('purchases.update',$purchase)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{$purchase->name}}">
                                @error('name')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="unit_id">Unit</label>
                                    <select name="unit_id" id="unit_id" class="form-control">
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                        <option value="{{$unit->id}}" {{$unit->id == $purchase->unit_id?'selected':''}}>{{$unit->name}}</option>
                                        @endforeach
                                    </select>
                                @error('unit_id')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input type="text" name="code" class="form-control" id="code" value="{{$purchase->code}}">
                                @error('code')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input type="text" name="description" class="form-control" id="description" value="{{$purchase->description}}">
                                @error('address')
                                  <span class="text-danger">{{$message}}</span>
                                  @enderror
                                </div>

                                <div class="form-group">
                                <div class="form-check">
                                    <input type="radio" value="1" name="status" class="form-check-input" id="status1" {{$purchase->status==1?'checked':''}}>
                                    <label class="form-check-label" for="status1">Active</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="0" name="status" class="form-check-input" id="status2" {{$purchase->status==0?'checked':''}}>
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