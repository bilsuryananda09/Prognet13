@extends('layouts.adminlayout')

@section('title')
    List Courier
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
          <h4 class="card-title">List Courier</h4>
          <div class="tile-footer">
              <a class="btn btn-primary btn-fw" href="{{route('couriers.create')}}">Tambah</a>
          </div>
          <br>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                  <tr>
                      <td>No</td>
                      <td>Nama Kurir</td>
                      <td colspan="2">Action</td>
                  </tr>
            </thead>
              <tbody>
                  @foreach($couriers as $courier)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$courier->courier}}</td>
                    <td><a href="{{ route('couriers.edit',$courier->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                      <form action="{{ route('couriers.destroy', $courier->id)}}" method="post">
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