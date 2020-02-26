<?php 

	use yii\helpers\Html;

	$hide_catalog = false;
	if (Yii::$app->controller->id == 'product') $hide_catalog = true;
	if (Yii::$app->controller->id == 'cart') $hide_catalog = true;

 ?>

<!-- Catalog -->
<div class="catalog">
    <div class="catalog__header">
        <span>Каталог товаров</span>
        <i class="fas fa-bars catalog__toggle"></i>
    </div>
    
	<ul class="catalog__list" <? if ($hide_catalog) echo 'style="display:none;"'; ?>>
		<? foreach ($this->params['catalog'] as $cat): ?>
			<li class="catalog__item">
				 <?= Html::a($cat->name, ['/category/'.$cat->translit], ['class' => 'catalog__link']) ?>
			</li>
		<? endforeach; ?>
	</ul>
</div> <!-- /.catalog -->