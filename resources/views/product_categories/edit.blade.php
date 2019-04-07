@extends('layout')
@section('title', 'Edit Kategori Produk')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Kategori Produk
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
      <form method="post" action="{{ route('productcategories.update', $productcategory->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="category_name">Nama Kategori:</label>
          <input type="text" class="form-control" name="category_name" value="{{$productcategory->category_name}}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-secondary" href="{{route('productcategories.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection