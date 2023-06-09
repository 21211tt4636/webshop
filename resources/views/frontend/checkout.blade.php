@extends('frontend.layout.master')

@section('title', 'Checkout')

@section('body')

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
					<li class="active"><a href="{{url('/')}}">Home</a></li>
						@foreach($typeList as $value)
						<li ><a href="{{route('viewStoreOfType',['id'=>$value->id])}}">{{$value->type_name}}</a></li>
						@endforeach
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Regular Page</h3>
						<ul class="breadcrumb-tree">
							<li><a href="{{url('/')}}">Home</a></li>
							<li class="active">Blank</li>
						</ul>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					@if(Cart::count() > 0)
					<form action="" method="post" class="checkout-form">
						<div class="col-md-7">
							<!-- Billing Details -->
							<div class="billing-details">
									@csrf
									<div class="section-title">
										<h3 class="title">Billing address</h3>
									</div>
									@if(session('id_user'))
									<div class="form-group">
										<input class="input" type="hidden" name="iduser" value="{{session('id_user')}}" required >
									</div>
									@else
									<div class="form-group">
										<input class="input" type="hidden" name="iduser" value="0" required>
									</div>
									@endif
									<div class="form-group">
										<input class="input" type="text" name="firstname" placeholder="First Name" required>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="lastname" placeholder="Last Name" required>
									</div>
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email" required>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="address" placeholder="Address" required>
									</div>
									<div class="form-group">
										<input class="input" type="text" name="city" placeholder="City" required>
									</div>
									<!-- <div class="form-group">
										<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
									</div> -->
									<div class="form-group">
										<input class="input" type="tel" name="phone" placeholder="Telephone">
									</div>
									<div class="form-group">
										<div class="input-checkbox">
											<input type="checkbox" id="create-account">
											<label for="create-account">
												<span></span>
												Create Account?
											</label>
											<div class="caption">
												<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt.</p>
												<input class="input" type="password" name="password" placeholder="Enter Your Password">
											</div>
										</div>
									</div>
							</div>
							<!-- /Billing Details -->

							<!-- Shiping Details -->
							<!-- <div class="shiping-details">
								<div class="section-title">
									<h3 class="title">Shiping address</h3>
								</div>
								<div class="input-checkbox">
									<input type="checkbox" id="shiping-address">
									<label for="shiping-address">
										<span></span>
										Ship to a diffrent address?
									</label>
									<div class="caption">
										<div class="form-group">
											<input class="input" type="text" name="first-name" placeholder="First Name">
										</div>
										<div class="form-group">
											<input class="input" type="text" name="last-name" placeholder="Last Name">
										</div>
										<div class="form-group">
											<input class="input" type="email" name="email" placeholder="Email">
										</div>
										<div class="form-group">
											<input class="input" type="text" name="address" placeholder="Address">
										</div>
										<div class="form-group">
											<input class="input" type="text" name="city" placeholder="City">
										</div>
										<div class="form-group">
											<input class="input" type="text" name="country" placeholder="Country">
										</div>
										<div class="form-group">
											<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
										</div>
										<div class="form-group">
											<input class="input" type="tel" name="tel" placeholder="Telephone">
										</div>
									</div>
								</div>
							</div> -->
							<!-- /Shiping Details -->

							<!-- Order notes -->
							<div class="order-notes">
								<textarea class="input" placeholder="Order Notes"></textarea>
							</div>
							<!-- /Order notes -->
						</div>

						<!-- Order Details -->
						<div class="col-md-5 order-details">
							<div class="section-title text-center">
								<h3 class="title">Your Order</h3>
							</div>
							<div class="order-summary">
								<div class="order-col">
									<div><strong>PRODUCT</strong></div>
									<div><strong>TOTAL</strong></div>
								</div>
								<div class="order-products">
									@foreach(Cart::content() as $item)
									<div class="order-col">
										<div>{{$item->qty}}x {{substr($item->name,0,50)}}...</div>
										@if($item->discount == 0)
										<div>{{number_format($item->price * $item->qty)}} VND</div>
										@else
										<div>{{number_format(($item->price * ((100 - $item->discount)/100)) * $item->qty)}} VND</div>
										@endif
										
									</div>
									@endforeach
								</div>
								<div class="order-col">
									<div>Shiping</div>
									<div><strong>FREE</strong></div>
								</div>
								<div class="order-col">
									<div><strong>TOTAL</strong></div>
									<div><strong class="order-total">{{Cart::total()}} VND</strong></div>
								</div>
							</div>
							<div class="payment-method">
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-1">
									<label for="payment-1">
										<span></span>
										Direct Bank Transfer
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-2">
									<label for="payment-2">
										<span></span>
										Cheque Payment
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
								<div class="input-radio">
									<input type="radio" name="payment" id="payment-3">
									<label for="payment-3">
										<span></span>
										Paypal System
									</label>
									<div class="caption">
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
									</div>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="checkbox" id="terms">
								<label for="terms">
									<span></span>
									I've read and accept the <a href="#">terms & conditions</a>
								</label>
							</div>
							<input  type="submit"class="primary-btn order-submit" value="Place order" style="margin: 5px auto;" onclick="return confirm('Bạn có chắc chắn muốn mua hàng không?')">
						</div>
					<!-- /Order Details -->
					</form>
					@else
						<div class="col-md-12 text-center">
							Your Cart is empty!! <br>
							<a href="{{ url('store')}}" class="btn btn-warning mx-auto " style="margin-top:15px"> Continue Shopping  <i class="fa fa-arrow-circle-right"></i></a>
						</div>
						
					@endif

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection