@extends('backend.layout.master')

@section('content')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('user.store') }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
            <div class="form-group" >
                <label for="">name</label>
                <input type="text" class="form-control" id="" placeholder="" name="name">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group" >
                <label for="">Email</label>
                <input type="text" class="form-control" name="email">
            </div>
            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">PassWord</label>
                <input type="password" class="form-control" id="" placeholder="" name="password">
            </div>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="">Phone</label>
              <input type="number" class="form-control" name="phone">
            </div>
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" class="form-control" name="address">
            </div>
            @error('address')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Image</label>
                <input type="file" class="form-control" name="image">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection