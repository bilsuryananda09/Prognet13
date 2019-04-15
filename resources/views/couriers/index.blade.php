@extends('layouts.adminlayout')

@section('title')
    List Kurir
@endsection
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
    <a class="btn btn-secondary" href="{{route('couriers.create')}}">Tambah</a>
  </div>
  <table class="table table-striped">
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
<div>
@endsection