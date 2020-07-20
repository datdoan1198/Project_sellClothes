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
					</div>
					<!-- /store top filter -->

					<!-- STORE -->
					<div id="store">
						<!-- row -->
						<div class="row">
							@foreach ($trademarks as $trademark)
							<div class="col-md-4 col-sm-6 col-xs-6">
								<div class="product product-single">
									<div class="product-thumb">
										<div class="product-label">
											<span>New</span>
										
										</div>
										<a href="">
											<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
										</a>
										
										<img style="height: 350px;" src="{{ asset('storage/trademarks/'.$trademark->avatar) }}" alt="">
									</div>
									<div class="product-body">
									
										<div style="height: 50px;">
											<h2 class="product-name"><a href="">{{ $trademark['name'] }}</a></h2>
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
					
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
@endsection
