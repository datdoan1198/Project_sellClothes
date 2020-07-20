@extends('auth2.layout.master')

@section('content')
<form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
	@csrf
	<span class="login100-form-title p-b-43">
		Login to continue
	</span>


	<div class="form-group row">
		<div class="col-md-12">
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

			@error('email')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>
	<div>
		@error('email')
		<span class="invalid-feedback" >
			<strong>{{ $message }}</strong>
		</span>
		@enderror
	</div>


	<div class="form-group row">

		<div class="col-md-12">
			<input id="password" type="password" placeholder="PassWord" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

			@error('password')
			<span class="invalid-feedback" role="alert">
				<strong>{{ $message }}</strong>
			</span>
			@enderror
		</div>
	</div>

	<div class="flex-sb-m w-full p-t-3 p-b-32">
		{{-- <div class="contact100-form-checkbox">
			<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
			<label class="label-checkbox100" for="ckb1">
				Remember me
			</label>
		</div> --}}

		
		{{-- <div> --}}
			<div>
				<a href="#" class="txt1">
					Forgot Password?
				</a>
			</div>
			<div>
				<a href="{{ route('register') }}" class="txt1">
					Register ?
				</a>
			</div>
			
		{{-- </div> --}}
	</div>


	<div class="container-login100-form-btn">
		<button class="login100-form-btn">
			Login
		</button>
	</div>

	<div class="text-center p-t-46 p-b-20">
		<span class="txt2">
			or sign up using
		</span>
	</div>

	<div class="login100-form-social flex-c-m">
		<a href="#" class="login100-form-social-item flex-c-m bg1 m-r-5">
			<i class="fa fa-facebook-f" aria-hidden="true"></i>
		</a>

		<a href="#" class="login100-form-social-item flex-c-m bg2 m-r-5">
			<i class="fa fa-twitter" aria-hidden="true"></i>
		</a>
	</div>
</form>
@endsection