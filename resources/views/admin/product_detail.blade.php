@extends('admin.layout.headerend')

@section('title', 'Product Detail')

@section('body')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <div class="container py-4 my-4 mx-auto d-flex flex-column ">
        <div class="header">
            <div class="row r1">
                <div class="col-md-9 abc">
                    <h1 style="color:red;">Detail Product</h1>
                </div>
                <p class="text-right para">Total:  <span class="text-warning" >{{count($comments)}}</span> Review</p>
            </div>
        </div>
        <div class="container-body mt-4">
            <div class="row r3">
                <div class="col-md-5 p-0 klo">
                    <ul>
                        <li>Name: {{$product->name}}</li>
                        <li>Price: {{number_format($product->price * ((100 - $product->discount)/100)) }} VND</li>
                        <li>Giảm Giá: {{$product->discount}}</li>
                        <li>Số Lượng: {{$product->qty}}</li>
                        <li>Chi Tiết: {{$product->description}}</li>
                        <li>Created_at : {{$product->created_at}}</li>
                    </ul>
                </div>
                <div class="col-md-7" style="margin: 0 auto;justify-content: center;display: flex;"> 
                    <img src="{{asset('front/img/'.$product->image)}}" width="400px" height="380px">
                 </div>
            </div>
        </div>
        <div class="footer d-flex flex-column mt-5">
            <div class="row r4">
                <div class="col-md-2 btn btn-warning "><a href="{{url('admin/productedit/'.$product->id)}}">Update</a></div>
                <div class="col-md-2 btn btn-warning offset-md-4"><a href="{{route('manager_detail',['id' => $product->id])}}">Manager Detail</a></div>
            </div>
        </div>
    </div>
 </div>

 @endsection