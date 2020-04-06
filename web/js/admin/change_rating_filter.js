$(document).ready(function() {
	$('.edit_rating').click(function() {
		let id_cat = $(this).attr('id_cat');
		let id_filter = $(this).attr('id_filter');
		let rating = prompt('Укажите рейтин');
		if (!+rating) return alert('Вы указали не число');
		location.href = '/filter/filter-admin/rating?id_cat=' + id_cat + '&id_filter=' + id_filter + '&rating=' + rating;
	});
});