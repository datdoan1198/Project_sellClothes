 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
      <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}"
           alt="AdminLTE Logo"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="{{ route('home') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Trang chủ
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
         
          <li class="nav-item has-treeview  @if (route('user.index') == url()->current()) {{'menu-open'}} @endif" style="display: @if (Auth::user()->role == 1  ){{'block'}}@else{{ 'none'  }}@endif ">
            <a href="" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lí người dùng
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách người dùng</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm người dùng</p>
                </a>
              </li>
            </ul>
          </li>  {{-- expr --}}
          
          
          <li class="nav-item has-treeview @if (route('product.index') == url()->current()) {{'menu-open'}} @endif">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lí sản phẩm
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('product.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
             {{--  <li class="nav-item">
                <a href="{{ route('product.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm sản phẩm</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item has-treeview @if (route('category.index') == url()->current()) {{'menu-open'}} @endif" style="display: @if (Auth::user()->role == 1  ){{'block'}}@else{{ 'none'  }}@endif ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt" ></i>
              <p>
                Quản lí danh mục
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('category.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách danh mục</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('category.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          
          <li class="nav-item has-treeview @if (route('collection.index') == url()->current()) {{'menu-open'}} @endif" style="display: @if (Auth::user()->role == 1  ){{'block'}}@else{{ 'none'  }}@endif ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lí bộ sưu tập
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('collection.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách bộ sưu tập</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('collection.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview @if (route('trademark.index') == url()->current()) {{'menu-open'}} @endif" style="display: @if (Auth::user()->role == 1  ){{'block'}}@else{{ 'none'  }}@endif ">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lí thương hiệu
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('trademark.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách thương hiệu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('trademark.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview @if (route('order.index') == url()->current()) {{'menu-open'}} @endif" >
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lí order
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('order.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách orders</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li> --}}
            </ul>
          </li>

          <li class="nav-item has-treeview @if (route('warehouse.index') == url()->current()) {{'menu-open'}} @endif" >
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Quản lí kho
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('warehouse.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Danh sách sản phẩm</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Thêm danh mục</p>
                </a>
              </li> --}}
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>