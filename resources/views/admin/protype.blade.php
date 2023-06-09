
@extends('admin.layout.headerend')

@section('title', 'Protype')

@section('body')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Protypes</h1>
            <a href="{{route('admin/protypeadd')}}"><button class="btn btn-success btn-sm"  onclick="showAddForm()">
              <i class="far fa-add"></i>
              Add
            </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Protypes</li>
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
          <h3 class="card-title">Protypes</h3>

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
                      <th style="width: 25%">
                          Protype_id
                      </th>
                      <th style="width: 30%" class="text-center">
                          Protype_Name
                      </th>
                      <th style="width: 20%; " class="text-center">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($protypeList as $value):
                
                  <tr>
                      <td> {{$value->id}}</td>
                      <td> {{$value->type_name}}</td>
                      <td class="project-actions text-center ">
                         <a href="{{url('admin/protypeedit/'.$value->id)}}"><button class="btn btn-info btn-sm p1"  onclick="showEditForm()">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button></a>
                          <a href="{{url('admin/deleteprotype/'.$value->id)}}" class="btn btn-danger btn-sm p1" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          {{$protypeList->links('pagination::bootstrap-4')}} 
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
@endsection