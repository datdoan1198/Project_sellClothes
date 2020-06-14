@extends('backend.layout.master')

@section('content')
	<p>Tên Danh Mục : {{ $category['name'] }}</p>
	<p>id cha: {{ $category['parent_id'] }}</p>
	<p>Độ Sâu: {{ $category['depth'] }}</p>
	
@endsection