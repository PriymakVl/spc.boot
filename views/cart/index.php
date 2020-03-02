<?php
use yii\helpers\Html;
$this->title = 'Корзина';	
$this->registerCssFile('@web/css/content/cart.css');
?>

<!-- Breadcrumbs  -->
<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__link">Главная</a>
	<span class="breadcrumbs__del">/</span>
	<span class="breadcrumbs__active">Корзина</span>
</div>

<h1 class="page-title">Корзина</h1>
<div class="cart">
	<? if (!empty($cart)): ?>
		<table class="cart__content">
			<tr>
				<th width="80">Фото</th>
				<th width="150">Кодировка</th>
				<th>Описание</th>
				<th width="100">Цена</th>
				<th width="70">Кол-во</th>
				<th width="90">Удалить</th>
			</tr>

			<?=$this->render('products', ['cart' => $cart])?>

		</table>

		<button type="button" class="cart__btn-checkout" data-toggle="modal" data-target="#checkout">Оформить заказ</button>

	<? else: ?>
		<p>В корзине еще нет товаров</p>
		<a href="/" class="btn btn-primary">Продолжить покупки</a>
	<? endif; ?>
</div>



<?=$this->render('checkout_form', ['model' => $model])?>
