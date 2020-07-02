@extends('backend.layout.master')

@section('content')
	<p>Tên sản phẩm: {{ $product['name'] }}</p>
	<p>Bộ sưu tập: {{ $product->collection->name }}</p>
	<p>Danh mục: {{ $product->category->name }}</p>
	<p>Giới tính: @if ($product['gender'] == 1)
		{{ 'Nam'}}
	@else
		{{ 'Nữ' }}
	@endif</p>
	<p>Giá gốc: {{ number_format($product['origin_price']) }}</p>
	<p>Giá bán: {{ number_format($product['sale_price']) }}</p>
	<p>số lượng: {{ $product['amount'] }}</p>
	<p>Thương hiệu: {{ json_decode($product['information_product'])[0] }}</p>
	<p>xuất sứ: {{ json_decode($product['information_product'])[1] }}</p>
	<p>chất liệu: {{ json_decode($product['information_product'])[2] }}</p>
	<p> {{ $product['content'] }} </p>
@endsection