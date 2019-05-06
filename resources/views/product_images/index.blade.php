@extends('layouts.adminlayout')

@section('title')
    List Gambar Produk
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
          <h4 class="card-title">List Product Image</h4>
          <div class="tile-footer">
              <a class="btn btn-primary btn-fw" href="{{route('productimages.create')}}">Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                    <td>No</td>
                    <td>Id Produk</td>
                    <td>Nama Gambar</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
              <tbody>
                  @foreach($productimages as $productimage)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$productimage->product_id}}</td>
                    <td>{{$productimage->image_name}}</td>
                    <td><a href="{{ route('productimages.edit',$productimage->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                      <form action="{{ route('productimages.destroy', $productimage->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                      </form>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  <table class="table table-striped">
    <thead>
        
    </thead>
    <tbody>
        
    </tbody>
  </table>
<div>
@endsection