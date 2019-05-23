@extends('layouts.adminlayout')

@section('title')
    Produk Detail
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
        <h4 class="card-title">Product Details</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                        <td>No</td>
                        <td>Images</td>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($images as $image)
                                @if ($image->product_id == $singleProduct->id)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td><img style="width:130px; height:130px; border-radius:0%;" src="{{asset($image->image_name)}}"></td>
                                </tr>
                                @endif
                            @endforeach
                    </tbody>
                </table>
            </div>
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" value="{{$singleProduct->product_name}}" disabled>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0" name="price" class="form-control" id="price" placeholder="Price" value="{{$singleProduct->price}}" disabled>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="2" disabled>{{$singleProduct->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Stock</label>
            <input type="number" min="0" name="stock" class="form-control" id="stock" placeholder="Stock" value="{{$singleProduct->stock}}" disabled>
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" min="0" name="weight" class="form-control" id="weight" placeholder="Weight" value="{{$singleProduct->weight}}" disabled>
          </div>
          <div class="form-group">
            <label for="categories">Categories</label>
            @foreach ($productcategories as $category)
              
            <div class="form-check form-check-flat">
                @foreach ($details as $item)
                  @if ($category->id == $item->category_id)
                    <label class="form-check-label">
                      <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input" disabled checked>
                       @php echo $category->category_name @endphp
                    </label>
                  @endif
                @endforeach
            </div>
            @endforeach
          </div>
        <a class="btn btn-light" href="{{route('products.index')}}">Cancel</a>
      </div>
    </div>
  </div>  
@endsection