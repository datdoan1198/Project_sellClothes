@extends('fondend.layout.master')

@section('breadcrumb')
	<div class="container">
		{{-- <ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Products</li>
		</ul> --}}
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
						{{-- <div class="pull-left">
							<div class="row-filter">
								<a href="#"><i class="fa fa-th-large"></i></a>
								<a href="#" class="active"><i class="fa fa-bars"></i></a>
							</div> --}}
							{{-- <div class="sort-filter">
								<span class="text-uppercase">Sort By:</span>

								<select class="input">
										<option value="0">Position</option>
										<option value="0">Price</option>
										<option value="0">Rating</option>
									</select>

								<a href="{{ route('fontend.price_collection',['id'=>$id]) }}" class="main-btn icon-btn"><i class="fa fa-dollar"></i></a>
								<a href="{{ route('fontend.time_collection',['id'=>$id]) }}" class="main-btn icon-btn"><i class="fa fa-bar-chart"></i></a>
								<a href="{{ route('fontend.viewsell_collection',['id'=>$id]) }}" class="main-btn icon-btn"><i class="fa fa-clock-o"></i></a>
							</div> --}}
					{{-- 	</div> --}}
						{{-- <div class="pull-right">
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div> --}}
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							@foreach ($collections as $collection)
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
										
										</div>
										<a href="{{ route('fontend.collection',['id' => $collection['id']]) }}">
											<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										</a>
										
										<img style="height: 350px;" src="{{ asset('storage/collections/'.$collection->avatar) }}" alt="">
									</div>
									<div class="product-body">
									
										<div style="height: 50px;">
											<h2 class="product-name"><a href="{{ route('fontend.collection',['id' => $collection['id']]) }}">{{ $collection['name'] }}</a></h2>
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
					{{-- <div class="store-filter clearfix">
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
							<div class="page-filter">
								<span class="text-uppercase">Show:</span>
								<select class="input">
										<option value="0">10</option>
										<option value="1">20</option>
										<option value="2">30</option>
									</select>
							</div>
							<ul class="store-pages">
								<li><span class="text-uppercase">Page:</span></li>
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
							</ul>
						</div>
					</div> --}}
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
