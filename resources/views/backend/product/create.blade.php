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
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Danh mục</label>
                    <select class="form-control" name="category_id" id="">
                      @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Bộ Sưu Tập</label>
                    <select class="form-control" name="collection_id" id="">
                      @foreach ($collection as $value)
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
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
                <label for="">Giới tính</label>
                <select class="form-control" name="gender" id="">
                  <option value="1">Nam</option>
                  <option value="0">Nữ</option>
                </select>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Giá nhập</label>
                    <input type="text" class="form-control" name="origin_price">
                  </div>
                  @error('origin_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Giá bán</label>
                    <input type="text" class="form-control" name="sale_price">
                  </div>
                  @error('sale_price')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Số lượng</label>
                    <input type="text" class="form-control" name="amount">
                  </div>
                  @error('amount')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="">Nội Dung Sản Phẩm</label>
                <textarea name="content" id="content" class="form-control"></textarea>
              </div>  
              <div class="form-group">
                <label for="">ảnh đại diện</label>
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
              </div>
        </form>
    </div>
</div>
@endsection