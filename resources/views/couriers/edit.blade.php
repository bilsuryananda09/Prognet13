@extends('layouts.adminlayout')

@section('title')
    Edit Kurir
@endsection
@section('content')
<div class="row">
  
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
    </ul>
  </div><br />
  @endif

<div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Courier</h4>
        <form class="forms-sample" method="post" action="{{ route('couriers.update', $courier->id) }}">
          @method('PATCH')
          @csrf
          <div class="form-group">
            <label for="courier">Courier Name</label>
            <input type="text" name="courier" class="form-control" id="courier" value="{{$courier->courier}}" required placeholder="Courier Name" required>
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('couriers.index')}}">Cancel</a>
        </form>
      </div>
    </div>
  </div>  
@endsection