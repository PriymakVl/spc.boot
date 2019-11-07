<?php
use yii\helpers\Html;
?>

<!-- breadcrumbs -->
<div class="container">
    <ol class="breadcrumb">
		<li><a href="/">Главная</a></li>
		<? if ($product->category->parent): ?>
			<li><a href="/category?id_cat=<?=$product->category->parent->id?>"><?=$product->category->parent->name?></a></li>
		<? endif; ?>
		<li>
			<?= Html::a($product->category->name, ['/category', 'id_cat' => $product->category->id]) ?>
		</li>	
		<li><a href="#"><?=$product->name?></a></li>
	</ol>
</div>

<!-- product -->
<? include 'product.php'; ?>

<!-- product description -->
<div class="container" style="margin-bottom: 20px;">
	<div class="row">
		<div class="col-md-12">
			<?php if ($product->description) echo $product->description; ?>
		</div>
	</div>
</div>

