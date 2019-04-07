@extends('layout')
@section('title', 'Edit Produk')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Produk
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
      <form method="post" action="{{ route('products.update', $product->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="product_name">Nama Produk:</label>
          <input type="text" class="form-control" name="product_name" value="{{$product->product_name}}" required/>
          <label for="price">Harga Produk:</label>
          <input type="number" min="0" class="form-control" name="price" value="{{$product->price}}" required/>
          <label for="description">Deskripsi:</label>
          <input type="text" class="form-control" name="description" value="{{$product->description}}" required/>
          <label for="product_rate">Rate:</label>
          <input type="number" min="0" class="form-control" name="product_rate" value="{{$product->product_rate}}" required/>
          <label for="stock">Stok:</label>
          <input type="number" min="0" class="form-control" name="stock" value="{{$product->stock}}" required/>
          <label for="weight">Berat:</label>
          <input type="number" min="0" class="form-control" name="weight" value="{{$product->weight}}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-secondary" href="{{route('products.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection