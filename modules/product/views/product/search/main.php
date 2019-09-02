<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/product/search/main.css">
<link rel="stylesheet" type="text/css" href="/web/css/category/index/products.css">

	<h1 class="text-center">Результаты поиска</h1>

	<?  if ($products): ?>
		<? include 'search.php'; ?>
	<? else: ?>
		<p style="color: red;">Сожалеем, но ничего не найдено.</p>
	<? endif; ?>
