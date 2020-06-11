@extends('backend.layout.master')

@section('content')
	<p>Tên sản phẩm: {{ $product['name'] }}</p>
	<p>Thương hiệu: {{ $product['trade_mark'] }}</p>
	<p>Danh mục: {{ $product['category_id'] }}</p>
	<p>Giới tính: @if ($product['gender'] == 1)
		{{ 'Nam'}}
	@else
		{{ 'Nữ' }}
	@endif</p>
	<p>Giá: {{ number_format($product['price']) }}</p>
	<p>số lượng: {{ $product['status'] }}</p>
@endsection