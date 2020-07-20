@extends('fondend.layout.master')

@section('home')
	<div id="home">
			<!-- container -->
			<div class="container">
				<!-- home wrap -->
				<div class="home-wrap">
					<!-- home slick -->
					<div id="home-slick">
						<!-- banner -->
						<div class="banner banner-1">
							<img src="fondend/img/banner01.jpg" alt="">
							<div class="banner-caption text-center">
								<h1>Bags sale</h1>
								<h3 class="white-color font-weak">Up to 50% Discount</h3>
								<button class="primary-btn">Shop Now</button>
							</div>
						</div>
						<!-- /banner -->

						<!-- banner -->
						<div class="banner banner-1">
							<img src="fondend/img/banner02.jpg" alt="">
							<div class="banner-caption">
								<h1 class="primary-color">HOT DEAL<br><span class="white-color font-weak">Up to 50% OFF</span></h1>
								<button class="primary-btn">Shop Now</button>
							</div>
						</div>
						<!-- /banner -->

						<!-- banner -->
						<div class="banner banner-1">
							<img src="fondend/img/banner03.jpg" alt="">
							<div class="banner-caption">
								<h1 class="white-color">New Product <span>Collection</span></h1>
								<button class="primary-btn">Shop Now</button>
							</div>
						</div>
						<!-- /banner -->
					</div>
					<!-- /home slick -->
				</div>
				<!-- /home wrap -->
			</div>
			<!-- /container -->
	</div>
@endsection

@section('collection_new')
<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						
						<div class="row">
							<div class="col-md-10">
								<h2 class="title">Bộ Sưu Tập Mới</h2>
							</div>
							<div class="col-md-2">
								<a href="{{ route('all_collection') }}">xem tất cả bộ sưu tập ->></a>
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach ($collections as $collection)
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<a href="{{ route('fontend.collection',['id' => $collection->id]) }}">
									<button class="main-btn quick-view"> {{ $collection->name }} </button>
								</a>
								
								<img style="height: 250px;" src="{{ asset('storage/collections/'.$collection->avatar) }}" alt="">
							</div>
							<div class="product-body">
								
								<h2 class="product-name"><a href="#"></a></h2>
								
							</div>
						</div>
					</div>
				@endforeach
				
				<!-- /Product Single -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>	
	
@endsection

@section('product_new')
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section-title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản Phẩm Mới</h2>
						<div class="pull-right">
							<div class="product-slick-dots-1 custom-dots"></div>
						</div>
					</div>
				</div>
				<!-- /section-title -->

				<!-- banner -->
				{{-- <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="banner banner-2">
						<img src="fondend/img/banner14.jpg" alt="">
						<div class="banner-caption">
							<h2 class="white-color">NEW<br>COLLECTION</h2>
							<button class="primary-btn">Shop Now</button>
						</div>
					</div>
				</div> --}}
				<!-- /banner -->

				<!-- Product Slick -->
				<div class="col-md-12 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-1" class="product-slick">
							@foreach ($new_products as $new_product)
								<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span class="sale">New</span>
										{{-- <span class="sale">-20%</span> --}}
									</div>
									<a href="{{ route('detail_product',['id' => $new_product['id']]) }}">
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									</a>
									
									<img style="height: 350px;" src="{{ asset('storage/products/'.$new_product->avatar) }}" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">{{ number_format($new_product->sale_price) }} <del class="product-old-price">{{ number_format($new_product->origin_price) }}</del></h3>
									<div class="product-rating">

										@for ($i = 0; $i < $new_product->reviews->avg('star') ; $i++)
											<i class="fa fa-star"></i>
										@endfor
										
									</div>
									<h2 class="product-name"><a href="{{ route('detail_product',['id' => $new_product['id']]) }}">{{ $new_product->name }}</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<a href="{{ route('detail_product',['id'=>$new_product['id']]) }}">
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</a>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->

			
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<h2 class="title">Sản Phẩm bán chạy</h2>
						<div class="pull-right">
							<div class="product-slick-dots-2 custom-dots">
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				{{-- <div class="col-md-3 col-sm-6 col-xs-6">
					<div class="product product-single product-hot">
						<div class="product-thumb">
							<div class="product-label">
								<span class="sale">NEW</span>
							</div>
							
							<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
							<img src="fondend/img/product01.jpg" alt="">
						</div>
						<div class="product-body">
							<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o empty"></i>
							</div>
							<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
							<div class="product-btns">
								<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
								<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
								<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
							</div>
						</div>
					</div>
				</div> --}}
				<!-- /Product Single -->

				<!-- Product Slick -->
				<div class="col-md-12 col-sm-6 col-xs-6">
					<div class="row">
						<div id="product-slick-2" class="product-slick">

							@foreach ($sell_products as $sell_product)
							<!-- Product Single -->
							<div class="product product-single">
								<div class="product-thumb">
									<div class="product-label">
										<span class="sale">Top Sell</span>
										{{-- <span class="sale">-20%</span> --}}
									</div>
									<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
									<img style="height: 350px;" src="{{ asset('storage/products/'.$sell_product->avatar) }}" alt="">
								</div>
								<div class="product-body">
									<h3 class="product-price">{{ number_format($sell_product->sale_price) }} <del class="product-old-price">{{ number_format($sell_product->origin_price) }}</del></h3>
									<div class="product-rating">
										@for ($i = 0; $i < $sell_product->reviews->avg('star') ; $i++)
											<i class="fa fa-star"></i>
										@endfor
									</div>
									<h2 class="product-name"><a href="{{ route('detail_product',['id' => $sell_product['id']]) }}">{{ $sell_product->name }}</a></h2>
									<div class="product-btns">
										<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
										<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
										<a href="{{ route('detail_product',['id'=>$new_product['id']]) }}">
											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
										</a>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
							@endforeach
							
						</div>
					</div>
				</div>
				<!-- /Product Slick -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
@endsection

@section('product_trening')
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- section title -->
				<div class="col-md-12">
					<div class="section-title">
						<div class="row">
							<div class="col-md-10">
								<h2 class="title">Thương Hiệu</h2>
							</div>
							<div class="col-md-2">
								<a href="{{ route('Trademark.index') }}">xem tất cả thương hiệu</a>
							</div>
						</div>
					</div>
				</div>
				<!-- section title -->

				<!-- Product Single -->
				@foreach ($trademarks as $trademark)
					<div class="col-md-3 col-sm-6 col-xs-6">
						<div class="product product-single">
							<div class="product-thumb">
								<a href="{{ route('Trademark.product_trademark',['trademark' => $trademark->id]) }}">
									<button class="main-btn quick-view"> {{ $trademark->name }} </button>
								</a>
								
								<img style="height: 250px;" src="{{ asset('storage/trademarks/'.$trademark->avatar) }}" alt="">
							</div>
							<div class="product-body">
								
								<h2 class="product-name"><a href="#"></a></h2>
								
							</div>
						</div>
					</div>
				@endforeach
				
				<!-- /Product Single -->

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>	
@endsection
