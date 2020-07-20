<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to E-shop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="#">
							<img src="{{ asset('fondend/img/logo.png') }}" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					{{-- <div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								<option value="1">Category 01</option>
								<option value="1">Category 02</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div> --}}
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase">My Account <i class="fa fa-caret-down"></i></strong>
							</div>
							<a href="#" class="text-uppercase">@if (isset(Auth::user()->name))
								{{ Auth::user()->name }}

							@else

							@endif</a> 
							<ul class="custom-menu">
								<li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
								<li><a href="#"><i class="fa fa-heart-o"></i> My Wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> Compare</a></li>
								<li><a href="#"><i class="fa fa-check"></i> Checkout</a></li>
								<li><a href="#"><i class="fa fa-user-plus"></i> Create An Account</a></li>
								<li>
									
									
							        
							
								</li>
								
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty">{{ Cart::count() }}</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span>{{ Cart::subtotal() }} </span>
							</a>
							<div class="custom-menu">
								<div id="shopping-cart">
									<div class="shopping-cart-list">
										@foreach ($mini_cart as $cart)
											<div class="product product-widget">
											<div class="product-thumb">
												@foreach ($img_product as $img)
													@if ($cart->id == $img->id)
														<img src="{{ asset('storage/products/'.$img->avatar) }}" alt="">
													@endif
												@endforeach
												
												
											</div>
											<div class="product-body">
												<h3 class="product-price">{{ number_format($cart->price) }}<span class="qty">x {{ $cart->qty }}</span></h3>
												<h2 class="product-name"><a href="#">{{ $cart->name }}</a></h2>
											</div>
											<a href="{{ route('cart.delete',['id' => $cart->rowId]) }}">
												<button class="cancel-btn"><i class="fa fa-trash"></i></button>
											</a>
										</div>
										@endforeach
										
									</div>
									<div class="shopping-cart-btns">
										<button class="main-btn">View Cart</button>
										<a href="{{ route('cart.index') }}"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
									</div>
								</div>
							</div>
						</li>
						<!-- /Cart -->

						{{-- login/logout --}}
						<li class="header-account dropdown default-dropdown">
							@if (isset(Auth::user()->name))
										<form id="logout-form" action="{{ route('logout') }}" method="POST" >
							            @csrf
							            <input style="margin: 0 auto;" type="submit" class="btn btn-danger"  value="Logout">
							        </form>
							        @else
							        	<form id="logout-form" action="{{  route('login') }}" method="GET" >
							            @csrf
							            <input style="margin: 0 auto;" type="submit" class="btn btn-danger"  value="login">
							        </form>
									@endif
						</li>
						{{-- login/logout --}}
	
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
</header>