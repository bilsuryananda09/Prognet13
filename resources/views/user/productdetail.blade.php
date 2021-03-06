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
<!-- single -->
<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						@foreach($image as $img)
										<li data-thumb="{{ URL::asset($img->image_name)}}">
											<div class="thumb-image"> <img src="{{ URL::asset($img->image_name)}}" data-imagezoom="true" class="img-responsive" alt=""> </div>
										</li>
						@endforeach
					</ul>
				</div>
				<!-- flexslider -->
					<script defer src="{{ URL::asset('/ElectronicStore/js/jquery.flexslider.js')}}"></script>
					<link rel="stylesheet" href="{{ URL::asset('/ElectronicStore/css/flexslider.css')}}" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="{{ URL::asset('/ElectronicStore/js/imagezoom.js')}}"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3>{{$product->product_name}}</h3>
				<div class="rating1">
					<span class="starRating">
						<input id="rating5" type="radio" name="rating" value="5">
						<label for="rating5">5</label>
						<input id="rating4" type="radio" name="rating" value="4">
						<label for="rating4">4</label>
						<input id="rating3" type="radio" name="rating" value="3" checked>
						<label for="rating3">3</label>
						<input id="rating2" type="radio" name="rating" value="2">
						<label for="rating2">2</label>
						<input id="rating1" type="radio" name="rating" value="1">
						<label for="rating1">1</label>
					</span>
				</div>
				<div class="description">
					<h5><i>Description</i></h5>
					<p>{{$product->description}}</p>
				</div>
					<div class="clearfix"> </div>
				</div>
				<div class="simpleCart_shelfItem">
						<i class="item_price">Rp{{number_format($product->price, 0)}}</i></p>
						<form action="{{route('cart')}}" method="get">
								{{-- <input type="hidden" name="cmd" value="_cart" />   --}}
								<input type="hidden" name="products" value="{{$product->id}} " />
								<input type="hidden" name="w3ls_item" value="{{$product->product_name}}" /> 
								<input type="hidden" name="amount" value="{{$product->price}}"/>   
								<button type="submit" class="w3ls-cart">Add to cart</button>
						</form>
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 
	<div class="additional_info">
		<div class="container">
			<div class="sap_tabs">	
				<div id="horizontalTab1" style="display: block; width: 100%; margin: 0px;">
					<ul>
						<li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>Product Information</span></li>
						<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Reviews</span></li>
					</ul>		
					<div class="tab-1 resp-tab-content additional_info_grid" aria-labelledby="tab_item-0">
						<h3>The Best 3GB RAM Mobile Phone</h3>
						<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore 
							eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident.
							Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut 
							odit aut fugit, sed quia consequuntur magni dolores eos qui 
							ratione voluptatem sequi nesciunt.Ut enim ad minima veniam, quis nostrum 
							exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea 
							commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate 
							velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
							quo voluptas nulla pariatur.</p>
					</div>	

					<div class="tab-2 resp-tab-content additional_info_grid" aria-labelledby="tab_item-1">
						<h4>(2) Reviews</h4>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="/ElectronicStore/images/t1.png" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Laura</a>
									<h5>Oct 06, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="additional_info_sub_grids">
							<div class="col-xs-2 additional_info_sub_grid_left">
								<img src="{{ URL::asset('/ElectronicStore/images/t2.png')}}" alt=" " class="img-responsive" />
							</div>
							<div class="col-xs-10 additional_info_sub_grid_right">
								<div class="additional_info_sub_grid_rightl">
									<a href="single.html">Michael</a>
									<h5>Oct 04, 2016.</h5>
									<p>Quis autem vel eum iure reprehenderit qui in ea voluptate 
										velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat 
										quo voluptas nulla pariatur.</p>
								</div>
								<div class="additional_info_sub_grid_rightr">
									<div class="rating">
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="rating-left">
											<img src="{{ URL::asset('/ElectronicStore/images/star-.png')}}" alt=" " class="img-responsive">
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="review_grids">
							<h5>Add A Review</h5>
							<form action="#" method="post">
								<input type="text" name="Name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
								<input type="email" name="Email" placeholder="Email" required="">
								<input type="text" name="Telephone" value="Telephone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Telephone';}" required="">
								<textarea name="Review" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Add Your Review';}" required="">Add Your Review</textarea>
								<input type="submit" value="Submit" >
							</form>
						</div>
					</div> 			        					            	      
				</div>	
			</div>
			<script src="{{ URL::asset('/ElectronicStore/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
			<script type="text/javascript">
				$(document).ready(function () {
					$('#horizontalTab1').easyResponsiveTabs({
						type: 'default', //Types: default, vertical, accordion           
						width: 'auto', //auto or any width like 600px
						fit: true   // 100% fit in a container
					});
				});
			</script>
		</div>
	</div>
	<!-- //single -->
@endsection