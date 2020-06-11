@extends('backend.layout.master')

@section('content')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('product.store') }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
            <div class="form-group" >
                <label for="">Tến sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="" name="name">
            </div>
            <div class="form-group" >
                <label for="">Thương hiệu</label>
                <input type="text" class="form-control" name="trade_mark">
            </div>
            <div class="form-group">
              <label for="">Danh mục</label>
             	<input type="text" class="form-control" name="category_id">
            </div>
            <div class="form-group">
                <input type="hidden" class="form-control" id="" placeholder="" name="status" value="1">
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

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection