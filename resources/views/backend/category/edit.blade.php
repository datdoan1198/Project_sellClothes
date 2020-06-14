@extends('backend.layout.master')

@section('content')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('category.update',['category'=>$category['id']]) }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
        @method('put')
            <div class="form-group" >
                <label for="">Tến Danh mục</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $category['name'] }}">
            </div>
            <div class="form-group">
              <label for="">Danh mục cha</label>
              <input type="text" class="form-control" name="parent_id" value="{{ $category['parent_id'] }}">
            </div>
            <div class="form-group">
              <label for="">Độ Sâu</label>
              <input type="text" class="form-control" name="depth" value="{{ $category['depth'] }}">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection