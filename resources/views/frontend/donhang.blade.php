@extends('frontend.layout.master')

@section('title', 'Blank')

@section('body')
	<!-- SECTION -->
    <div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
                    <div class="box-cart-confirm">
                        <div class="confirm-head">Đặt Hàng Thành Công</div>
                        <div class="confirm-body">
                            <div class="confirm-body-inner ">
                                <p>Cảm ơn bạn đã mua hàng tại Shop cơ hội được phục vụ. Nhân viên Electro sẽ gửi tin nhắn hoặc gọi điện xác nhận đơn hàng cho bạn</p>
                                <h3>Thông tin đặt hàng</h3>
                                <ul>
                                    <li><b>Recipient's name: </b> {{ $order->firstname." ".$order->lastname}}</li>
                                    <li><b>Email: </b> {{$order->email}}</li>
                                    <li><b>Address: </b>{{$order->address}}</li>
                                    <li><b>City/Province: </b> {{$order->city}}</li>
                                    <!-- <li><b>Country: </b></li> -->
                                    <li><b>Telephone: </b>{{$order->phone}}</li>
                                    <!-- <li><b>Hình thức thanh toán: </b></li> -->
                                </ul>
                                <p class="hotline">
                                    Hỗ trợ vui lòng gọi
                                    <strong>1800.6229</strong>
                                </p>
                                <h3>Sản Phẩm Bạn Đã Mua</h3>
                                    
                                    @foreach($products as $item)   
                                    <div class="col-12 sanpham">
                                        <div class="col-12 sanpham_ct">
                                            <div class="sanpham_detail" style="width: 65%; display:flex;">
                                                <img src="{{asset('front/img/'.$item->image)}}" alt="" style="height: 80px;width: 80px; inset: 0px;color: transparent;">
                                                <div  class="sanpham_link">
                                                    <div class="sanpham_name">
                                                        <p><a href="{{ url('product/'.$item->id) }}"></a>{{substr($item->name,0,30)}}<p>
                                                        <h6 class="soluong">Số Lượng: {{$item->qty}}</h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="lienhe" style="width: 25%">
                                        <p>LH: 1800 6229</p>
                                    </div>
                            </div>
                                        
                                    
                                <div class="order-col">
                                    <div  class="order-total" ><p style="margin: 0px; padding: 0px;">Thành Tiền:  VND</p></div>
                                </div>
                                <div class="chonchucnang" style="text-align:center;">
                                    <a href="{{ URL::previous() }}"><button class="add-to-cart-btn"><i class="fa fa-backward"></i> Quay lại</button></a>
		                            <a href="{{url('checkout/deleteorder/'.$order->id)}}"><button class="add-to-cart-btn"><i class="fa fa-trash"></i></i> Hủy đơn hàng</button></a>
                                    <a class="buy-more" href="{{ url('store')}}">Mua thêm sản phẩm</a>
                                </div>
                                                                                
                            </div>
                        </div>
                    </div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
        @if (Session::has('Success'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('Success') }}
            </div>
         @endif

@endsection