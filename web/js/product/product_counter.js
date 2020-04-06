$(document).ready(function() {
	
	$('#product_count_plus').click(function() {
		let count = $('#product_count').val();
		$('#product_count').val(+count + 1);
	});


	$('#product_count_minus').click(function() {
		let count = $('#product_count').val();
		count = +count;
		if (count == 1) return;
		$('#product_count').val(count - 1);
	});

});

