$(document).ready(function() {
	$('.call-not-processed').click(function() {
		var change = confirm('Изменить состояние звонка?');
		if (!change) return;
   		var id = $(this).data('id');
	   	location.href = '/callback/state?id=' + id + '&state=not';
	});

	$('.call-processed').click(function() {
		var change = confirm('Изменить состояние звонка?');
		if (!change) return;
   		var id = $(this).data('id');
	   	location.href = '/callback/state?id=' + id;
	});
});
