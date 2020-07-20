@extends('fondend.layout.master')

@section('content')
	<div class="container">
		{{-- <form action="" method="post">
			
			<input type="text" name="name">
			<input type="text" name="email">
			<button>sdsd</button>
		</form> --}}
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix" action="{{ route('order.store') }}" method="POST" >
					{{ csrf_field() }}
					<div class="col-md-6">
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>

							@if (Auth::user() != null)
								<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Họ và Tên" value="{{ Auth::user()->name }}">
							</div>
							
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}">
							</div>

							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Địa Chỉ Giao Hàng" value="{{ Auth::user()->address }}">
							</div>
							
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Số Điện Thoại" value="{{ Auth::user()->phone }}">
							</div>
							@else
							<div class="form-group">
								<input class="input" type="text" name="name" placeholder="Họ và Tên">
							</div>
							@error('name')
				                <div class="alert alert-danger">{{ $message }}</div>
				            @enderror
							<div class="form-group">
								<input class="input" type="email" name="email" placeholder="Email">
							</div>
							@error('email')
				                <div class="alert alert-danger">{{ $message }}</div>
				            @enderror
							<div class="form-group">
								<input class="input" type="text" name="address" placeholder="Địa Chỉ Giao Hàng">
							</div>
							@error('address')
				                <div class="alert alert-danger">{{ $message }}</div>
				            @enderror
							
							<div class="form-group">
								<input class="input" type="tel" name="phone" placeholder="Số Điện Thoại">
							</div>
							@error('phone')
				                <div class="alert alert-danger">{{ $message }}</div>
				            @enderror
							@endif
							
							{{-- <div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Create Account?</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.
											<p>
												<input class="input" type="password" name="password" placeholder="Enter Your Password">
									</div>
								</div>
							</div> --}}
						</div>
					</div>

					<div class="col-md-6">
						<div class="shiping-methods">
							<div class="section-title">
								<h4 class="title">Shiping Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-1" checked>
								<label for="shipping-1">Free Shiping </label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							{{-- <div class="input-checkbox">
								<input type="radio" name="shipping" id="shipping-2">
								<label for="shipping-2">Standard - $4.00</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div> --}}
						</div>

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Direct Bank Transfer</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Cheque Payment</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Paypal System</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-12">
						<div class="order-summary clearfix">
							<div class="section-title">
								<h3 class="title">Order Review</h3>
							</div>
							<table class="shopping-cart-table table">
								<thead>
									<tr>
										<th>Ảnh Sản Phẩm</th>
										<th>Tên sản phẩm</th>
										<th class="text-center">Giá</th>
										<th class="text-center">Số Lượng</th>
										<th class="text-center">Thành Tiền</th>
										<th class="text-right"></th>
									</tr>
								</thead>
								@foreach ($item as $element)

							
								<tbody>
									<tr>
										@foreach ($data as $aa)
										@if ($element->id == $aa->id)
											<td class="thumb"><img src="{{ asset('storage/products/'.$aa->avatar) }}" alt=""></td>
										@endif
											
										@endforeach
						
										<td class="details">
											<a href="#">{{$element->name }} </a>
											<ul>
												<li>
													<span>Size: 
														@foreach ($sizes as $size)
															@if ($size->id == $element->options['size'])
																{{ $size->size }}
															@endif
														@endforeach
														@if ($element->options['size'] == 0)
															<select name="size[]" id="">
																<option value=""></option>
																@foreach ($sizes as $size)
																	@if ($size->product_id == $element->id)
																	<a href="#">
																		<option value="{{ $size->id }}">{{ $size->size }}</option>
																	</a>
																		
																	@endif
																@endforeach
																
																
															</select>
														@endif
														
														
													</span>
												</li>
											</ul>
										</td>
										<td class="price text-center"><strong>{{ number_format($element->price) }}</strong></td>
										<td class="qty text-center">
											<a href="{{ route('cart.minus',['id' => $element->rowId]) }}">
												<div class="btn btn-info">
													<i class="fa fa-minus"></i>
												</div>
											</a>	
											
											<input style="width: 40px;" class="input" disabled type="text" value="{{ $element->qty }}">
											<a href="{{ route('cart.plus',['id' => $element->rowId]) }}">
												<div class="btn btn-info">
													<i class="fa fa-plus"></i>
												</div>
											</a>
											
										</td>
										<td class="total text-center"><strong class="primary-color">{{ number_format($element->price * $element->qty) }}</strong></td>
										<td class="text-right"><a href="{{ route('cart.delete',['id' => $element->rowId]) }}">
											<div class="main-btn icon-btn">
												<i class="fa fa-close"></i>
											</div>
										</a></td>
									</tr>
								</tbody>
								@endforeach
								<tfoot>
									<tr>
										<th class="empty" colspan="3">
											@if (session()->has('message'))
												<p class="alert alert-danger">{{ session()->get('message') }}</p>
											@endif
										</th>
										<th>SUBTOTAL</th>
										<th colspan="2" class="sub-total">{{ Cart::subtotal() }} VNĐ</th>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>SHIPING</th>
										<td colspan="2">Free Shipping</td>
									</tr>
									<tr>
										<th class="empty" colspan="3"></th>
										<th>TOTAL</th>
										<th colspan="2" class="total" >{{ Cart::subtotal() }} VNĐ</th>
									</tr>
								</tfoot>
							</table>
							<div class="pull-right">
								
									<button class="primary-btn">Place Order</button>
							
								
							</div>
						</div>

					</div>
				</form>
			</div>
			<!-- /row -->
	</div>
@endsection


