@extends('admin.layout.headerend')

@section('title', 'User')

@section('body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper add-user-form" id="adduser">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Add</li>
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
              <h3 class="card-title">User</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('admin.user')}}" method="post" enctype="multipart/form-data" style="width: 50%; margin: 0 auto;">
                <div class="form-group">
                  <label for="name">Username</label>
                  @csrf
                  <input type="text" name="name" placeholder="Name" id="name" class="form-control" required autofocus>
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" placeholder="Email" class="form-control" required >
                  @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control" require/>
                  @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                </div>
                <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.user')}}" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Create new Account" class="btn btn-success float-right">
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
   <div class="content-wrapper edit-user-form" id="edituser">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Edit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Edit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!-- kiểm tra biến có tồn tại hay không -->
    @if(isset($user))
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              @if($user -> role == '1')
              <h3 class="card-title">User</h3>
              @else
              <h3 class="card-title">Admin</h3>
              @endif
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <!-- nếu có link vào form thì đường dẫn phải trùng route^!^ -->
              <form action="{{url('admin/useredit/'.$user->id)}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label for="name">Name</label>
                  @csrf
                  <input type="text" name="name" placeholder="Name" id="name" class="form-control"
                  value="{{$user->name}}" required autofocus>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" id="email" placeholder="Email" class="form-control"
                  value="{{$user->email}}" required >
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" placeholder="Password" class="form-control" 
                  value="{{$user->password}}"require/>
                </div>
                <div class="row">
                <div class="col-12">
                  <a href="{{route('admin.user')}}" class="btn btn-secondary">Cancel</a>
                  <input type="submit" value="Update User" class="btn btn-success float-right">
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
  const adduser = document.querySelector('.add-user-form');
  const edituser = document.querySelector('.edit-user-form');
  $link = window.location.href;
  if($link.indexOf("useradd") !== -1){
    adduser.style.display = 'block';
    edituser.style.display = 'none';
    edituser.remove();
  }
  else{
    edituser.style.display = 'block';
    adduser.style.display = 'none';
  }
</script>
@endsection