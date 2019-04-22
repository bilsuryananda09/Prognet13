@extends('layouts.adminlayout')

@section('title')
    Edit Kategori Produk
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
        <h4 class="card-title">Edit Product Categories</h4>
        <form class="forms-sample" method="post" action="{{ route('productcategories.update', $productcategory->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <label for="category_name">Category Name</label>
            <input type="text" name="category_name" class="form-control" id="category_name" value="{{$productcategory->category_name}}" placeholder="Category Name" required>
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('productcategories.index')}}">Cancel</a>
        </form>
      </div>
    </div>
  </div>  
@endsection