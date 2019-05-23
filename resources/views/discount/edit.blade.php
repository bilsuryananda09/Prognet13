@extends('layouts.adminlayout')

@section('title')
    Tambah Discount
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
        <h4 class="card-title">Discount</h4>
        <form class="forms-sample" method="post" action="{{ route('discount.store') }}">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlSelect2">Nama Product</label>
            <select class="form-control" id="exampleFormControlSelect2" name="product">
              <option value="{{$detail->id}}">{{$detail->product_name}}</option>
              @foreach ($product as $item)
                @if (!$item->status == 0)  
                  <option value="{{$item->id}}">{{$item->product_name}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="discount">Persentase Discount</label>
            <input type="text" name="percentage" class="form-control" id="discount" placeholder="Persentase" value="{{$discount->percentage}}" required>
          </div>
          <div class="form-group">
            <label for="discount">Start</label>
                <input type="date" id="discount" class="form-control" name="start" required="required" value="{{$discount->start}}">
          </div>
          <div class="form-group">
            <label for="discount">End</label>
                <input type="date" id="discount" class="form-control" name="end" required="required" value="{{$discount->end}}">
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('couriers.index')}}">Cancel</a>
        </form>
      </div>
    </div>
  </div>  
@endsection