@extends('layout')
@section('title', 'Tambah Kurir')
@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Tambah Kurir
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
      <form method="post" action="{{ route('couriers.store') }}">
          <div class="form-group">
              @csrf
              <label for="courier">Nama Kurir:</label>
              <input type="text" class="form-control" name="courier" required/>
          </div>
          <button type="submit" class="btn btn-primary">Tambah</button>
          <a class="btn btn-secondary" href="{{route('couriers.index')}}">Batal</a>
      </form>
  </div>
</div>
@endsection