@extends('backend.layout.master')

@section('content')
<table id="exam" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>name</th>
			<th>email</th>
			<th>phone</th>
		</tr>
		
	</thead>
	<tbody>
		@foreach ($users as $user)			
		<tr>
			<td>{{ $user['name'] }}</td>
			<td>{{ $user['email']}}</td>
			<td>{{ $user['phone'] }}</td>
			<td style="width: 10%;">
				@if (Auth::user()->role == 1)
				<a  class="btn btn-info" href="{{ route('user.edit',['user'=>$user['id']]) }}"><i class="fas fa-pencil-alt" ></i></a>
				<form action="{{ route('user.destroy',['user'=>$user['id']]) }}" method="post">
					@method('delete')
					{{ csrf_field() }}
					<button class="btn btn-danger"><i class="fas fa-trash"></i></button>
				</form>
				<a class="btn btn-secondary" href="{{ route('user.show',['user'=>$user['id']]) }}"><i class="fas fa-folder"></i></a>
				@endif
				

				{{-- <a class="btn btn-success" href="{{ route('user.showProduct',['id'=>$user['id']]) }}">showProduct</a> --}}
				
			</td>

		</tr>
		@endforeach
	</tbody>
</table>
@endsection