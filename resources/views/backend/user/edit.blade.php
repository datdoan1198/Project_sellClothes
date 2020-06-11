@extends('backend.layout.master')

@section('content')
	<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('user.update',['user'=>$user['id']]) }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
    	@method('put')
            <div class="form-group" >
                <label for="">name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $user['name'] }}">
            </div>
            <div class="form-group" >
                <label for="">Email</label>
                <input type="text" class="form-control" name="email" value="{{ $user['name'] }}" disabled="">
            </div>
            <div class="form-group">
              <label for="">Phone</label>
              <input type="text" class="form-control" name="phone" value="{{ $user['phone'] }}">
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" class="form-control" name="address" value="{{ $user['name'] }}">
            </div>
            {{-- <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image" value="{{ $user['name'] }}">
            </div> --}}
           {{--  <div class="form-group">
                <label for="">Time</label>
                <input type="text" class="form-control" id="" placeholder="" name="created_at" value="<?php echo  date("Y/m/d")." ". date("h:i:sa") ?>" disabled>
            </div> --}}
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection