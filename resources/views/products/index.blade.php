@extends('layouts.adminlayout')

@section('title')
    List Produk
@endsection
@section('content')
<div class="row">
  
    @if(session()->get('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}  
      </div><br />
    @endif
    
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">List Product</h4>
        <div class="tile-footer">
            <a class="btn btn-primary btn-fw" href="{{route('products.create')}}">Tambah</a>
        </div>
        <br>
        <div class="table-responsive">
          <table class="table table-hover">
            <thead>
              <tr>
                <td>No</td>
                <td>Nama Produk</td>
                <td>Harga Produk</td>
                <td>Stok</td>
                <td colspan="3">Action</td>
              </tr>
          </thead>
            <tbody>
                @foreach($products as $product)
                @if (!$product->status == 0)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>@php echo $product->product_name @endphp</td>
                    <td>Rp{{number_format($product->price, 0)}}</td>
                    <td>{{$product->stock}} item</td>
                    <td><a href="{{ route('products.show',$product->id)}}" class="btn btn-info">Detail</a></td>
                    <td><a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection