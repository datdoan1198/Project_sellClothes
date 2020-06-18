@extends('backend.layout.master')

@section('content')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>tên sản phẩm</th>
				<th>Bộ sư tập</th>
				<th>số lượng</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($showProducts as $showProduct)
				<tr>
					<td>{{ $showProduct->name }}</td>
					<td>{{ $showProduct->collection->name }}</td>
					<td>{{ $showProduct->amount }}</td>
				</tr>

			@endforeach
			
		</tbody>
	</table>

@endsection
	