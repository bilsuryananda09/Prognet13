@extends('layouts.adminlayout')

@section('title')
    List Kategori Produk
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
          <h4 class="card-title">List Product Category</h4>
          <div class="tile-footer">
              <a class="btn btn-primary btn-fw" href="{{route('productcategories.create')}}">Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                    <td>No</td>
                    <td>Nama Kategori</td>
                    <td colspan="2">Action</td>
                </tr>
            </thead>
              <tbody>
                  @foreach($productcategories as $productcategory)
                  {{-- @if (!$productcategory->status == 0) --}}
                  <tr>
                      <td>{{$loop->iteration}}</td>
                      {{-- <td>{{$productcategory->category_name}}</td> --}}
                      <td>@php echo $productcategory->category_name @endphp</td>
                      <td><a href="{{ route('productcategories.edit',$productcategory->id)}}" class="btn btn-primary">Edit</a></td>
                      <td>
                        <form action="{{ route('productcategories.destroy', $productcategory->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                      </td>
                    </tr>
                  {{-- @endif --}}
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