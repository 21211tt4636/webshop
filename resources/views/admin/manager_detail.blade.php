@extends('admin.layout.headerend')

@section('title', 'Product Detail Manager')

@section('body')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container py-4 my-4 mx-auto d-flex flex-column ">
        <div class="header">
            <div class="row r1 justify-content-around">
                <div class="col-md-9 abc">
                    <h1 style="color:red;"> Manager Detail </h1>
                </div>
                <a href="{{route('viewadd_detail',['id'=>$product->id])}}" class="text-right">
                    <button class="btn btn-primary btn-sm"  onclick="showAddForm()">
                    <i class="fas fa-plus"></i>  Add
                    </button>
                </a>
            </div>
            <div class="row justify-content-center">
                <div class="name-product text-center">
                    <div ><h6 style="color:red;"> Product Name:</h6>  {{$product->name}}</div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr class="text-center">
                      <th style="width: 25%">
                          Size
                      </th>
                      <th style="width: 30%" >
                          Color
                      </th>
                      <th style="width: 20%; " >
                      Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                @foreach($detail as $value)
                  <tr>
                      <td>{{$value->size}}</td>
                      <td>{{$value->color}} </td>
                      <td class="project-actions text-center ">
                         <!-- <a href="{{url('admin/update_detail/'.$value->id)}}"><button class="btn btn-info btn-sm p1"  onclick="showEditForm()">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button></a> -->
                          <a href="{{url('admin/delete_detail/'.$value->id)}}" class="btn btn-danger btn-sm p1" >
                              <i class="fas fa-trash">
                              </i>
                              Delete
                          </a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
        </div>
    </div>
 </div>

 @endsection