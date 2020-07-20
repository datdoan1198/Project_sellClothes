@extends('backend.layout.master')

@section('content')
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên Thương Hiệu</th>
				<th>Ảnh</th>
				<th>Chức Năng</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach ($trademarks as $trademark)			
			<tr>
				<td>{{ $trademark['name'] }}</td>
				<td >
					<img style="width: 200px;" src="{{ asset('storage/trademarks/'.$trademark->avatar) }}" alt="">
				</td>
				<td style="width: 10%;">
					@if (Auth::user()->role == 1)
						<a class="btn btn-secondary" href="{{ route('trademark.edit',['trademark'=>$trademark['id']]) }}"><i class="fas fa-pencil-alt"></i></a>
						<a class="btn btn-info" href="{{ route('trademark.show',['trademark'=>$trademark['id']]) }}"><i class="fas fa-folder"></i></a>
						{{-- <a class="btn btn-success" href="{{ route('trademark.showProduct',['id'=>$trademark['id']]) }}"><i class="fas fa-folder"></i></a> --}}
						<form action="{{ route('trademark.destroy',['trademark'=>$trademark['id']]) }}" method="post">
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
				<th>Tên Thương Hiệu</th>
				<th>Ảnh</th>
				<th>Chức Năng</th>
			</tr>
		</tfoot>
	</table>
@endsection