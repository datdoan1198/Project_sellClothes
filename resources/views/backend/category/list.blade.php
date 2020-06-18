@extends('backend.layout.master')

@section('content')
	<table id="exam" class="table table-bordered table-striped">
		<thead>
			<tr>
				<th>Tên Danh Mục</th>
				<th>Danh Mục Cha</th>
				<th>Độ Sâu</th>
			</tr>
			
		</thead>
		<tbody>
			@foreach ($categories as $category)			
			<tr>
				<td>{{ $category['name'] }}</td>
				<td>{{ $category['parent_id'] }}</td>
				<td>{{ $category['depth'] }}</td>
				<td style="width: 10%;">
					<a class="btn btn-secondary" href="{{ route('category.edit',['category'=>$category['id']]) }}">Edit</a>
				
					
				</td>
				<td style="width: 10%;">
					<a class="btn btn-info" href="{{ route('category.show',['category'=>$category['id']]) }}">Detail</a>
				</td>
				<td style="width: 10%;">
					<a class="btn btn-success" href="{{ route('category.showProduct',['id'=>$category['id']]) }}">showProduct</a>
				</td>
				<td style="width: 10%">
					<form action="{{ route('category.destroy',['category'=>$category['id']]) }}" method="post">
						@method('delete')
						{{ csrf_field() }}
						<input class="btn btn-danger" type="submit" value="Delete">
					</form>
				</td>

			</tr>
			@endforeach
		</tbody>
	</table>
@endsection