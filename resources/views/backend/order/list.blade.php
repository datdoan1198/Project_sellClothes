@extends('backend.layout.master')

@section('content')
	<table  id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên Khách Hàng</th>
				<th>Email</th>
				<th>Địa chỉ Giao Hàng</th>
				<th>Số Điện Thoại</th>
				<th>Trạng Thái</th>
				<th>Chức Năng</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td>{{ $order->name }}</td>
					<td>{{ $order->email }}</td>
					<td>{{ $order->address }}</td>
					<td>{{ $order->phone }}</td>
					<td>
						@if ($order->status == 0)
						<div class="row">
							<div class="col-md-9">
								{{ "đang lên đơn hàng" }}
							</div>
							<div class="col-md-3">
								<a class="btn btn-warning" href="{{ route('order.complete',['id' => $order->id]) }}"><i class="fas fa-ellipsis-h"></i></a>
							</div>
							
						</div>
						@elseif ($order->status == 1)	
						<div class="row">
							<div class="col-md-9">
								{{ 'đang giao hàng' }}
							</div>
							<div class="col-md-3">
								<a class="btn btn-info" href="{{ route('order.complete',['id' => $order->id]) }}"><i class="fas fa-check"></i></a>
							</div>
						</div>
						@else
						<div class="row">
							<div class="col-md-9">
								{{ 'đã giao hàng' }}
							</div>
							<div class="col-md-3">
								<a class="btn btn-success" href="{{ route('order.complete',['id' => $order->id]) }}"><i class="fas fa-undo"></i></a>
							</div>
						</div>
						@endif

					</td>
					<td style="width: 10%;">
						<a class="btn btn-success" href="{{ route('order.showProduct',['id'=>$order['id']]) }}"><i class="fas fa-eye"></i></a>
						@if ($order->user_id == null)
							<form action="{{ route('order.destroy',['id'=>$order['id']]) }}" method="post">
								@method('delete')
								{{ csrf_field() }}
								<button class="btn btn-danger" ><i class="fas fa-trash"></i></button>

							</form>
						@endif
						
						
					</td>
				</tr>
				
			@endforeach
			
		</tbody>
		<tfoot>
		    <tr>
				<th>Tên Khách Hàng</th>
				<th>Email</th>
				<th>Địa chỉ Giao Hàng</th>
				<th>Số Điện Thoại</th>
				<th>Trạng Thái</th>
				<th>Chức Năng</th>
			</tr>
		</tfoot>
	</table>
@endsection