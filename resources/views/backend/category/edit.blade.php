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
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group">
                <label for="">Danh mục cha</label>
                <select class="form-control" name="parent_id" id="">
                  <option value="0"></option>     
                  @foreach ($categories as $category1)
                  <option value="{{ $category1->id }}" @if ($category1->id == $category['parent_id'])
                    {{ 'selected' }}
                  @endif>{{ $category1->name }}</option>
                  @endforeach 
                            
                </select>
              </div>
            <div class="form-group">
              <label for="">Avatar</label><br>
              <img style="width: 100px;" src="{{ asset('storage/categories/'.$category['avatar']) }}" alt="">
              <input type="file" class="form-control" name="avatar">
            </div>
            @error('avatar')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {{-- <div>
              <input type="hidden" name="name_file" value="{{ $category['name'] }}">
            </div> --}}
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection