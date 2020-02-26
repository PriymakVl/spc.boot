<?php
use yii\helpers\Html;
$this->title = 'Корзина';	
?>
<!-- css files -->
<!-- <link rel="stylesheet" type="text/css" href="/web/css/cart.css"> -->

<!-- Breadcrumbs  -->
<div class="breadcrumbs">
	<a href="/" class="breadcrumbs__link">Главная</a>
	<span class="breadcrumbs__del">/</span>
	<span class="breadcrumbs__active">Корзина</span>
</div>

<div class="cart">
	<? if (!empty($cart)): ?>
		<table class="cart__table">
			<tr>
				<th width="120">Фото</th>
				<th width="200">Кодировка</th>
				<th>Описание</th>
				<th>Цена</th>
				<th width="70">Кол-во</th>
				<th width="80">Управление</th>
			</tr>

			<?=$this->render('products', ['cart' => $cart])?>

		</table>
	<? else: ?>
		<p>В корзине еще нет товаров</p>
		<a href="/" class="btn btn-primary">Продолжить покупки</a>
	<? endif; ?>
</div>

<?//=$this->render('checkout_form')?>
</div>
