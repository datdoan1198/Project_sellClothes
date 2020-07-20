@extends('backend.layout.master')

@section('content')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Collections</h3>
    <hr>
    <form action="{{ route('collection.update',['collection'=> $collection['id']]) }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
        @method('put')
            <div class="form-group" >
                <label for="">Tến Bộ Sưu Tập</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $collection->name }}">
            </div>
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
              <label for="">Ảnh đại diện</label><br>
              <img style="width: 100px" src="{{ asset('storage/collections/'.$collection->avatar) }}" alt="">
              <input type="file" class="form-control" name="avatar">
            </div>
            @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection