<?php 

	use yii\helpers\Html;
	use yii\helpers\Url;

	$hide_catalog = false;
	if (Yii::$app->controller->id == 'product') $hide_catalog = true;
	if (Yii::$app->controller->id == 'cart') $hide_catalog = true;
	if (Yii::$app->controller->id == 'category') $hide_catalog = get_hide_catalog_for_category();

	function get_hide_catalog_for_category()
	{
		$translit = explode('/', $_SERVER['REQUEST_URI'])[2];
		if ($translit == 'podgotovka_vozdukha') return false;
		if ($translit == 'bloki_podgotovki_vozdukha') return true;
		if ($translit == 'filtry_regulatory') return true;
		if ($translit == 'regulatory') return true;
	}

 ?>

<!-- Catalog -->
<div class="catalog">
    <div class="catalog__header">
        <span>Каталог товаров</span>
        <div class="catalog__toggle" onclick="classList.toggle('burger-active');">
        	<span></span>
        </div>
    </div>
    
	<ul class="catalog__list" <? if ($hide_catalog) echo 'style="display:none;"'; ?>>
		<? foreach ($this->params['catalog'] as $cat): ?>
			<li class="catalog__item">
				 <?= Html::a($cat->name, ['/category/'.$cat->translit], ['class' => 'catalog__link']) ?>
			</li>
		<? endforeach; ?>
	</ul>
</div> <!-- /.catalog -->