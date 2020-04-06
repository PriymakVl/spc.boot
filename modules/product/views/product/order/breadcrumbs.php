<?php 
use yii\helpers\Html;
 ?>

<!-- Breadcrumbs  -->
<div class="breadcrumbs">

	<a href="/" class="breadcrumbs__link">Главная</a>
	<? if ($cat->parent): ?>
		<span class="breadcrumbs__del">/</span>
		<?= Html::a($cat->parent->name, ['/category/'.$cat->parent->translit], ['class' => 'breadcrumbs__link']) ?>
	<? endif; ?>

	<span class="breadcrumbs__del">/</span>

	<?= Html::a($cat->name, ['/category/'.$cat->translit], ['class' => 'breadcrumbs__link']) ?>

	<span class="breadcrumbs__del">/</span>

	<span class="breadcrumbs__active">Форма для заказа</span>

</div>