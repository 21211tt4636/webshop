@extends('admin.layout.headerend')

@section('title', 'Add Detail')

@section('body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper add-manu-form" id="addmanu">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detail </li>
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
              <h3 class="card-title">Detail</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <form action="{{route('add_detail',['id'=>$product->id])}}" method="post" enctype="multipart/form-data" style="width: 50%; margin: 0 auto;">
                <div class="form-group">
                  <label for="name">Detail Product</label>
                  @csrf
                  <input type="hidden" name="product_id" value="{{ $product->id}}">
                  <input type="number" name="size"  id="size" class="form-control" min=37 max=43 value=39 required autofocus>
                  <input type="text" name="color" placeholder="Color" id="color" class="form-control" required autofocus>
                  @if ($errors->has('color'))
                      <span class="text-danger">{{ $errors->first('color') }}</span>
                  @endif
                </div>
                <div class="row">
                <div class="col-12">
                  <a href="{{url('admin/product_detail/'.$product->id.'/manager')}}" class="btn btn-secondary">Cancel</a>
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
 
  <!-- /.content-wrapper -->
 
@endsection