@extends('layouts.adminlayout')

@section('title')
    Tambah Discount
@endsection
@section('content')
<div class="row">
  
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div><br />
  @endif

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Discount</h4>
        <form class="forms-sample" method="post" action="{{ route('discount.store') }}">
          @csrf
          <div class="form-group">
            <label for="discount">Nama Product</label>
            <input type="text" name="discount" class="form-control" id="discount" placeholder="Product Name" required>
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('couriers.index')}}">Cancel</a>
        </form>
      </div>
    </div>
  </div>  
@endsection