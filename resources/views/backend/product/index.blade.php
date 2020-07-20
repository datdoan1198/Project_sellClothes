@extends('backend.layout.master')

@section('content')
@if (session()->has('sucssec'))
<p class="alert alert-info">Thông Báo : {{ session()->get('sucssec') }}</p>
@endif

	{{-- @if (cookie()->has('aaa'))
		{{ 'có' }}
	@else
		{{ 'khong' }}
		@endif --}}
		<div class="create_modal btn btn-success" type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
			add
		</div>

		<table id="example1" class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Tên sản phẩm</th>
					<th>Danh Mục</th>
					<th>Bộ Sưu Tập</th>
					<th>Giá Bán</th>
					<th>Giới tính</th>
					<th>Trạng thái hoạt động</th>
					<th></th>
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
					<td>
						@if ($product->status == 0)
						{{ 'không hoạt động' }}
						@elseif($product->status == 1)
						{{ 'Hoạt động' }}
						@else
						{{ 'đang chờ duyệt' }}
						@endif

					</td>
					<td>

						@if (Auth::user()->id == $product->user_id || Auth::user()->role == 1)
						<a class="btn btn-secondary" href="{{ route('product.edit',['product'=>$product['id']]) }}">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<form action="{{ route('product.destroy',['product'=>$product['id']]) }}" method="post">
							@method('delete')
							{{ csrf_field() }}
							<button class="btn btn-danger" ><i class="fas fa-trash"></i></button>

						</form>
						@endif

						<a class="btn btn-info" href="{{ route('product.show',['product'=>$product['id']]) }}">
							<i class="fas fa-folder"></i>
						</a>

						
						{{-- <a class="btn btn-success" href="{{ route('product.showImage',['id'=>$product['id']]) }}">showImage</a> --}}
					</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>Tên sản phẩm</th>
					<th>Danh Mục</th>
					<th>Bộ Sưu Tập</th>
					<th>Giá Bán</th>
					<th>Giới tính</th>
					<th>Trạng thái hoạt động</th>
					<th></th>
				</tr>
			</tfoot>
		</table>

		@include('backend.product.create')
		<!-- /.modal-dialog -->
	</div>
	@endsection