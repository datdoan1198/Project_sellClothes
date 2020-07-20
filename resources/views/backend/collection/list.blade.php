@extends('backend.layout.master')

@section('content')
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên Bộ Sưu Tập</th>
				<th>Ảnh</th>
				<th>Chức Năng</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach ($collections as $collection)			
			<tr>
				<td>{{ $collection['name'] }}</td>
				<td >
					<img style="width: 100px;" src="{{ asset('storage/collections/'.$collection->avatar) }}" alt="">
				</td>
				
				<td style="width: 10%;">
					@if (Auth::user()->role == 1)
					<a class="btn btn-secondary" href="{{ route('collection.edit',['collection'=>$collection['id']]) }}"><i class="fas fa-pencil-alt"></i></a>
					<a class="btn btn-info" href="{{ route('collection.show',['collection'=>$collection['id']]) }}"><i class="fas fa-folder"></i></a>
					{{-- <a class="btn btn-success" href="{{ route('collection.showProduct',['id'=>$collection['id']]) }}"><i class="fas fa-folder"></i></a> --}}
					<form action="{{ route('collection.destroy',['collection'=>$collection['id']]) }}" method="post">
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
				<th>Tên Bộ Sưu Tập</th>
				<th>Ảnh</th>
				<th>Chức Năng</th>
			</tr>
		</tfoot>
	</table>
@endsection