@extends('fondend.layout.master')

@section('breadcrumb')
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Products</li>
		</ul>
	</div>	
@endsection

@section('content')
	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- MAIN -->
				<div id="main" class="col-md-12">
					<!-- store top filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>

								{{-- <select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select> --}}

								<a href="{{ route('fontend.price_collection',['id'=>$id]) }}" class="main-btn icon-btn"><i class="fa fa-dollar"></i></a>
								
								<a href="{{ route('fontend.viewsell_collection',['id'=>$id]) }}" class="main-btn icon-btn"><i class="fa fa-bar-chart"></i></a>
							</div>
						</div>
						<div class="pull-right">
							{!! $product_collections->links() !!}
							
						</div>
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							@foreach ($product_collections as $product_collection)
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
											<span class="sale">-20%</span>
										</div>
										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										<img style="height: 350px;" src="{{ asset('storage/products/'.$product_collection->avatar) }}" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">{{ number_format($product_collection['sale_price']) }} VNĐ<br><del class="product-old-price">{{ number_format($product_collection['origin_price']) }} VNĐ</del></h3>
										<div class="product-rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star-o empty"></i>
										</div>
										<div style="height: 50px;">
											<h2 class="product-name"><a href="{{ route('detail_product',['id' => $product_collection['id']]) }}">{{ $product_collection['name'] }}</a></h2>
										</div>
										<div class="product-btns">
											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
											<a href="{{ route('detail_product',['id'=>$product_collection['id']]) }}">
												<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
											</a>
										</div>
									</div>
								</div>
							</div>
							<!-- /Product Single -->
							<div class="clearfix visible-sm visible-xs"></div>
							@endforeach
							<!-- Product Single -->
						</div>
						<!-- /row -->
					</div>
					<!-- /STORE -->

					<!-- store bottom filter -->
					<div class="store-filter clearfix">
						<div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div>
							<div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>
								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>
								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
							</div>
						</div>
						<div class="pull-right">
							{!! $product_collections->links() !!}
						</div>
					</div>
					<!-- /store bottom filter -->
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
