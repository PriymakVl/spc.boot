$(document).ready(function() {

	$('.product__cart-btn').click(function(event) {

		let series = $('#product_series').val();
		if (!series) return $('.product__series .error-message').show();

		let thread = $('#product_thread').val();
		if (!thread) return $('.product__thread .error-message').show();
		//delete symbol @ (symbol @ use for right sort in select tag)
		thread = thread.substring(1);

		let qty = $('#product_count').val();
		qty = qty ? qty : 1;

		let condensate = get_condensate(series);
		if (condensate === undefined) return $('.product__condensate .error-message').show();

		// return location.href = '/cart/add-product-by-code?series=' + series +'&thread=' + thread + '&condensate=' + condensate + '&qty=' + qty;

		$.ajax({
			url: '/cart/add-product-by-code',
			data: {'series': series, 'thread': thread, 'condensate': condensate, 'qty': qty},
			type: 'GET',

		  	success: function(cart_qty) { 
		  		if (+cart_qty) {
		  			$('.h-cart__title').text('Товаров: ' + cart_qty + 'шт.');
		  			$('.h-cart').prop("href", "/cart").addClass('h-cart--active-border');
		  			$('.h-cart__title').addClass('h-cart--active-text');
		  			$('.h-cart__icon').addClass('h-cart--active-text');

		  			$('.error-message').hide();

		  			//show modal window
					$('#trigger_cart_modal').trigger('click');

		  		}
		  	},

		  	error: function() { alert('error'); }, 
		});
	});
});

//select series where exist condensate
function get_condensate(series)
{
	str = series.slice(0, 4);
	if (str == 'SA-R' || str == 'SA-L') return '';
	return $('[name="condensate"]:checked').val();
}