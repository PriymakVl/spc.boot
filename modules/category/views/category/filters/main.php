<?php
	use app\modules\category\classes\Category;
?>

<!-- breadcrumbs -->
<div class="container">
    <ol class="breadcrumb">
		<li><a href="/">Главная</a></li>
		<? if ($cat->parent): ?>
			<li><a href="/category/<?=$cat->parent->translit?>"><?=$cat->parent->name?></a></li>
		<? endif; ?>	
		<li class="active"><?=$cat->name?></li>
	</ol>
</div>

<!-- name category -->
<h1 class="text-center">Результаты поиска категория: <?=$cat->name?></h1>

<? if ($products): ?> 
	<? include 'products.php'; ?>
<? else: ?>
		<p>Нет результатов</p>
<? endif; ?>

<!-- category description -->
<div class="container" style="margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12">
			<?php if ($pages && $cat->description) echo $cat->description; ?>
		</div>
	</div>
</div>
