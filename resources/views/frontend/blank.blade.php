@extends('frontend.layout.master')

@section('title', 'Blank')

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
					<!-- <div class="products-slick" data-nav="#slick-nav-2"> -->
					@if(count($products) == 0)
						<h3 class="text-primary">Không sản phẩm nào được tìm thấy</h3>
					@else
						@foreach($products as $item)
							<!-- product -->
						<div class="col-md-3 col-xs-6 products-tabs">
						@include('frontend/layout/viewproduct')
						</div>
							<!-- /product -->
						@endforeach
					@endif
					<!-- </div> -->
				</div>	
				<div style="text-align: end;">
					{{ $products->appends(request()->query())->links('pagination::bootstrap-4')}}
				</div>					
				<!-- <div id="slick-nav-2" class="products-slick-nav"></div> -->
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

@endsection