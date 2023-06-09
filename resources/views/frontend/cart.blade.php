@extends('frontend.layout.master')

@section('title', 'Cart')

@section('body')
        <nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="{{url('/')}}">Home</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row giohang" >
                    @if(Cart::count() > 0)
                        @foreach(Cart::content() as $item)
                        <div class="col-12 sanpham"  data-rowid="{{ $item->rowId}}">
                            <div class="col-12 sanpham_ct">
                                <div  class="sanpham_link">
                                    <a href="{{ url('product/'.$item->id) }}" class="sanpham_image">
                                        <img src="{{asset('front/img/'.$item->options->image)}}" alt="SP" style="position: absolute;height: 100%;width: 100%; inset: 0px;color: transparent;">
                                    </a>
                                    <div class="sanpham_name">
                                        <h2><a href="{{ url('product/'.$item->id) }}">{{substr($item->name,0,50)}}</a></h2>
                                        <div class="product-label" style="display: flex;justify-content: space-around;">
                                            <span class="sale">-{{$item->options->discount}}%</span>
                                            @if($item->feature == '1')
                                            <span class="new">NEW</span>
                                            @endif
                                            <label >
                                            <div class="qty-label " style="display: flex; align-items: center;">
                                                <div class="soluong">Số Lượng: </div>
                                                <div class="input-number" style="width: 100px; margin-left: 10px;">
                                                    <input type="number" name="quantity" value="{{$item->qty}}" data-rowid="{{ $item->rowId}}" max=50 required>
                                                    <span class="qty-up">+</span>
                                                    <span class="qty-down">-</span>
                                                </div>
                                            </div>
                                        </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="sanpham_price">
                                    <h4 class="product-price">{{number_format($item->price)}} VND<br></h4>
                                    <br>
                                    <a href="" onclick="removeCart('{{$item->rowId}}')" class="xoasanpham">Xóa khỏi giỏ hàng </a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <h2> Không Tồn Tại Sản phẩm trong giỏ hàng!!</h2>
                    @endif
				<!-- /row -->
                </div>
			</div>
            <div class="back-thanhtoan" style="text-align:center; margin-bottom: 10px;" >
		          <a href="{{ URL::previous() }}"><button class="add-to-cart-btn"><i class="fa fa-backward"></i> Quay lại</button></a>
		          <a href="{{ url('checkout') }}"><button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> Thanh Toán</button></a>
		    </div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection