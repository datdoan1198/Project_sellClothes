@extends('fondend.layout.master')

@section('information_product')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->

		<div class="row">
			<!--  Product Details -->
			<div class="product product-details clearfix">
				<div class="col-md-6">

					<div id="product-main-view">
						@foreach ($product->images as $image)
						<div class="product-view">
							<img style="height: 550px" src="{{ asset('storage/products/'.$image->path) }}" alt="">
						</div>
						@endforeach

					</div>

					<div id="product-view">
						@foreach ($product->images as $image)
						<div class="product-view">
							<img style="height: 150px" src="{{ asset('storage/products/'.$image->path) }}" alt="">
						</div>
						@endforeach

					</div>
				</div>
				<div class="col-md-6">
					<div class="product-body">
						<div class="product-label">
							<span>New</span>
							<span class="sale">-20%</span>
						</div>
						<h2 class="product-name">{{ $product->name }}</h2>
						<h3 class="product-price">{{ number_format($product->sale_price) }} VNĐ <del class="product-old-price">{{ number_format($product->origin_price) }} VNĐ</del></h3>
						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<a href="#">3 Review(s) / Add Review</a>
						</div>
						<p><strong>Availability:</strong> In Stock</p>
						<p><strong>Brand:</strong> E-SHOP</p>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure
						dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
						<div class="product-options">
							<form id="checkout-form" class="clearfix" action="{{ route('cart.add',['id'=>$product->id]) }}" method="GET" >
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-4 product-btns">
										<div class="qty-input">
											<span class="text-uppercase">Size:</span>
											<select class="input" name="size" id="">
												@foreach ($product->size as $size)
												<option  value="{{ $size->id }}">{{ $size->size }}</option>	
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-md-4 product-btns">
										<div class="qty-input">
											<span class="text-uppercase">QTY: </span>
											<input class="input" type="number" value="1" name="qty">
										</div>
									</div>	


									<div class="pull-right">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
									</div>
									
								</div>
								<br>

								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>

							</form>
							<div class="row" style="display: @if ($check == 1)
							@if (Auth::user()->role == 1)
							{{ 'block'  }}
							@else
							{{ 'none' }}
							@endif

							@else
							{{ 'none'  }}
							@endif ">
							<div class="col-md-10">

							</div>
							<div class="col-md-1">
								<form action="{{ route('product.check',['product' => $product->id]) }}" method="POST">
									{{ csrf_field() }}
									@method('put')
									<button  class="main-btn icon-btn">
										<i class="fa fa-check"></i>
									</button>
								</form>
							</div>
							<div class="col-md-1">
								<form action="{{ route('product.destroy',['product'=>$product['id']]) }}" method="post">
									@method('delete')
									{{ csrf_field() }}
									<button class="main-btn icon-btn" ><i class="fa fa-trash"></i></button>

								</form>
							</div>

						</div>

					</div>




				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="product-tab">
				<ul class="tab-nav">
					<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
					<li><a data-toggle="tab" href="#tab2">Details</a></li>
					<li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
				</ul>
				<div class="tab-content">
					<div id="tab1" class="tab-pane fade in active">
						{!! htmlspecialchars_decode($product->content) !!}
					</div>

					<div id="tab2" class="tab-pane fade in">
						<p>Thương Hiệu : {{ $product->trademark['name'] }}</p>
						@foreach ($information_product as $element)
						<p> {{ $element->key }} : {{ $element->value }} </p>
						@endforeach
					</div>

					<div id="tab3" class="tab-pane fade in">

						<div class="row">
							<div class="col-md-6">
								<div class="product-reviews">
									@foreach ($review_products as $review_product)
									<div class="single-review">
										<div class="review-heading">
											<div><a href="#"><i class="fa fa-user-o"></i> {{ $review_product->name }}</a></div>
											<div><a href="#"><i class="fa fa-clock-o"></i> {{ $review_product->created_at }}</a></div>
											<div class="review-rating pull-right">
												@for ($i = 0; $i < $review_product->star  ; $i++)
												<i class="fa fa-star"></i>
												@endfor	
											</div>
										</div>
										<div class="review-body">
											<p>{{ $review_product->content }}</p>
										</div>
									</div>
									@endforeach



									<ul class="reviews-pages">
										<li class="active">1</li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
									</ul>
								</div>
							</div>
						
							
							<div class="col-md-6">
								<h4 class="text-uppercase">Write Your Review</h4>
								<p>Your email address will not be published.</p>
								@if (Auth::user() != null)
								
								<form action="{{ route('review.store') }}" method="post" class="review-form">
									@csrf
									<div class="form-group">
										<input class="input" type="text" name="name" value="{{ Auth::user()->name }}" readonly  />
									</div>
									@error('name')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
									@enderror
									<div class="form-group">
										<input class="input" type="hidden" name="product_id" value="{{ $product->id }}" placeholder="Email Address" />
									</div>

									<div class="form-group">
										<input class="input" type="hidden" name="user_id" value="{{ Auth::user()->id }}" placeholder="Email Address" />
									</div>

									<div class="form-group">
										<textarea name="content" class="input" placeholder="Your review"></textarea>
									</div>
									@error('content')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
									@enderror
									<div class="form-group">
										<div class="input-rating">
											<strong class="text-uppercase">Your Rating: </strong>
											<div class="stars">
												<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
												<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
												<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
												<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
												<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
											</div>
										</div>
									</div>
									@error('rating')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
									@enderror
									<button class="primary-btn">Submit</button>
								</form>
						
								
								

								@else
								<form action="{{ route('review.store') }}" method="post" class="review-form">
									@csrf
									<div class="form-group">
										<input class="input" type="text" name="name" placeholder="Your Name" />
									</div>
									@error('name')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
									@enderror
									<div class="form-group">
										<input class="input" type="hidden" name="product_id" value="{{ $product->id }}" />
									</div>
									<div class="form-group">
										<input class="input" type="hidden" name="user_id" value="0" placeholder="Email Address" />
									</div>
									<div class="form-group">
										<textarea name="content" class="input" placeholder="Your review"></textarea>
									</div>

									@error('content')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
									@enderror
									<div class="form-group">
										<div class="input-rating">
											<strong class="text-uppercase">Your Rating: </strong>
											<div class="stars">
												<input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
												<input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
												<input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
												<input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
												<input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
											</div>
										</div>
									</div>
									@error('rating')
									<div class="alert alert-danger">
										{{ $message }}
									</div>
									@enderror
									<button class="primary-btn">Submit</button>
								</form>
								@endif


							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /Product Details -->
</div>
<!-- /row -->
</div>
<!-- /container -->
</div>
<!-- /section -->
@endsection

@section('aaa')
<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h2 class="title">Picked For You</h2>
				</div>
			</div>
			<!-- section title -->

			<!-- Product Single -->
			@foreach ($product_categories as $product_category)
			@if ( $product_category->id != $product->id)
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="product product-single">
					<div class="product-thumb">
						<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
						<img src="{{ asset('storage/products/'.$product_category->avatar) }}" alt="">
					</div>
					<div class="product-body">
						<h3 class="product-price">{{ number_format($product_category->sale_price) }}</h3>
						<div class="product-rating">
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star-o empty"></i>
						</div>
						<h2 class="product-name"><a href="#">{{ $product_category->name}} </a></h2>
						<div class="product-btns">
							<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
							<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
							<a href="{{ route('detail_product',['id'=>$product_category['id']]) }}">
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</a>
						</div>
					</div>
				</div>
			</div>
			@endif
			@endforeach

			<!-- /Product Single -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->
@endsection