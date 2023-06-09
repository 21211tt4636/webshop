@extends('admin.layout.headerend')

@section('title', 'Manufactures')

@section('body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper add-manu-form" id="addmanu">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manufactures Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manufactures Add</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Manufactures</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('admin.manu')}}" method="post" enctype="multipart/form-data" style="width: 50%; margin: 0 auto;">
                <div class="form-group">
                  <label for="name">Manufacture Name</label>
                  @csrf
                  <input type="text" name="name" placeholder="Name" id="name" class="form-control" required autofocus>
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.manu')}}" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Create" class="btn btn-success float-right">
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper edit-manu-form" id="editmanu">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manu Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manu Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    
    <!-- kiểm tra biến có tồn tại hay không -->
    @if(isset($manu))
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Admin</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- nếu có link vào form thì đường dẫn phải trùng route^!^ -->
              <form action="{{url('admin/manuedit/'.$manu->id)}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="id">Manu_id</label>
                  <input type="text" name="id" id="id" placeholder="Manu_id" class="form-control" disabled
                  value="{{$manu->id}}" required >
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  @csrf
                  <input type="text" name="name" placeholder="Name" id="name" class="form-control"
                  value="{{$manu->manu_name}}" required autofocus>
                </div>
                
                <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.manu')}}" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Update " class="btn btn-success float-right">
                </div>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        
      </div>
      
    </section>
    @endif
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
  const addmanu = document.querySelector('.add-manu-form');
  const editmanu = document.querySelector('.edit-manu-form');
  $link = window.location.href;
  if($link.indexOf("manuadd") !== -1){
    addmanu.style.display = 'block';
    editmanu.style.display = 'none';
    editmanu.remove();
  }
  else{
    editmanu.style.display = 'block';
    addmanu.style.display = 'none';
  }
</script>
@endsection