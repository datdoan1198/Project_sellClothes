@extends('backend.layout.master')

@section('content')
	<p>name : {{ $user['name'] }}</p>
	<p>email : {{ $user['email'] }}</p>
	<p>phone : {{ $user['phone'] }}</p>
	<p>addres : {{ $user['address'] }}</p>
	<p>created_at : {{ $user['created_at'] }}</p>
	<p>updated_at : {{ $user['updated_at'] }}</p>
@endsection