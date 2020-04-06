$(document).ready(function() {

	$('.product__buy-click-btn').click(function(event) {
		let phone = $('#phone_number').val();
		if (!phone) return $('.product__buy-click .error-message').show();

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

		// return location.href = '/order/order/save-by-click?phone=' + phone + '&series=' + series +'&thread=' + thread + '&condensate=' + condensate + '&qty=' + qty;

		$.ajax({
			url: '/order/order/save-by-click',
			data: {'phone': phone, 'series': series, 'thread': thread, 'condensate': condensate, 'qty': qty},
			type: 'GET',

		  	success: function() { 

		  			$('.error-message').hide();
		  			//show modal window
					$('#trigger_one_click_modal').trigger('click');
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