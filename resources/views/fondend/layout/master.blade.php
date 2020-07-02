<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('fondend/css/bootstrap.min.css') }}" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="{{ asset('fondend/css/slick.css') }}" />
	<link type="text/css" rel="stylesheet" href="{{ asset('fondend/css/slick-theme.css') }}" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="{{ asset('fondend/css/nouislider.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('fondend/css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('fondend/css/style.css') }}" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

</head>

<body>
	<!-- HEADER -->
	@include('fondend.layout.header')
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	@include('fondend.layout.navbar')
	<!-- /NAVIGATION -->

	<!-- HOME -->
	@yield('home')
	<!-- /HOME -->	

	<!-- section -->
	@yield('collection_new')
	<!-- /section -->

	<!-- section -->
	@yield('product_new')
	<!-- /section -->

	<!-- section -->
	@yield('category')
	<!-- /section -->

	<!-- section -->
	@yield('product_trening')
	<!-- /section -->


	{{-- trang category --}}

	<!-- BREADCRUMB -->
	@yield('breadcrumb')
	<!-- /BREADCRUMB -->
	
	<!-- section -->
	@yield('content')
	<!-- /section -->

	{{-- trang chi tiet --}}

	<!-- section -->
	@yield('information_product')
	<!-- /section -->

	<!-- section -->
	@yield('aaa')
	<!-- /section -->

	<!-- FOOTER -->
	@include('fondend.layout.footer')
	<!-- /FOOTER -->

	<!-- jQuery Plugins -->
	<script src="{{ asset('fondend/js/jquery.min.js') }}"></script>
	<script src="{{ asset('fondend/js/bootstrap.min.js') }}"></script>
	<script src="{{ asset('fondend/js/slick.min.js') }}"></script>
	<script src="{{ asset('fondend/js/nouislider.min.js') }}"></script>
	<script src="{{ asset('fondend/js/jquery.zoom.min.js') }}"></script>
	<script src="{{ asset('fondend/js/main.js') }}"></script>

</body>

</html>
