@extends('layouts.adminlayout')

@section('title')
    Tambah Produk
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
        <h4 class="card-title">Add Product</h4>
        <form class="forms-sample" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" required>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0" name="price" class="form-control" id="price" placeholder="Price" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="2"></textarea>
          </div>
          <div class="form-group">
            <label for="price">Stock</label>
            <input type="number" min="0" name="stock" class="form-control" id="stock" placeholder="Stock" required>
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" min="0" name="weight" class="form-control" id="weight" placeholder="Weight" required>
          </div>
          <div class="form-group">
            <label for="file">File Upload</label>
            <div class="input-group col-xs-12">
              <input type="file" name="image[]" class="file-upload-browse btn btn-info" multiple>
            </div>
          </div>
          <div class="form-group">
            <label for="categories">Categories</label>
            @foreach ($productcategories as $category)
            <div class="form-check form-check-flat">
                <label class="form-check-label">
                  <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input"> {{ $category->category_name}}
                </label>
            </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('products.index')}}">Cancel</a>
        </form>
      </div>
    </div>
  </div>  
@endsection