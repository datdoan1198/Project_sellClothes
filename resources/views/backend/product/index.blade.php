@extends('backend.layout.master')

@section('content')
	<table id="exam" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Thương hiệu</th>
				<th>Giá bán</th>
				<th>Giới tính</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach ($products as $product)			
			<tr>
				<td>{{ $product['name'] }}</td>
				<td>{{ $product['trade_mark']}}</td>
				<td>{{ number_format($product['price']) }}</td>
				<td>
					@if ($product['gender'] == 1)
						{{ 'Nam' }}
					@else
						{{ 'Nữ' }}
					@endif
				</td>
				<td style="width: 10%;">
					<a class="btn btn-info" href="{{ route('product.edit',['product'=>$product['id']]) }}">Edit</a>
				
					
				</td>
				<td style="width: 10%;">
					<a class="btn btn-info" href="{{ route('product.show',['product'=>$product['id']]) }}">Detail</a>
				</td>
				<td style="width: 10%">
					<form action="{{ route('product.destroy',['product'=>$product['id']]) }}" method="post">
						@method('delete')
						{{ csrf_field() }}
						<input class="btn btn-danger" type="submit" value="Delete">
					</form>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
@endsection