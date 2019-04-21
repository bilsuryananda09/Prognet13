@extends('layout')
@section('title', 'Tambah Kategori Produk Detail')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Tambah Produk Category Detail
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('productcategorydetails.store') }}">
          <div class="form-group">
              @csrf
              <label for="product_id">Nama Produk:</label>
              <select name="product_id" id="product_id" class="form-control">
                <option value="">Nama Produk</option>
                @foreach ($product as $product)
                  <option value="{{ $product->id }}">{{ $product->product_name}}</option>
                @endforeach
              </select>
              <label for="category_id">Nama Category:</label>
              <select name="category_id" id="category_id" class="form-control">
                <option value="">Nama Category</option>
                @foreach ($productcategories as $productcategories)
                  <option value="{{ $productcategories->id }}">{{ $productcategories->category_name}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary" href="{{route('productcategorydetails.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection
