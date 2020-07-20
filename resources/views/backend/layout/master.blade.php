<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Blank Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
   <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('backend.layout.header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('backend.layout.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Title</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          @yield('content')
          {{-- @include('backend.product.create') --}}
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          Footer
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('backend.layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('backend/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('backend/dist/js/demo.js') }}"></script>
<script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
<script>
  $(function(){ 
    // $('#content').summernote('editor.pasteHTML',$('#content').data('content'));
      $('#content').summernote({
      height: 300,                 // set editor height
      minHeight: null,             // set minimum height of editor
      maxHeight: null,             // set maximum height of editor
      focus: true                  // set focus to editable area after initializing summernote
    }); 
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });



  });
</script>

<script>  
    $('document').ready(function(){
        var size =1;
        $('#btn_create').click(function(e){
          e.preventDefault();
          $('#apsection').append("<div id = '"+ size +"' class='col-md-1'> <input type='text' name='size[]' class='form-control'></div>")
          size++
        })
        $('#btn_delete').click(function(e){
          size--;
          $('#'+size).remove();

        })
        var index = 1;
        $('#a').click(function(e){
          e.preventDefault();
          $('#aaa').append("<div id='"+ index+"' class='col-md-6'><div class='form-group'><div class='row'><div class='col-md-3'><input type='text' name='information_product[" + index +"][key]' class='form-control' ></div><div class='col-md-9'><input type='text' name='information_product["+ index +"][value]'  class='form-control'></div></div></div></div>");
          index++;
        });

        $('#b').click(function(){
          index--
          $('#'+index).remove();

        });
        // Add create
        $('.create_modal').on('click',function(){
          $('#create').modal('show');
          $('#frm').show();
        })


        
        // $('#frm').on('submit',function(){
    
        //   // var formData = new FormData($('#frm')[0]);
        //   // console.log(formData);
        //   // alert(formData);
        //   $.ajax({
        //     dataType: 'json',
        //     type : 'POST',
        //     url : 'product',
        //     data: {
        //       name : "hello"
        //     },
        //     success : function(data){
        //       alert(data.success);
        //     }
        //     });
        // });
         // $('document').ready(function(){
         //    $( "#category" ).submit(function() {
        
              // var formData = new FormData($('#frm')[0]);
              // console.log(formData);
              // alert(formData);
    //           $.ajax({
    //             type : 'post',
    //             url : 'category',
    //             data: {
    //               name : "hello"
    //             },
    //             success : function(data){
    //               alert(data.success);
    //             }
    //             });
    //         });
    //     });

    });
    
</script>
</body>
</html>
