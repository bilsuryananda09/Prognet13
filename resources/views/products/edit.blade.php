@extends('layouts.adminlayout')

@section('title')
    Edit Produk
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
        <h4 class="card-title">Edit Product</h4>
        <form class="forms-sample" method="post" action="{{ route('products.update', $singleProduct->id) }}" enctype="multipart/form-data">
          @method('PUT')
          @csrf
          <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Product Name" value="{{$singleProduct->product_name}}" required>
          </div>
          <div class="form-group">
            <label for="price">Price</label>
            <input type="number" min="0" name="price" class="form-control" id="price" placeholder="Price" value="{{$singleProduct->price}}" required>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" rows="2">{{$singleProduct->description}}</textarea>
          </div>
          <div class="form-group">
            <label for="price">Stock</label>
            <input type="number" min="0" name="stock" class="form-control" id="stock" placeholder="Stock" value="{{$singleProduct->stock}}" required>
          </div>
          <div class="form-group">
            <label for="weight">Weight</label>
            <input type="number" min="0" name="weight" class="form-control" id="weight" placeholder="Weight" value="{{$singleProduct->weight}}" required>
          </div>
          <div class="form-group">
              <label for="file">File Upload</label>
              <div class="input-group col-xs-12">
                <input type="file" name="image[]" class="file-upload-browse btn btn-info" multiple>
              </div>
            </div>
          <div class="form-group">
            <label for="categories">Categories</label>
            @foreach ($productcategories as $category)
              @php
                  $status = 0
              @endphp
              
            <div class="form-check form-check-flat">
                @foreach ($details as $item)
                  @if ($category->id == $item->category_id)
                    <label class="form-check-label">
                      <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input" checked>
                       @php echo $category->category_name @endphp
                    </label>

                    @php
                        $status = 1
                    @endphp
                  @endif
                @endforeach

                @if ($status == 0)
                  <label class="form-check-label">
                    <input type="checkbox" name="categories[]" value="{{ $category->id }}" class="form-check-input">
                    @php echo $category->category_name @endphp
                  </label>
                @endif
            </div>
            @endforeach
          </div>
          <button type="submit" class="btn btn-success mr-2">Submit</button>
          <a class="btn btn-light" href="{{route('products.index')}}">Cancel</a>
        </form>
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                    <td>No</td>
                    <td>Images</td>
                    <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($images as $image)
                            @if ($image->product_id == $singleProduct->id)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td><img style="width:130px; height:130px; border-radius:0%;" src="{{asset($image->image_name)}}"></td>
                                <td>
                                    <form action="{{ route('products.destroyimages', $image->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>  
@endsection