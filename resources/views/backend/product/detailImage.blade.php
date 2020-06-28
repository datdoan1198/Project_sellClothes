@extends('backend.layout.master')

@section('content')
	<div class="row">
		<div class="col-md-12">
			<p>ảnh sản phẩm</p>
		</div>
		@foreach ($showImages as $showImage)
			<div class="col-md-3">
		
				<img class="img-fluid" src="{{ asset('storage/'.$showImage->path) }}" alt="">
			</div>
		@endforeach
		
	</div>
@endsection