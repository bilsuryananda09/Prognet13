@extends('layout')
@section('title', 'List Kategori Produk')
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
    <a class="btn btn-secondary" href="{{route('productcategories.create')}}">Tambah</a>
  </div>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>No</td>
          <td>Nama Kategori</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($productcategories as $productcategory)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$productcategory->category_name}}</td>
            <td><a href="{{ route('productcategories.edit',$productcategory->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('productcategories.destroy', $productcategory->id)}}" method="post">
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