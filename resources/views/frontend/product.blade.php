@extends('frontend.layout.master')

@section('title', 'Product')

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
						<ul class="breadcrumb-tree">
							<li><a href="{{url('/')}}">Home</a></li>
							<li><a href="{{route('viewstore')}}">All Categories</a></li>
							<li class="active">{{substr($productdetail->name,0,50)}}</li>
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
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{asset('front/img/'.$productdetail->image)}}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{$productdetail->name}}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#tab3">{{$totalComments}} Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price">{{number_format($productdetail->price * ((100-$productdetail->discount)/100)) }} VND <del class="product-old-price">{{number_format($productdetail->price)}}</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>{{$productdetail->description}}</p>
							<form action="{{route('add_detailpro',['id' => $productdetail->id] )}}" method="post">
								@csrf
								<div class="product-options">
									<label>
										Size
										@if(count($detail)>0)
											<select class="input-select">
												@foreach($detail as $value)
													<option value="{{$value->size}}">{{$value->size}}</option>
												@endforeach
											</select>
										@else
											<select class="input-select">
												<option value="39">39</option>
											</select>
										@endif
									</label>
									<label style="width:100px">
										<div class="qty-label">
											Qty
											<div class="input-number">
												<input type="number" name="quantity" value="1" required>
												<span class="qty-up">+</span>
												<span class="qty-down">-</span>
											</div>
										</div>
									</label>
								</div>

								<div class="add-to-cart">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart" ></i> add to cart</button>
								</div>
							</form>	

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews ({{count($comments)}})</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{$productdetail->description}}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->

								<!-- tab2  -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row">
										<div class="col-md-12">
										<h4 style ="text-align: center; color: aqua">Tên: {{$productdetail->name}}</h4>
											<p><b> Mô Tả:</b> {{$productdetail->description}}</p>
											<p><b> Thể Loại :</b>{{$productdetail -> type_name}}</p>
											<p><b> Hãng :</b>{{$productdetail -> manu_name}}</p>
											<p><b> Thời Gian Ra Mắt :</b>{{$productdetail->created_at}}</p>
										</div>
									</div>
								</div>
								<!-- /tab2  -->

								<!-- tab3  -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">
												<div class="rating-avg">
													<span>4.5</span>
													<div class="rating-stars">
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
												<ul class="rating">
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 80%;"></div>
														</div>
														<span class="sum">3</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div style="width: 60%;"></div>
														</div>
														<span class="sum">2</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
													<li>
														<div class="rating-stars">
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
															<i class="fa fa-star-o"></i>
														</div>
														<div class="rating-progress">
															<div></div>
														</div>
														<span class="sum">0</span>
													</li>
												</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">
													@foreach($comments as $item)
													<li>
														<div class="review-heading">
															<h5 class="name">{{$item->name_reviewer}}</h5>
															<p class="date">{{$item->created_at}}</p>
															<div class="review-rating">
																@for($i = 1; $i <= 5;$i++)
																	@if($i <= $item->rating)
																	<i class="fa fa-star"></i>
																	@else
																	<i class="fa fa-star-o empty"></i>
																	@endif
																@endfor
															</div>
														</div>
														<div class="review-body">
															<p>{{$item->content}}</p>
														</div>
													</li>
													@endforeach
												</ul>
											    <!-- <ul class="reviews-pagination"> -->
													<div style="text-align: center;">
													{{ $comments->links('pagination::bootstrap-4')}}
													</div>
													
													<!-- <li class="active">1</li>
													<li><a data-toggle="tab" href="#page=2" >2</a></li>
													<li><a href="#">3</a></li>
													<li><a href="#">4</a></li>
													<li><a href="#"><i class="fa fa-angle-right"></i></a></li>  -->
												<!-- </ul>  -->
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3">
											<div id="review-form">
												<form class="review-form" action="{{route('add_reviewer',['id' => $productdetail->id])}}" method="post">
													@csrf
													<input class="input" type="text" name="name" placeholder="Your Name" required>
													@if ($errors->has('name'))
														<span class="text-danger">{{ $errors->first('name') }}</span>
													@endif
													<input class="input" type="email" name="email"  placeholder="Your Email" required>
													@if ($errors->has('email'))
														<span class="text-danger">{{ $errors->first('email') }}</span>
													@endif
													<textarea class="input" name="content" placeholder="Your Review" required></textarea>
													@if ($errors->has('content'))
														<span class="text-danger">{{ $errors->first('content') }}</span>
													@endif
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio" required><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio" required><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio" required><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio" required><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio" required><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn" name="submit">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- Section -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-12">
						<div class="section-title text-center">
							<h3 class="title">Related Products</h3>
						</div>
					</div>

					<!-- product -->
					@foreach($productOfBrand as $item)
					<div class="col-md-3 col-xs-6 products-tabs">
					@include('frontend/layout/viewproduct')
					</div>
					@endforeach
					<!-- /product -->

					<div class="clearfix visible-sm visible-xs"></div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /Section -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
	// let reviews_pagination = document.querySelector('.reviews-pagination');
	$(document).on('click', '.reviews-pagination li a', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');
    $.ajax({
        url: url,
        success: function(data) {
            $('page=2').html(data);
        }
    });
});
</script>

@endsection