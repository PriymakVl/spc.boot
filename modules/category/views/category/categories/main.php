<main>
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
	<h1 class="text-center"><?=$cat->name?> | Купить <?=$cat->name?></h1>

	<? if($cat->children): ?>
		<? include 'categories.php'; ?>
 	<? else: ?>
 		<p>В этой категории ничего нет</p>
	<? endif; ?>

	<!-- category description -->
	<div class="container" style="margin-bottom: 20px;">
		<div class="row">
			<div class="col-md-12">
				<?php if ($pages && $cat->description) echo $cat->description; ?>
			</div>
		</div>
	</div>

	<!-- similar products -->
	<!-- <div class="similar-products-block"></div> -->

	<!-- viewed products -->
	<!-- <div class="viewed-block"></div> -->

</main>