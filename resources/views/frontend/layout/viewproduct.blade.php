<!-- product -->
<div class="product">
	<div class="product-img">
		<img src="{{asset('front/img/'.$item->image)}}" alt="" style="margin: 0 auto;">
		<div class="product-label">
		    <span class="sale">-{{$item->discount}}%</span>
            @if($item->feature == '1')
			<span class="new">NEW</span>
            @endif
	    </div>
	</div>
	<div class="product-body">
		<p class="product-category">Category</p>
		<h3 class="product-name"><a href="{{ url('product/'.$item->id) }}">{{substr($item->name,0,22)}}...</a></h3>
		<h4 class="product-price">{{number_format($item->price * ((100 - $item->discount)/100)) }} <del class="product-old-price">{{number_format($item->price)}}</del></h4>
		<div class="product-rating">
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
			<i class="fa fa-star"></i>
		</div>
		<div class="product-btns" >
			<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
			<button class="quick-view" onclick="window.location=`{{ url('product/'.$item->id) }}`"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button>
		</div>
	</div>
	<div class="add-to-cart">
		<button class="add-to-cart-btn"><i class="fa fa-shopping-cart" onclick="window.location=`{{ url('cart/add/'.$item->id) }}`"></i> add to cart</button>
	</div>
</div>
<!-- /product -->