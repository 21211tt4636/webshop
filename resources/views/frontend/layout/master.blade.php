<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>@yield('title') | Electro - HTML Ecommerce Template</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700 " rel="stylesheet">

		<!-- Bootstrap -->
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
		<link type="text/css" rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}"/>
		

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('front/css/slick.css')}} "/>
		<link type="text/css" rel="stylesheet" href="{{asset('front/css/slick-theme.css')}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset('front/css/nouislider.min.css')}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset('front/css/font-awesome.min.css')}}">



		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('front/css/styles.css')}}"/>
		<link rel="stylesheet" href="{{ asset('front/css/sanpham.css')}}">
		<link type="text/css" rel="stylesheet" href="{{ asset('front/css/donhang.css')}} "/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			.zoomImg{
				width: 600px!important;
				height: 600px!important;
			}
			.products-tabs .product-img>img{
				width: 263px!important;
				height: 263px!important;
			}
		</style>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
					</ul>
					<ul class="header-links pull-right">
					@guest
						<li><a href="{{ route('login') }}">Login</a></li>
					@else
					<div class="content-profile" style="display:flex; justify-content:center;">
						<div class="dropdown" style="cursor: pointer;">
								<a class="dropdown-toggle text-primary" data-toggle="dropdown" aria-expanded="true">
									<span>My Account</span>
								</a>
								<div class="cart-dropdown" style="width: 150px;">
									<div class="profile-list">
									@if (session('id_user'))
									<a href="{{ url('profile/'.session('id_user')) }}">View Account</a><br>
									@endif
										<a href="{{ route('signout') }}">Logout  <i class="fa fa-arrow-circle-right"></i></a>
								</div>
							</div>
						</div>
					</div>
						
					@endguest
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" class="logo">
									<img src="front/img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form action="{{route('search')}}" style="display: flex;">
								@csrf
									<select class="input-select" name="search">
										<option value="0">All Categories</option>
										@foreach($typeList as $value)
											<option value="{{$value->id}}">{{$value->type_name}}</option>
										@endforeach
										<!-- <option value="0">All Categories</option>
										<option value="1">Category 01</option>
										<option value="1">Category 02</option> -->
									</select>
									<input class="input" name="searchProduct" placeholder="Search here" required>
									@if ($errors->has('searchProduct'))
										<span class="text-danger">{{ $errors->first('searchProduct') }}</span>
									@endif
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div class="dropdown">
									<a  class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@foreach(Cart::content() as $item)
											<div class="product-widget" >
												<div class="product-img">
													<img src="{{asset('front/img/'.$item->options->image)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($item->name,0,50)}}</a></h3>
													@if($item->discount == 0)
													<h4 class="product-price"><span class="qty">{{$item->qty}}x</span>{{number_format($item->price * $item->qty)}}</h4>
													@else
													<h4 class="product-price"><span class="qty">{{$item->qty}}x</span>{{number_format(($item->price * ((100 - $item->discount)/100)) * $item->qty)}}</h4>
													@endif
												</div>
												<button class="delete"  ><i class="fa fa-close"></i></button>
											</div>
											@endforeach
										</div>
									</div>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">{{Cart::content()->count()}}</div>
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											@foreach(Cart::content() as $item)
											<div class="product-widget" data-rowid="{{ $item->rowId}}">
												<div class="product-img">
													<img src="{{asset('front/img/'.$item->options->image)}}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($item->name,0,50)}}</a></h3>
													@if($item->discount == 0)
													<h4 class="product-price"><span class="qty"  >{{$item->qty}}x</span>{{number_format($item->price * $item->qty)}}</h4>
													@else
													<h4 class="product-price"><span class="qty" >{{$item->qty}}x</span>{{number_format(($item->price * ((100 - $item->discount)/100)) * $item->qty)}}</h4>
													@endif
												</div>
												<button class="delete" onclick="removeCart('{{$item->rowId}}')"><i class="fa fa-close"></i></button>
											</div>
											@endforeach
										</div>
										<div class="cart-summary">
											<small>{{Cart::count()}} Item(s) selected</small>
											<h5>SUBTOTAL: {{Cart::total()}} VND</h5>
										</div>
										<div class="cart-btns">
											<a href="{{ url('cart') }}"><i class="fa fa-arrow-circle-left"></i>  View Cart</a>
											<a href="{{ url('checkout') }}">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

        <!-- difference here -->
        @yield('body')
        <!-- difference here -->

        <!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form action="{{ route('createAccount') }}" method="POST">
								@csrf
								<input class="input" type="email" name="email" placeholder="Enter Your Email" required>
								@if ($errors->has('email_signup'))
									<span class="text-danger">{{ $errors->first('email_signup') }}</span>
								@endif
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

        <!-- FOOTER -->
        <footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
								@foreach($typeList as $value)
								<li ><a href="#">{{$value->type_name}}</a></li>
								@endforeach
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{asset('front/js/jquery.min.js')}}"></script>
		<script src="{{asset('front/js/bootstrap.min.js')}}"></script>
		<script src="{{asset('front/js/slick.min.js')}}"></script>
		<script src="{{asset('front/js/nouislider.min.js')}}"></script>
		<script src="{{asset('front/js/jquery.zoom.min.js')}}"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
		<script>

		function submitForm() {
			let currentUrl = new URL(window.location.href);
			const form = document.getElementById('store-form');
			const select = document.querySelector('select[name="sort_by"]');
			const selectedValue = select.options[select.selectedIndex].value;
			currentUrl.searchParams.set('sort_by', selectedValue);
			form.action = currentUrl.toString();
			form.submit();
		} 	
		
		// if(window.location.href.includes("type_id"))
		const urlParams = new URLSearchParams(window.location.search);
		const typeId = urlParams.get('type_id');
		if(typeId != '' && window.location.href.includes("type_id")){
			document.querySelector('.category').style.display = "none";
		}
					
		</script>
		<script src="{{asset('front/js/main.js')}}"></script>
	</body>
</html>
