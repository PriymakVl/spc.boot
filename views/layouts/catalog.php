<?php 

	use yii\helpers\Html;

	$controller_name = Yii::$app->controller->id;

 ?>

<!-- Catalog -->
<div class="catalog">
    <div class="catalog__header">
        <span>Каталог товаров</span>
        <i class="fas fa-bars catalog__toggle"></i>
    </div>
    
	<ul class="catalog__list" <? if ($controller_name == 'product') echo 'style="display:none;"'; ?>>
		<? foreach ($this->params['catalog'] as $cat): ?>
			<li class="catalog__item">
				 <?= Html::a($cat->name, ['/category/'.$cat->translit], ['class' => 'catalog__link']) ?>
			</li>
		<? endforeach; ?>
	</ul>
</div> <!-- /.catalog -->