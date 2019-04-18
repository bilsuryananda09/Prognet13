@extends('layout')
@section('title', 'Tambah Kategori Produk')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Tambah Produk
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
      <form method="post" action="{{ route('products.store') }}">
          <div class="form-group">
              @csrf
              <label for="product_name">Nama Produk:</label>
              <input type="text" class="form-control" name="product_name" required/>
              <label for="price">Harga Produk:</label>
              <input type="number" min="0" class="form-control" name="price" required/>
              <label for="description">Deskripsi:</label>
              <input type="text" class="form-control" name="description" required/>
              <label for="stock">Stok:</label>
              <input type="number" min="0" class="form-control" name="stock" required/>
              <label for="weight">Berat:</label>
              <input type="number" min="0" class="form-control" name="weight" required/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary" href="{{route('products.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection
