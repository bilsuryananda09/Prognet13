@extends('layouts.adminlayout')

@section('title')
    List Discount
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
          <h4 class="card-title">List Discount</h4>
          <div class="tile-footer">
              <a class="btn btn-primary btn-fw" href="{{route('discount.create')}}">Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                  <tr>
                      <td>No</td>
                      <td>Nama Product</td>
                      <td>Persentase</td>
                      <td>Tanggal Mulai</td>
                      <td>Tanggal Berakhir</td>
                      <td colspan="2">Action</td>
                  </tr>
            </thead>
              <tbody>
                @foreach($discount as $index)
                  @foreach ($product as $item)
                    @if ($index->id_product == $item->id)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$index->percentage}}</td>
                        <td>{{$index->start}}</td>
                        <td>{{$index->end}}</td>
                        <td><a href="{{ route('discount.edit', $index->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                          <form action="{{ route('discount.destroy', $index->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                          </form>
                        </td>
                      </tr>
                    @endif
                  @endforeach  
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
<div>
@endsection