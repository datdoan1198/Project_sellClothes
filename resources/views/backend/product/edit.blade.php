@extends('backend.layout.master')

@section('content')
{{-- @if (isset($_COOKIE['fail']))
  <br>
  <div class="alert alert-info">
    sdsd
    <p>Thông báo : {{ $_COOKIE['fail'] }}</p>
  </div>
@else
  {{ 'sdsđs' }}
@endif --}}
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('product.update',['product'=>$product['id']]) }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
      {{ csrf_field() }}
      @method('put')
        <div class="row">
          <div class="col-md-12">
              <div class="form-group" >
                <label for="">Tến sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $product['name'] }}">
              </div>
              @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="category_id" id="">
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}" @if ($category->id == $product['category_id'])
                        {{ 'selected' }}
                      @endif>{{ $category->name }}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Bộ Sưu Tập</label>
                    <select class="form-control" name="collection_id" id="">
                      @foreach ($collection as $value)
                      <option value="{{ $value->id }}" @if ($value->id == $product['collection_id'])
                        {{ 'selected' }}
                      @endif>{{ $value->name }}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <input type="text" name="information_product[]" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Xuất Sứ</label>
                    <input type="text" name="information_product[]" class="form-control">
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="">Chất liệu</label>
                  <input type="text" name="information_product[]" class="form-control">
                </div>
              </div> 
              <div class="form-group">
                <label for="">Giới Tính</label>
                <select class="form-control" name="gender" id="">
                  <option value="1" >Nam</option>
                  <option value="0" @if ($product->gender == 0)
                    {{ 'selected' }}
                  @endif>Nữ</option>
                </select>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input type="text" class="form-control" name="origin_price" value="{{ $product['origin_price'] }}" >
                  </div>
                  @error('origin_price')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="text" class="form-control" name="sale_price" value="{{ $product['sale_price'] }}">
                  </div>
                  @error('sale_price')
                      <div class="alert alert-danger"> {{ $message}}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="text" class="form-control" name="amount" value="{{ $product['amount'] }}">
                  </div>
                  @error('amount')
                    <div class="alert alert-danger"> {{ $message }}</div>
                  @enderror
                </div>
              </div>
          <button type="submit" class="btn btn-primary">Create</button>
      </form>
    </div>
</div>

@endsection