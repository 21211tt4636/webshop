@extends('frontend.layout.master')

@section('title', 'Store')

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
							<li><a href="#">Home</a></li>
							<li><a href="#">All Categories</a></li>
							<li class="active">Headphones (227,490 Results)</li>
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
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<form action="" method="get" id="store-form-1">
							<input type="hidden" name="type_id" value="{{ $type_id }}">
							<!-- aside Widget -->
							<div class="aside category">
								<h3 class="aside-title">Categories</h3>
								<div class="checkbox-filter">
									@foreach($typeList as $value)
									<div class="input-checkbox">
										<input type="checkbox" 
										{{ (request('category')[$value->id] ?? '') == 'on' ? 'checked' : ''}}
										id="category-{{$value->id}}" name="category[{{$value->id}}]" onchange="this.form.submit()" '>
										<label for="category-{{$value->id}}">
											<span></span>
											{{$value->type_name}}
											<small>({{$value->count}})</small>
										</label>
									</div>

									@endforeach
								</div>
							</div>
							<!-- /aside Widget -->
						
							<!-- aside Widget -->
							<div class="aside">
								<h3 class="aside-title">Price</h3>
								<div class="price-filter">
									<div id="price-slider" ></div>
									<div class="input-number price-min">
										<input id="price-min" type="number" name="price_min" >
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
									<span>-</span>
									<div class="input-number price-max">
										<input id="price-max" type="number" name="price_max" >
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<div class="text-center " style="margin-top: 10px;">
									<div class="btn btn-primary mt-2 mx-auto submit-filter"  >Filter</div>
								</div>
								
							</div>
							<!-- /aside Widget -->

							<!-- aside Widget -->
							<div class="aside">
								<h3 class="aside-title">Brand</h3>
								<div class="checkbox-filter">
									@foreach($manufactureCounts as $value)
									<div class="input-checkbox">
										<input type="checkbox" {{ (request('brand')[$value->id] ?? '') == 'on' ? 'checked' : ''}}
										id="brand-{{$value->id}}" name="brand[{{$value->id}}]" onchange="this.form.submit()" >
										<label for="brand-{{$value->id}}">
											<span></span>
											{{$value->manu_name}}
											<small>({{$value->count}})</small>
										</label>
									</div>
									@endforeach
								</div>
							</div>
							<!-- /aside Widget -->
						</form>
							<!-- aside Widget -->
							<div class="aside">
								<h3 class="aside-title">Top selling</h3>
								@foreach($productsofSelling as $item)
								<div class="product-widget">
									<div class="product-img">
										<img src="{{asset('front/img/'.$item->image)}}" alt="">
									</div>
									<div class="product-body">
										<p class="product-category">Category</p>
										<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($item->name,0,30)}}</a></h3>
										<h4 class="product-price">{{$item->price * ((100 - $item->discount)/100) }} <del class="product-old-price">{{$item->price}}</del></h4>
									</div>
								</div>

								@endforeach
							</div>
							<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->

					<!-- STORE -->
					<div id="store" class="col-md-9">
						<!-- store top filter -->
						<div class="store-filter clearfix">
							@if(isset($type_id) && $type_id != '' )
							<form action="{{ url('store')}}" id="store-form">
								<input type="hidden" name="type_id" value="{{ $type_id }}">
								<div class="store-sort">
									<label>
										Sort By:
										<select name="sort_by" class="input-select" onchange="submitForm()">
											<option {{ request('sort_by') == 'lasted' ? 'selected' :'' }} value="lasted">Lasted</option>
											<option {{ request('sort_by') == 'oldest' ? 'selected' :'' }} value="oldest">Oldest</option>
										</select>
									</label>

									<label>
										Show:
										<select name="show" class="input-select" onchange="submitForm()">
											<option {{ request('show') == '20' ? 'selected' :'' }} value="20">20</option>
											<option {{ request('show') == '50' ? 'selected' :'' }} value="50">50</option>
										</select>
									</label>
								</div>
							</form>
							
							@else
							<form action="" method="get">
								<div class="store-sort">
									<label>
										Sort By:
										<select name="sort_by" class="input-select" onchange="this.form.submit();">
											<option {{ request('sort_by') == 'lasted' ? 'selected' :'' }} value="lasted">Lasted</option>
											<option {{ request('sort_by') == 'oldest' ? 'selected' :'' }} value="oldest">Oldest</option>
										</select>
									</label>

									<label>
										Show:
										<select name="show" class="input-select" onchange="this.form.submit();">
											<option {{ request('show') == '20' ? 'selected' :'' }} value="20">20</option>
											<option {{ request('show') == '50' ? 'selected' :'' }} value="50">50</option>
										</select>
									</label>
								</div>
							</form>
							@endif
							<ul class="store-grid">
								<li class="active"><i class="fa fa-th"></i></li>
								<!-- <li><a href="#"><i class="fa fa-th-list"></i></a></li> -->
							</ul>
						</div>
						<!-- /store top filter -->

						<!-- store products -->
						@if($products)
						<div class="row">
							<!-- product -->
							@foreach($products as $item)
								<div class="col-md-4 col-xs-6 products-tabs">
								@include('frontend/layout/viewproduct')
								</div>
							@endforeach
							<!-- /product -->
						</div>
						<!-- store bottom filter -->
						<div class="store-filter clearfix">
							<span class="store-qty">Showing 20-100 products</span>
							<div style="text-align: end;">
								{{ $products->appends(request()->query())->links('pagination::bootstrap-4')}}
							</div>
							<!-- <ul class="store-pagination">
								<li class="active">1</li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#"><i class="fa fa-angle-right"></i></a></li>
							</ul> -->
						</div>
						<!-- /store bottom filter -->
						@else
							<div class="row">
								<div class="result text-center">
									<h3 class="text-primary">Không tìm thấy sản phẩm phù hợp</h3>
									<br>
									<img src="https://cdn2.cellphones.com.vn/640x/media/wysiwyg/not_found_mobile.jpeg" alt="">
								</div>
							</div>
						@endif
						<!-- /store products -->

						
					</div>
					<!-- /STORE -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection