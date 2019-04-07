@extends('layout')
@section('title', 'Edit Kurir')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Edit Kurir
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
      <form method="post" action="{{ route('couriers.update', $courier->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="courier">Nama Kurir:</label>
          <input type="text" class="form-control" name="courier" value="{{$courier->courier}}" required/>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="btn btn-secondary" href="{{route('couriers.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection