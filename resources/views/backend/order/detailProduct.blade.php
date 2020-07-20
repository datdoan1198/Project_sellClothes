@extends('backend.layout.master')

@section('content')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Giá</th>
				<th>Số lượng </th>
				<th>kích cỡ</th>
				<th>thời gian </th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($order_products as $order_product)
				<tr>
					<td>{{ $order_product->name_product }}</td>
					<td>{{ number_format($order_product->price) }}</td>
					<td>{{$order_product->qty }}</td>
					<td>{{ $order_product->size }}</td>
					<td>{{ $order_product->created_at }}</td>
				</tr>
			@endforeach
			
		</tbody>
	</table>
@endsection