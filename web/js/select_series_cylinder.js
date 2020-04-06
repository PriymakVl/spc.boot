$(document).ready(function() {
	$('#series_cylinder').change(function() {
		var series = $(this).val();
		if (series) location.href = '/category/cylinder/form?series=' + series;
		else alert('Не указана серия цилиндра');
	});
});