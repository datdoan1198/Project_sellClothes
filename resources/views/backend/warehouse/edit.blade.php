@extends('backend.layout.master')

@section('content')
<div class="container-fluid">
    <h3 align="center">DevMind - Education And Technology Group</h3>
    <h3 align="center">Add New Users</h3>
    <hr>
    <form action="{{ route('warehouse.update',['warehouse' => $product->id]) }}" id="frm" method="POST" role="form" enctype="multipart/form-data" >
    	{{ csrf_field() }}
        @method('put')
            <div class="form-group" >
                <label for="">Tến Danh mục</label>
                <input type="text" class="form-control" id="" placeholder="" name="name" value="{{ $product['name'] }}" disabled>
            </div>
            <div class="form-group" >
                <label for="">Số lượng</label>
                <input type="text" class="form-control" id="" placeholder="" name="amount" value="{{ $product->amount }}" >
            </div>
            <div class="form-group">
                <label for="">Trạng thái của sản phẩm</label>
                <select class="form-control" name="status" id="">
                  <option value="1" >Hoạt động</option>
                  <option value="0" @if ($product->status == 0)
                    {{ 'selected' }}
                  @endif>không hoạt động</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection