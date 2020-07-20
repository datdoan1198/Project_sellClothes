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
			@foreach ($categories as $category)			
			<tr>
				<td>{{ $category['name'] }}</td>
				<td>
					@foreach ($categories as $element)
						@if ($category['parent_id'] == $element['id'])
							{{ $element->name }}
						@endif
					@endforeach
				</td>
				<td>
					<img style="width: 100px;" src="{{ asset('storage/categories/'.$category->avatar) }}" alt="">
				</td>
				<td style="width: 10%;">
					@if (Auth::user()->role == 1)
					<a class="btn btn-secondary" href="{{ route('category.edit',['category'=>$category['id']]) }}"><i class="fas fa-pencil-alt"></i></a>
					<a class="btn btn-info" href="{{ route('category.show',['category'=>$category['id']]) }}"><i class="fas fa-folder"></i></a>
					<a class="btn btn-success" href="{{ route('category.showProduct',['id'=>$category['id']]) }}"><i class="fas fa-folder"></i></a>
					<form action="{{ route('category.destroy',['category'=>$category['id']]) }}" method="post">
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
		        <th>Tên Danh Mục</th>
				<th>Danh Mục Cha</th>
				<th>Độ Sâu</th>
				<th></th>
		    </tr>
		</tfoot>
	</table>
@endsection