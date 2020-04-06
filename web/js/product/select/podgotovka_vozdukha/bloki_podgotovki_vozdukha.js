$(document).ready(function() {
	
	$('#product_series').change(function() {
		let series = $(this).val();
		if (series) {
			select_options = create_str_options_threads(series);
			$('#product_thread').html(select_options).prop( "disabled", false );
			$('.product__series .error-message').hide();
			// return sort_block_condensate(series);
		}
		else {
			$('#product_thread').html('<option value="">Не выбран</option>').prop( "disabled", true );
		}
	});

	$('#product_thread').change(function() {
		let thread = $(this).val();
		if (thread) {
			$('.product__thread .error-message').hide();
		}
	});

});

function sort_block_condensate(series)
{
	// console.log(series);
	// if (series) $('.product__condensate input, .product__condensate label').hide();
	// else $('.product__condensate input, .product__condensate label').each().show();
	// if (series == 'SA-CN') $('#semi')
}

function create_str_options_threads(series)
{
	let str = '<option value="">Не выбрана</option>';
	let threads = get_threads(series);
	for (key in threads) {
		str += '<option value="' + key + '">' + threads[key] +'</option>'
	}
	return str;
}

//@ для правильной очереди при переборе свойств объекта
function get_threads(series)
{
	switch(series) {
		case 'SA-CN': return {'@M5':'M5', '@08':'G1/4”', '@15':'G1/2”', '@25':'G1”'};
		case 'SA-CU': return {'@08':'G1/4”', '@15':'G1/2”', '@25':'G1”'};
		case 'SA-CM': return {'@08':'G1/4”', '@15':'G1/2”'};
	}
}