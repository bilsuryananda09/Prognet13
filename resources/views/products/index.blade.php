@extends('layout')
@section('title', 'List Produk')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <div class="tile-footer">
    <a class="btn btn-secondary" href="{{route('products.create')}}">Tambah</a>
  </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No</td>
          <td>Nama Produk</td>
          <td>Harga Produk</td>
          <td>Deskripsi</td>
          <td>Rate</td>
          <td>Stok</td>
          <td>Berat</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$product->product_name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->description}}</td>
            <td>{{$product->product_rate}}</td>
            <td>{{$product->stock}}</td>
            <td>{{$product->weight}}</td>
            <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('products.destroy', $product->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection