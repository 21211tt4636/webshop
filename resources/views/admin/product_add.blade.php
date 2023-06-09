@extends('admin.layout.headerend')

@section('title', 'Product')

@section('body')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper add-product-form" id="addproduct">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Add</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Admin</li>
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
              <h3 class="card-title">Product</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <!-- route -->
              <form action="{{route('admin.product')}}" method="POST" enctype="multipart/form-data" style="width: 50%; margin: 0 auto;">
                @csrf
                <div class="form-group">
                  <label for="name"> Name</label>
                  <input type="text" name="name" placeholder="Name" id="name" class="form-control" required autofocus>
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                    <label for="inputStatus">Manufactures</label>
                    <select id="inputStatus" class="form-control custom-select" name ="manu_id" >
                    <option selected disabled >Select one</option>
                    @foreach($manu as $value):
                    ?>
                    <option value ="{{ $value->id}}" selected>{{ $value->manu_name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('manu_id'))
                      <span class="text-danger">{{ $errors->first('manu_id') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="inputStatus">Protype</label>
                    <select id="inputStatus" class="form-control custom-select" name ="type_id">
                    <option selected disabled>Select one</option>
                    @foreach($protype as $value):
                    ?>
                    <option value ="{{ $value->id}}" selected>{{ $value->type_name}}</option>
                    @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                      <span class="text-danger">{{ $errors->first('type_id') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="inputName">Quality</label>
                    <input type="number" id="inputqty" placeholder="Quality" class="form-control" min = 0 value="0" name ="qty" required>
                </div>
                <div class="form-group">
                    <label for="inputName">Price</label>
                    <input type="number" id="inputprice" placeholder="Price" class="form-control" min = 0 name ="price" required>
                </div>
                <div class="form-group">
                    <label for="fileToUpload">Image</label>
                    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4" name ="description" required></textarea>
                </div>
                
                <div class="form-group" style="display : flex; justify-content: space-evenly;">
                    <!--sản phẩm nổi bật  -->
                    <div><input type="checkbox"  class="form-control" name ="feature"  required><b>Feature</b></div>
                     <!--giảm giá  -->
                    <div><input type="number"  class="form-control" name ="discount" min = 0 max = 50 required><b>Discount</b></div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <a href="{{url('admin/product')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Create" class="btn btn-success float-right">
                    </div>
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
  <div class="content-wrapper edit-product-form" id="editproduct">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Products Update</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Admin</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    @if(isset($product))
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Product</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
                <!-- route -->
              <form action="{{url('admin/productedit/'.$product->id)}}" method="POST" enctype="multipart/form-data" style="width: 50%; margin: 0 auto;">
                @csrf
                <div class="form-group">
                  <label for="name"> Name</label>
                  <input type="text" name="name" placeholder="Name" id="name" class="form-control" value="{{$product->name}}" required autofocus>
                  @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                </div>
                <div class="form-group">
                    <label for="inputStatus">Manufactures</label>
                    <select id="inputStatus" class="form-control custom-select" name ="manu_id" >
                    <option selected disabled >Select one</option>
                    @foreach($manu as $value)
                      @if($value->id == $product->manu_id)
                        <option selected value ="{{ $value->id}}">{{$value->manu_name}}</option>
                      @else
                        <option value ="{{ $value->id}}">{{$value->manu_name}}</option>
                      @endif
                    @endforeach
                    </select>
                    @if ($errors->has('manu_id'))
                      <span class="text-danger">{{ $errors->first('manu_id') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="inputStatus">Protype</label>
                    <select id="inputStatus" class="form-control custom-select" name ="type_id">
                    <option selected disabled>Select one</option>
                    @foreach($protype as $value)
                      @if($value->id == $product->type_id)
                        <option selected value ="{{ $value->id}}">{{$value->type_name}}</option>
                      @else
                        <option value ="{{ $value->id}}">{{$value->type_name}}</option>
                      @endif
                    @endforeach
                    </select>
                    @if ($errors->has('type_id'))
                      <span class="text-danger">{{ $errors->first('type_id') }}</span>
                     @endif
                </div>
                <div class="form-group">
                    <label for="inputName">Quality</label>
                    <input type="number" id="inputqty" placeholder="Quality" class="form-control" min = 0 value="0" name ="qty" value="{{$product->qty}}" required>
                </div>
                <div class="form-group">
                    <label for="inputName">Price</label>
                    <input type="number" id="inputprice" placeholder="Price" class="form-control" min = 0 name ="price" value="{{$product->price}}" required>
                </div>
                <div class="form-group">
                    <label for="fileToUpload">Image</label>
                    <input type="file" name="fileToUpload" id="fileload" class="form-control">
                    <div id="image-preview">
                      <img src="{{asset('front/img/'.$product->image)}}" alt="" style="width:100px; height: 100px;">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputDescription">Description</label>
                    <textarea id="inputDescription" class="form-control" rows="4" name ="description"  required>{{$product->description}}</textarea>
                </div>
                
                <div class="form-group" style="display : flex; justify-content: space-evenly;">
                    <!--sản phẩm nổi bật  -->
                    @if($product -> feature == 0)
                    <div><input type="checkbox" checked class="form-control" name ="feature"  required><b>Feature</b></div>
                     <!--giảm giá  -->
                     @else
                     <div><input type="checkbox" class="form-control" name ="feature"  required><b>Feature</b></div>
                     @endif
                    <div><input type="number"  class="form-control" name ="discount" min = 0 max = 50 value="{{$product->discount}}" required><b>Discount</b></div>
                </div>
                <div class="row">
                    <div class="col-12">
                    <a href="{{url('admin/product')}}" class="btn btn-secondary">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-success float-right">
                    </div>
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
  const addproduct = document.querySelector('.add-product-form');
  const editproduct = document.querySelector('.edit-product-form');
  $link = window.location.href;
  if($link.indexOf("productadd") !== -1){
    addproduct.style.display = 'block';
    editproduct.style.display = 'none';
    editproduct.remove();
  }
  else{
    editproduct.style.display = 'block';
    addproduct.style.display = 'none';
  }
</script>
@endsection