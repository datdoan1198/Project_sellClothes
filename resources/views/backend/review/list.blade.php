@extends('backend.layout.master')

@section('content')
	<table id="example1" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên Danh Mục</th>
				<th>Danh Mục Cha</th>
				<th>Độ Sâu</th>
				<th></th>
			</tr>
			
		</thead>
		<tbody>
			@foreach ($reviews as $review)			
			<tr>
				<td>{{ $review['name'] }}</td>
				<td>
					
			
				</td>
				<td>
					
				</td>
				<td style="width: 10%;">
					{{-- <a class="btn btn-secondary" href="{{ route('category.edit',['category'=>$category['id']]) }}"><i class="fas fa-pencil-alt"></i></a>
					<a class="btn btn-info" href="{{ route('category.show',['category'=>$category['id']]) }}"><i class="fas fa-folder"></i></a>
					<a class="btn btn-success" href="{{ route('category.showProduct',['id'=>$category['id']]) }}"><i class="fas fa-folder"></i></a>
					<form action="{{ route('category.destroy',['category'=>$category['id']]) }}" method="post">
						@method('delete')
						{{ csrf_field() }}
						<button class="btn btn-danger" ><i class="fas fa-trash"></i></button>
					</form>
					 --}}
				</td>

			</tr>
			@endforeach
		</tbody>
		<tfoot>
		    <tr>
		        <th>Tên Danh Mục</th>
				<th>Danh Mục Cha</th>
				<th>Độ Sâu</th>
				<th></th>
		    </tr>
		</tfoot>
	</table>
@endsection