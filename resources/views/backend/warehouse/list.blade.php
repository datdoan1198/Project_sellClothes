@extends('backend.layout.master')

@section('content')
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên Danh Mục</th>
				<th>Số lượng</th>
				<th>Chức Năng</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach ($products as $product)			
			<tr>
				<td>{{ $product['name'] }}</td>
				<td>
					{{ $product->amount }}
				</td>
				<td style="width: 10%;">
					<a class="btn btn-secondary" href="{{ route('warehouse.edit',['warehouse'=>$product['id']]) }}"><i class="fas fa-pencil-alt"></i></a>		
				</td>

			</tr>
			@endforeach
		</tbody>
		<tfoot>
		    <tr>
		        <th>Tên Danh Mục</th>
				<th>Số Lượng</th>
				<th>Chức Năng</th>
		    </tr>
		</tfoot>
	</table>
@endsection