@extends('layouts.adminlayout')

@section('title')
    Tambah Gambar Produk
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
        <h4 class="card-title">Add Product Images</h4>
        <form class="forms-sample" method="post" action="{{ route('productimages.store') }}">
          @csrf
          <div class="form-group">
            <label for="category_name">Product Id</label>
            <input type="text" name="product_id" class="form-control" id="product_id" placeholder="Product Id" required>
          </div>
          <div class="form-group">
            <label for="category_name">Image Name</label>
            <input type="text" name="image_name" class="form-control" id="image_name" placeholder="Image Name" required>
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('productimages.index')}}">Cancel</a>
        </form>
      </div>
    </div>
  </div>  
@endsection