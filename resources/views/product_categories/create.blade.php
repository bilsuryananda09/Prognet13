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
    Tambah Kategori Produk
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
      <form method="post" action="{{ route('productcategories.store') }}">
          <div class="form-group">
              @csrf
              <label for="category_name">Nama Kategori:</label>
              <input type="text" class="form-control" name="category_name" required/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary" href="{{route('productcategories.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection