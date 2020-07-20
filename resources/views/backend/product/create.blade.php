{{--  @extends('backend.layout.master')

@section('create')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('product.store') }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
          <div class="row">
            <div class="col-md-12" >
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                      </ul>
                  </div>
              @endif
              <div class="form-group" >
                <label for="">Tến sản phẩm</label>
                <input type="text" class="form-control" id="" placeholder="" name="name">
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
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Bộ Sưu Tập</label>
                    <select class="form-control" name="collection_id" id="">
                      @foreach ($collection as $value)
                      <option value="{{ $value->id }}">{{ $value->name }}</option>
                      @endforeach                
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="">Thương hiệu</label>
                    <select class="form-control" name="trademark_id" id="">
                      @foreach ($trademarks as $trademark)
                      <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
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
                <div class="col-md-10">
                  <label for="">Size</label>

                </div>
                <div id="btn_create" class="btn btn-info" class="col-md-1">
                  Thêm
                </div>
                <div style="margin-left: 2%"  id="btn_delete" class="btn btn-danger" class="col-md-1">
                  xóa
                </div>
                
                <div class="col-md-1">
                    <input type="text" name="size[]" class="form-control">
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
              @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
              @enderror  
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
@endsection --}}

<div class="modal fade" id="create">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Extra Large Modal</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <h3 align="center">DevMind - Education And Technology Group</h3>
          <h3 align="center">Add New Users</h3>
          <hr>
        {{--   <form action="#" id="frm">
            <input type="text" name="name">
            <button type="submit">Ok</button>
          </form> --}}
          <form id="frm" action="{{ route('product.store') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="row">
              <div class="col-md-12" >
                   {{--  @if ($errors->any())
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
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Danh mục</label>
                              <select class="form-control" name="category_id" id="">
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach                
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Bộ Sưu Tập</label>
                              <select class="form-control" name="collection_id" id="">
                                @foreach ($collection as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach                
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="">Thương hiệu</label>
                              <select class="form-control" name="trademark_id" id="">
                                @foreach ($trademarks as $trademark)
                                <option value="{{ $trademark->id }}">{{ $trademark->name }}</option>
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
                          <div class="col-md-10">
                            <label for="">Size</label>

                          </div>
                          <div id="btn_create" class="btn btn-info" class="col-md-1">
                            Thêm
                          </div>
                          <div style="margin-left: 2%"  id="btn_delete" class="btn btn-danger" class="col-md-1">
                            xóa
                          </div>

                          <div class="col-md-1">
                            <input type="text" name="size[]" class="form-control">
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
                        @error('content')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror  
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
                        <div class="">
                          <button id="submit" type="submit" class="btn btn-primary">asdasd</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  {{-- <div id="create" type="button" type="submit" class="btn btn-primary">Save changes</div> --}}
                </div>
              </div>
              <!-- /.modal-content -->
            </div>