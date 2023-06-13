(function($) {
	"use strict"

	// Mobile Nav toggle
	$('.menu-toggle > a').on('click', function (e) {
		e.preventDefault();
		$('#responsive-nav').toggleClass('active');
		
	})

	// Fix cart dropdown from closing
	$('.cart-dropdown').on('click', function (e) {
		e.stopPropagation();
	});

	/////////////////////////////////////////

	// Products Slick
	$('.products-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			infinite: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
			responsive: [{
	        breakpoint: 991,
	        settings: {
	          slidesToShow: 2,
	          slidesToScroll: 1,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	          slidesToScroll: 1,
	        }
	      },
	    ]
		});
	});

	// Products Widget Slick
	$('.products-widget-slick').each(function() {
		var $this = $(this),
				$nav = $this.attr('data-nav');

		$this.slick({
			infinite: true,
			autoplay: true,
			speed: 300,
			dots: false,
			arrows: true,
			appendArrows: $nav ? $nav : false,
		});
	});

	/////////////////////////////////////////

	// Product Main img Slick
	$('#product-main-img').slick({
    infinite: true,
    speed: 300,
    dots: false,
    arrows: true,
    fade: true,
    asNavFor: '#product-imgs',
  });

	// Product imgs Slick
  $('#product-imgs').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    centerMode: true,
    focusOnSelect: true,
		centerPadding: 0,
		vertical: true,
    asNavFor: '#product-main-img',
		responsive: [{
        breakpoint: 991,
        settings: {
		vertical: false,
		arrows: false,
		dots: true,
        }
      },
    ]
  });

	// Product img zoom
	var zoomMainProduct = document.getElementById('product-main-img');
	if (zoomMainProduct) {
		$('#product-main-img .product-preview').zoom();
	}

	/////////////////////////////////////////

	// Input number
	$('.input-number').each(function() {
		var $this = $(this),
		$input = $this.find('input[type="number"]'),
		maxLimit = 50,
		up = $this.find('.qty-up'),
		down = $this.find('.qty-down');
		var value = 0;
		down.on('click', function () {
			value = parseInt($input.val()) - 1;
			value = value < 1 ? 1 : value;
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value);
			//update cart
			var rowId = $this.parent().find('input[type="number"]').data('rowid');
			// updateCart(rowId,value);
		})

		up.on('click', function () {
			value = parseInt($input.val()) + 1;
			if (value <= maxLimit) {
			$input.val(value);
			$input.change();
			updatePriceSlider($this , value);
			//update cart
			var rowId = $this.parent().find('input[type="number"]').data('rowid');
			// updateCart(rowId,value);
			}
		})
		if (value >= maxLimit || value < 1) {
			up.prop('disabled', true); // Vô hiệu hóa nút "+"
			down.prop('disabled', true);
		}
		
	});
	$('.input-number').on('keypress', function(e) {
		var $this = $(this),
		$input = $this.find('input[type="number"]');
		if (e.which === 13) {
			e.preventDefault(); // Ngăn chặn hành động mặc định của phím Enter
	
			var newValue = parseInt($input.val());
			if (newValue > 50) {
				$input.val(50); // Gán giá trị là 50 nếu vượt quá giới hạn
			}
	
			// Các xử lý khác khi giá trị thay đổi
			var rowId = $this.parent().find('input[type="number"]').data('rowid');
			updateCart(rowId,newValue);
		}
	});

	var priceInputMax = document.getElementById('price-max'),
		priceInputMin = document.getElementById('price-min');
	

	priceInputMax.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	priceInputMin.addEventListener('change', function(){
		updatePriceSlider($(this).parent() , this.value)
	});

	function updatePriceSlider(elem , value) {
		if ( elem.hasClass('price-min') ) {
			console.log('min')
			priceSlider.noUiSlider.set([value, null]);
		} else if ( elem.hasClass('price-max')) {
			console.log('max')
			priceSlider.noUiSlider.set([null, value]);
		}
	}
	// Price Slider
	var priceSlider = document.getElementById('price-slider');
	const urlParams = new URLSearchParams(window.location.search);
	// alert(urlParams.get('price_min'));	
	if (priceSlider) {
		noUiSlider.create(priceSlider, {
			start: [parseInt(urlParams.get('price_min'))||1,
			parseInt(urlParams.get('price_max'))||999],
			connect: true,
			step: 1,
			range: {
				// 'min': parseInt(urlParams.get('price_min')),
				// 'max': parseInt(urlParams.get('price_max'))
				'min': 1,
				'max': 999
			}
		});

		priceSlider.noUiSlider.on('update', function( values, handle ) {
			var value = values[handle];
			handle ? priceInputMax.value = value : priceInputMin.value = value;
			
		});
		
	}
	const filter = document.querySelector('.submit-filter');
	filter.addEventListener('click',function(){
		const currentUrl = new URL(window.location.href);
		currentUrl.searchParams.set('price_min', priceInputMin.value);
		currentUrl.searchParams.set('price_max', priceInputMax.value);
		const newUrl = currentUrl.toString();
		window.location.replace(newUrl);
		
	});
	
})(jQuery);

//xóa sản phẩm
function removeCart(rowId){
		//kiểm tra csrf token
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			type: "GET",
			url: "/cart/delete",
			data: {rowId: rowId},
			success: function (response){
				// Xử lý khi thành công
				const amount = response['total'];
				const options = { style: 'currency', currency: 'VND' };
				const formattedAmount = amount.toLocaleString('vi-VN', options);
		
				$('.cart-summary small').text(response['count'] + " Item(s) selected");
				$('.dropdown .qty').text(response['count']);
				$('.cart-dropdown .product-price').text(formattedAmount);
				$('.cart-summary h5').text('SUBTOTAL: ' + formattedAmount + ' VND');
				// Xử lý trong trang cart
				var cart_products = $('.giohang');
				var cart_productItem = cart_products.find(".giohang .sanpham" + "[data-rowId='" + rowId + "']");
				cart_productItem.remove();
				// Xử lý ở trang master
				var cart_tbody = $('.cart-list');
				var cart_exitItem = cart_tbody.find(".product-widget" + "[data-rowId='" + rowId + "']");
				cart_exitItem.remove();
				alert('Delete successful!');
				
			},
			error: function (response){
				alert('Delete failed');
				console.log(response);
			}
		})
}

//update cart product
function updateCart(rowId,qty){
	$.ajax({
		type:"GET",
		url: "cart/update",
		data:{rowId: rowId, qty: qty},
		success: function(response){
			// xử lí price
			const amount = response['total'];
			const options = { style: 'currency', currency: 'VND' };
			const formattedAmount = amount.toLocaleString('vi-VN', options);
			//update value
			// $('.sanpham_price .product-price').text(formattedAmount + "VND");
			$('.sanpham_name .quantity').val(qty);//thiết lập giá trị value

			// Xử lý trong trang cart
			var cart_products = $('.giohang');
			var cart_productItem = cart_products.find(".giohang .sanpham" + "[data-rowid='" + rowId + "']");
			cart_productItem.find('.sanpham_name .quantity').val(qty);

			// Xử lý ở trang master
			var cart_tbody = $('.cart-list');
			var cart_exitItem = cart_tbody.find(".product-widget" + "[data-rowid='" + rowId + "']");
		    cart_exitItem.find('.product-body  .product-price').html(`<span class="qty">${qty}x</span>${response['productPrice'] * qty}`);
			$('.cart-summary small').text(response['count'] + " Item(s) selected");
			 $('.cart-summary h5').text('SUBTOTAL: ' + formattedAmount + ' VND');
			alert('Update successful!');
		},
		error: function (response){
			alert('Update failed');
			console.log(response);
		}
	})
}


