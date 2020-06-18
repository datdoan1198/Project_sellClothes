@extends('backend.layout.master')

@section('content')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên sản phẩm</th>
				<th>Danh mục</th>
				<th>Bộ sưu tập</th>
				
			</tr>
		</thead>
		<tbody>
			@foreach ($showProducts as $showProduct)
				<tr>
					<td>{{ $showProduct->name }}</td>
					<td>{{ $showProduct->category->name }}</td>
					<td>{{ $showProduct->collection->name }}</td>
					
				</tr>
			@endforeach
			
		</tbody>
	</table>
@endsection