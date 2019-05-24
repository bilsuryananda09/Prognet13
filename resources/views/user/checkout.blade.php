@extends('layouts.userlayout')

@section('banner')
    <!-- banner -->
    <div class="banner banner2">
        <div class="container">
            <h2>Top Selling <span>Gadgets</span> Flat <i>25% Discount</i></h2> 
        </div>
    </div> 
    <!-- //banner --> 
@endsection

@section('breadcrumbs')
    <div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="/"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Products</li>
			</ul>
		</div>
	</div>
@endsection

@section('content')
  <div class="row">
  <div class="site-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
          </div>
        </div>
          <div class="col-md-6 mb-5 mb-md-0">
            <h2 class="h3 mb-3 text-black">Pengiriman</h2>
            <div class="p-3 p-lg-5 border">
              <div class="form-group">
                <label for="c_country" class="text-black">Daerah <span class="text-danger">*</span></label>
                <select id="c_country" class="form-control">
                  <option value="1">Pilih Daerah</option>    
                  <option value="2">Jakarta</option>    
                  <option value="3">Surabaya</option>    
                  <option value="4">Bali</option>    
                  <option value="5">Sumatra</option>    
                  <option value="6">Makasar</option>        
                </select>
              </div>
              <div class="form-group row">
                <div class="col-md-12">
                  <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                  <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Alamat Lengkap"></textarea>                </div>
              </div>
              <div class="form-group">
                <label for="courier" class="text-black">Kurir <span class="text-danger">*</span></label>
                <select id="courier" class="form-control">
                  <option value="1">Courier</option>    
                  <option value="2">JNE</option>    
                  <option value="3">J&T</option>
                  <option value="4">SiCepat</option>          
                </select>
              </div>
            </div>
          </div> --}}
          <div class="col-md-12">
            
            <div class="row mb-5">
              <div class="col-md-12">
                <h2 class="h3 mb-3 text-black">Your Order</h2>
                <div class="p-3 p-lg-5 border">
                  <table class="table site-block-order-table mb-5">
                    <thead>
                      <th>Product</th>
                      <th>Total</th>
                    </thead>
                    <tbody>
                      @foreach ($products as $item)
                          @foreach ($cart as $carts)
                            @if($item->id == $carts->product_id)
                              <tr>
                                <td>{{$item->product_name}}<strong class="mx-2">x</strong>{{$carts->qty}} </td>
                                <td>Rp{{number_format($item->price * $carts->qty, 0)}}</td>
                              </tr>
                              <tr>
                            @endif
                          @endforeach
                      @endforeach
                        <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                        <td class="text-black">$350.00</td>
                      </tr>
                      <tr>
                        <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                        <td class="text-black font-weight-bold"><strong>$350.00</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <div class="form-group">
                    <button class="btn btn-primary btn-lg py-3 btn-block" onclick="window.location='thankyou.html'">Place Order</button>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>
@endsection
