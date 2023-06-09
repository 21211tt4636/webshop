@extends('frontend.layout.master')

@section('title', 'Home')

@section('body')

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						@foreach($typeList as $value)
						<li ><a href="{{route('viewStoreOfType',['id'=>$value->id])}}" id="type-id-link">{{$value->type_name}}</a></li>
						@endforeach
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('front/img/hinh4.png')}} " alt="" >
							</div>
							<div class="shop-body">
								<h3>Laptop<br>Collection</h3>
								<a href="{{route('viewstore')}}" id="type-id-link" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('front/img/hinh2.png')}}" alt="">
							</div>
							<div class="shop-body">
								<h3>Accessories<br>Collection</h3>
								<a href="{{route('viewstore')}}" id="type-id-link" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->

					<!-- shop -->
					<div class="col-md-4 col-xs-6">
						<div class="shop">
							<div class="shop-img">
								<img src="{{asset('front/img/hinh3.png')}}" alt="">
							</div>
							<div class="shop-body">
								<h3>Cameras<br>Collection</h3>
								<a href="{{route('viewstore')}}" id="type-id-link" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
							</div>
						</div>
					</div>
					<!-- /shop -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<!-- <li class="active"><a data-toggle="tab" href="#tab1">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab3">Cameras</a></li> -->
									<!-- <li><a data-toggle="tab" href="#tab1">Accessories</a></li>  -->
									<li class="active"><a data-toggle="tab" href="#tab0">All Products</a></li>
									@if(isset($type))
										@foreach($type as $value)
											<li ><a data-toggle="tab" id="tab-{{$value->id}}"  href="#tab{{$value->id}}">{{$value->type_name}}</a></li>
										@endforeach
									@endif
									
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab0" class="tab-pane active">
									<div class="products-slick"  data-nav="#slick-nav-1">
										@foreach($products as $item)
										@include('frontend/layout/viewproduct')
										@endforeach
									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								<!-- tab -->
								<div id="tab1" class="tab-pane ">
									<div class="products-slick"  data-nav="#slick-nav-2">
										@foreach($products1 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								<!-- tab -->
								<div id="tab2" class="tab-pane ">
									<div class="products-slick" data-nav="#slick-nav-3">
										@foreach($products2 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach
									
									</div>
									<div id="slick-nav-3" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->

								<!-- tab -->
								<div id="tab3" class="tab-pane ">
									<div class="products-slick" data-nav="#slick-nav-4">
									
										@foreach($products3 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach
									</div>
									<div id="slick-nav-4" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<div id="hot-deals" class="section" >
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="hot-deal">
							<ul class="hot-deal-countdown">
								<li>
									<div>
										<h3>02</h3>
										<span>Days</span>
									</div>
								</li>
								<li>
									<div>
										<h3>10</h3>
										<span>Hours</span>
									</div>
								</li>
								<li>
									<div>
										<h3>34</h3>
										<span>Mins</span>
									</div>
								</li>
								<li>
									<div>
										<h3>60</h3>
										<span>Secs</span>
									</div>
								</li>
							</ul>
							<h2 class="text-uppercase">hot deal this week</h2>
							<p>New Collection Up to 50% OFF</p>
							<a class="primary-btn cta-btn" href="#">Shop now</a>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">HOT DEAL</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab4">All Product</a></li>
									<li><a data-toggle="tab" href="#tab5">Giày Đi Bộ</a></li>
									<li><a data-toggle="tab" href="#tab6">Giày Chạy Bộ</a></li>
									<li><a data-toggle="tab" href="#tab7">Giày Đá Banh</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab4" class="tab-pane active">
									<div class="products-slick"  data-nav="#slick-nav-5">
										@foreach($products4 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach
									</div>
									<div id="slick-nav-5" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								<!-- tab -->
								<div id="tab5" class="tab-pane ">
									<div class="products-slick"  data-nav="#slick-nav-6">
										@foreach($products5 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach

									</div>
									<div id="slick-nav-6" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								<!-- tab -->
								<div id="tab6" class="tab-pane ">
									<div class="products-slick" data-nav="#slick-nav-7">
										@foreach($products6 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach
									
									</div>
									<div id="slick-nav-7" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->

								<!-- tab -->
								<div id="tab7" class="tab-pane ">
									<div class="products-slick" data-nav="#slick-nav-8">
										@foreach($products7 as $item)
										@include('frontend/layout/viewproduct')
										@endforeach
									</div>
									<div id="slick-nav-8" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
								
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-9" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-9">
							<div>
								@foreach($randomProducts as $value)
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$value->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($value->name,0,40)}}</a></h3>
										<h4 class="product-price">{{number_format($value->price * ((100 - $value->discount)/100)) }} <del class="product-old-price">{{number_format($value->price)}}</del></h4>
									</div>
								</div>
								<!-- /product widget -->
								@endforeach
							</div>

							<div>
							@foreach($randomProducts as $value)
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$value->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($value->name,0,40)}}</a></h3>
										<h4 class="product-price">{{number_format($value->price * ((100 - $value->discount)/100)) }} <del class="product-old-price">{{number_format($value->price)}}</del></h4>
									</div>
								</div>
								<!-- /product widget -->
							@endforeach
							</div>
						</div>
					</div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-10" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-10">
							<div>
							@foreach($randomProducts as $value)
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$value->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($value->name,0,40)}}</a></h3>
										<h4 class="product-price">{{number_format($value->price * ((100 - $value->discount)/100)) }} <del class="product-old-price">{{number_format($value->price)}}</del></h4>
									</div>
									</div>
								<!-- /product widget -->
							@endforeach
							</div>

							<div>
							@foreach($randomProducts as $value)
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$value->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($value->name,0,40)}}</a></h3>
										<h4 class="product-price">{{number_format($value->price * ((100 - $value->discount)/100)) }} <del class="product-old-price">{{number_format($value->price)}}</del></h4>
									</div>
									</div>
								<!-- /product widget -->
							@endforeach
							</div>
						</div>
					</div>

					<div class="clearfix visible-sm visible-xs"></div>

					<div class="col-md-4 col-xs-6">
						<div class="section-title">
							<h4 class="title">Top selling</h4>
							<div class="section-nav">
								<div id="slick-nav-11" class="products-slick-nav"></div>
							</div>
						</div>

						<div class="products-widget-slick" data-nav="#slick-nav-11">
							<div>
							@foreach($randomProducts as $value)
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$value->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($value->name,0,40)}}</a></h3>
										<h4 class="product-price">{{number_format($value->price * ((100 - $value->discount)/100)) }} <del class="product-old-price">{{number_format($value->price)}}</del></h4>
									</div>
									</div>
								<!-- /product widget -->
							@endforeach
							</div>

							<div>
							@foreach($randomProducts as $value)
								<!-- product widget -->
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$value->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($value->name,0,40)}}</a></h3>
										<h4 class="product-price">{{number_format($value->price * ((100 - $value->discount)/100)) }} <del class="product-old-price">{{number_format($value->price)}}</del></h4>
									</div>
									</div>
								<!-- /product widget -->
							@endforeach
							</div>
						</div>
					</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
		

@endsection
	