@extends('auth2.layout.master')

@section('content')
<form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
	@csrf
	<span class="login100-form-title p-b-43">
		Register to continue
	</span>
	


	<div class="form-group row">
		<div class="col-md-12">
			<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

			@error('name')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>


	<div class="form-group row">

		<div class="col-md-12">
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">

			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-12">
			<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone" autofocus>

			@error('phone')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="form-group row">
		<div class="col-md-12">
			<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Address" autofocus>

			@error('address')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="form-group row">
		

		<div class="col-md-12">
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="PassWord" name="password" required autocomplete="new-password">

			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="form-group row">

		<div class="col-md-12">
			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="PassWord-Confirm" required autocomplete="new-password">
		</div>
	</div>
	<div class="container-login100-form-btn">
		<button class="login100-form-btn">
			Register
		</button>
	</div>
</form>	
@endsection