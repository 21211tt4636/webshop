
@extends('admin.layout.headerend')

@section('title', 'Product')

@section('body')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin</h1>
            <a href="{{route('admin/productadd')}}"><button class="btn btn-success btn-sm"  onclick="showAddForm()">
              <i class="far fa-add"></i>
              Add
            </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Admin</li>
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
          <h3 class="card-title">Product</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 5%">
                          Product_id
                      </th>
                      <th style="width: 20%" class="text-center">
                          Image
                      </th>
                      <th style="width: 20%" class="text-center">
                          Productname
                      </th>
                      <th style="width: 5%" class="text-center">
                          Số Lượng
                      </th>
                      <th style="width: 10%" class="text-center">
                          Loại
                      </th>
                      <th style="width: 20%" class="text-center">
                          Descriptions
                      </th>
                      <th style="width: 20%; " class="text-center">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($productList as $value):
                
                  <tr>
                      <td> {{$value->id}}</td>
                      <td style="width:200px;">  <img src="{{asset('front/img/'.$value->image)}}" alt="" style="width:200px; height: 200px;" ></td>
                      <td> {{substr($value->name,0,50)}}</td>
                      <td class="text-center"> {{$value->qty}}</td>
                      <td> {{$value->type_name}}</td>
                      <td> {{substr($value->description,0,100)}}</td>
                      <td class="project-actions text-center ">
                         <a href="{{route('view_productdetail',['id' => $value->id])}}"><button class="btn btn-info btn-sm p1"  >
                              <i class="fas fa-eye">
                              </i>
                              View Detail
                          </button></a>
                          <!-- <a href="" class="btn btn-danger btn-sm p1" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a> -->
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          {{$productList->appends(request()->query())->links('pagination::bootstrap-4')}}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
@endsection