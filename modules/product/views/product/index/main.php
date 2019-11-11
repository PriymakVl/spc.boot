<?php
use yii\helpers\Html;
?>

<!-- breadcrumbs -->
<div class="container">
    <ol class="breadcrumb">
		<li><a href="/">Главная</a></li>
		<? if ($product->category->parent): ?>
			<li>
				<?= Html::a($product->category->parent->name, ['/category/'.$product->category->parent->translit]) ?>
			</li>
		<? endif; ?>
		<li>
			<?= Html::a($product->category->name, ['/category/'.$product->category->translit]) ?>
		</li>	
		<li class="active"><?=$product->name?></li>
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

