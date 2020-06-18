@extends('backend.layout.master')

@section('content')
	<table class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên order</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{ $order->name }}</td>
					<td style="width: 10%;">
						<a class="btn btn-success" href="{{ route('order.showProduct',['id'=>$order['id']]) }}">showProduct</a>
					</td>
				</tr>
				
			@endforeach
			
		</tbody>
	</table>
@endsection