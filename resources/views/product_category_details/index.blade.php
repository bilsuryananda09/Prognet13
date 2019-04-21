@extends('layouts.adminlayout')

@section('title')
    List Kategori Produk Detail
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
          <h4 class="card-title">List Product Category Detail</h4>
          <div class="tile-footer">
              <a class="btn btn-primary btn-fw" href="{{route('productcategorydetails.create')}}">Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                    <td>No</td>
                    <td>Product</td>
                    <td>Category</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
              <tbody>
                  @foreach($detail as $detail)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$detail->product_name}}</td>
                    <td>{{$detail->category_name}}</td>
                    <td><a href="{{ route('productcategories.edit',$detail->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                      <form action="{{ route('productcategories.destroy', $detail->id)}}" method="post">
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