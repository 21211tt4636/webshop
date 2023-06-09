
@extends('admin.layout.headerend')

@section('title', 'User')

@section('body')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User</h1>
            <a href="{{route('admin/useradd')}}"><button class="btn btn-success btn-sm"  onclick="showAddForm()">
              <i class="far fa-add"></i>
              Add
            </button></a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
          <h3 class="card-title">User</h3>

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
                          Username
                      </th>
                      <th style="width: 30%" class="text-center">
                          Email
                      </th>
                      <th style="width: 15%" class="text-center">
                          Role
                      </th>
                      <th style="width: 20%; " class="text-center">
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($userList as $value):
                
                  <tr>
                      <td> {{$value->name}}</td>
                      <td> {{$value->email}}</td>
                      <td>
                      @if($value->role == '1')
                        {{ 'User' }}
                      @else
                         {{ 'Admin' }}
                      @endif
                      </td>
                      <td class="project-actions text-center ">
                         <a href="{{url('admin/useredit/'.$value->id)}}"><button class="btn btn-info btn-sm p1"  onclick="showEditForm()">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button></a>
                          <a href="{{url('admin/delete/'.$value->id)}}" class="btn btn-danger btn-sm p1" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                @endforeach
              </tbody>
          </table>
          {{$userList->appends(request()->query())->links('pagination::bootstrap-4')}} 
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  
@endsection