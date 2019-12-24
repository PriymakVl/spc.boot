<?php
	use app\modules\category\classes\Category;
	use app\widgets\OrderFormCylinderWidget;
	$series_cylinders = ['CP', 'MS', 'MA', 'MAL', 'SDA', 'ADV', 'JDA', 'SR', 'SW', 'SRT', 'SC', 'SCT', 'SG', 'QG', 'CG', 'EM', 'GMS'];
	$code_cylinder = (in_array($cat->code, $series_cylinders)) ? $cat->code : false;
?>
<!-- css -->
<link rel="stylesheet" type="text/css" href="/web/css/category/index/form_cylinder.css">

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
	<? if ($cat->parent->id != Category::PNEUMO_CYLINDER_CAT_ID): ?>
    	<h1 class="text-center"><?=$cat->name?></h1>
	<? endif; ?>

	<? if ($code_cylinder): ?> 
		<? include 'cylinders.php'; ?>
	<? elseif ($cat->products): ?>
		<? include 'products.php'; ?>	
	<? elseif($cat->children): ?>
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