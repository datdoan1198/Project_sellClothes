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
	<p>Giá: {{ number_format($product['price']) }}</p>
	<p>số lượng: {{ $product['amount'] }}</p>
@endsection