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
                <div class="col-md-4">
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
                <div class="col-md-4">
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
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select class="form-control" name="trademark_id" id="">
                      @foreach ($trademarks as $trademark)
                      <option value="{{ $trademark->id }}" @if ($trademark->id == $product['trademark_id'])
                        {{ 'selected' }}
                      @endif >{{ $trademark->name }}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
              </div>
             <div id="aaa" class="row">
                <div class="col-md-10">
                  <label for="">Thông tin sản phẩm</label>
                </div>
                <div id="a" class="btn btn-info" class="col-md-1">
                  Thêm
                </div>
                <div id="b" style="margin-left: 2%" class="btn btn-danger" class="col-md-1">
                  xóa
                </div>
                <div id="parent" class="col-md-6">
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <input type="text" name="information_product[0][key]" class="form-control"  >
                        </div>
                        <div class="col-md-9">
                          <input type="text" name="information_product[0][value]"  class="form-control">
                        </div>
                      </div> 
                    </div>
                </div>       
              </div> 
             
              <div id="apsection"  class="row">
                <div class="col-md-11">
                  <label for="">Size</label>

                </div>
                <div id="btn_create" class="btn btn-info" class="col-md-1">
                  Thêm
                </div>
                @foreach ($product->size as $element)
                <div class="col-md-1">
                    <input type="text" value="{{ $element->size }}" class="form-control">
                </div>
                
                  @endforeach
                
                
                
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

              </div>
              <div class="form-group">
                <label for="">Nội Dung Sản Phẩm</label>
                <textarea name="content" id="content" class="form-control"  >{{ htmlspecialchars_decode($product['content']) }}</textarea>
              </div> 
              <div class="form-group">
                <label for="">ảnh đại diện</label>
                <br>
                <img style="width: 10%;" src="{{ asset('storage/products/'.$product['avatar']) }}" alt="">
                <input type="file" class="form-control" name="avatar">
              </div>
              @error('avatar')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror 
              <div class="form-group">
                  <label for="">Ảnh sản phẩm</label>
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
      </form>
    </div>
</div>

@endsection