@extends('backend.layout.master')

@section('content')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('product.store') }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
          <div class="row">
            <div class="col-md-12" >
              {{-- @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                  </div>
              @endif --}}
              <div class="form-group" >
                <label for="">Tến sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="" name="name">
              </div>
              @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="category_id" id="">
                  @foreach ($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach                
                </select>
              </div>
              <div class="form-group">
                <label for="">Người Dùng</label>
                <select class="form-control" name="user_id" id="">
                  @foreach ($users as $user)
                  <option value="{{ $user->id }}">{{ $user->name }}</option>
                  @endforeach                
                </select>
              </div>
              <div class="form-group">
                <label for="">Bộ Sưu Tập</label>
                <select class="form-control" name="collection_id" id="">
                  @foreach ($collection as $value)
                  <option value="{{ $value->id }}">{{ $value->name }}</option>
                  @endforeach                
                </select>
              </div>
              <div class="form-group">
                <label for="">Gender</label>
                <select class="form-control" name="gender" id="">
                  <option value="1">Nam</option>
                  <option value="0">Nữ</option>
                </select>
              </div>
              <div class="form-group">
                <label for="">Giá bán</label>
                <input type="text" class="form-control" name="price">
              </div>
              @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label for="">Phần trăm giảm giá</label>
                <input type="text" class="form-control" name="discount_percent">
              </div>
              @error('discount_percent')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                <label for="">Số lượng</label>
                <input type="text" class="form-control" name="amount">
              </div>
              @error('amount')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" class="form-control" name="images[]" multiple> 
                </div>
              @error('images.*')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              @error('images')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
        </form>
    </div>
</div>
@endsection