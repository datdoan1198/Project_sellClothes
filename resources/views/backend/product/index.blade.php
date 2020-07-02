@extends('backend.layout.master')

@section('content')
	<table id="exam" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Danh Mục</th>
				<th>Bộ Sưu Tập</th>
				<th>Giá Bán</th>
				<th>Giới tính</th>
			</tr>
			
		</thead>
		<tbody>
			
			@foreach ($products as $product)			
			<tr>
				<td>{{ $product['name'] }}</td>
				<td>
					@foreach ($categories as $category)
						@if ($product->category_id == $category->id)
							{{ $category->name }}
						@endif
					@endforeach

				</td>
				
				<td>
					@foreach ($collection as $value)
						@if ($product->collection_id == $value->id)
							{{ $value->name }}
						@endif
					@endforeach
				</td>
				<td>
					{{ number_format($product['origin_price']) }}
				</td>
				<td>
					@if ($product['gender'] == 1)
						{{ 'Nam' }}
					@else
						{{ 'Nữ' }}
					@endif
				</td>
				<td style="width: 10%;">
					<a class="btn btn-secondary" href="{{ route('product.edit',['product'=>$product['id']]) }}">Edit</a>
					<a class="btn btn-info" href="{{ route('product.show',['product'=>$product['id']]) }}">Detail</a>
					<a class="btn btn-success" href="{{ route('product.showImage',['id'=>$product['id']]) }}">showImage</a>
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

	<div>
		{{ $products->links() }}
	</div>
@endsection