<?php
use yii\helpers\Html;

function calculate_items_cart()
{
	if (empty($_SESSION['cart'])) return 0;
	$qty_cylinders = empty($_SESSION['cart']['cylinders']) ? 0 : count($_SESSION['cart']['cylinders']);
	$qty_products = empty($_SESSION['cart']['products']) ? 0 : count($_SESSION['cart']['products']);
	return $qty_cylinders + $qty_products;
}

$qty_items_cart = calculate_items_cart();
?>
<!-- Header -->
<header class="header">
	<!-- Header Top -->
	<div class="t-header">
		<div class="t-header__inner">
			<div class="t-header__left">
				<div class="h-sale">
					<i class="fas fa-gift h-sale__icon"></i>
					<a class="h-sale__link" href="#">% Акции</a>
				</div>
				<nav class="h-menu">
					<a class="h-menu__link" href="#">Доставка и оплата</a>
					<a class="h-menu__link" href="#">Сервис и гарантии</a>
					<a class="h-menu__link" href="#">Новости</a>
					<a class="h-menu__link" href="#">Статьи</a>
					<a class="h-menu__link" href="#">Контакты</a>
				</nav>
			</div>
			<div class="t-header__right">
				<div class="h-user">
					<i class="far fa-user h-user__icon"></i>
					<a href="#" class="h-user__auth">Войти</a>
				</div>
			</div>
		</div><!-- /.t-header__inner -->
	</div><!-- /.t-header -->

	<!--Header bottom -->
	<div class="b-header">
		<!-- Logo -->
		<div class="logo">
			<a href="/">
				<?= Html::img('@web/images/logo.jpg', ['alt' => 'SPC']) ?>
			</a>
		</div>

		<!-- Call back -->
		<div class="h-phone">
			<div class="h-phone__number">
				<i class="fas fa-phone-alt h-phone__icon"></i>
				0(800)-210-317
			</div>
			<div class="h-phone__callback">
				<a href="#" data-toggle="modal" data-target="#callback-form">Заказать обратный звонок</a>
			</div>
		</div>

		<!-- Search -->
		<div class="search">
			<form action="" class="search__form">
				<input type="text" name="" id="" class="search__input" placeholder="Поиск...">
				<!-- <input type="submit" value="Найти" class="search__submit"> -->
			</form>
		</div>

		<!-- Cart -->
		<? if ($qty_items_cart): ?>
			<a href="/cart" class="h-cart h-cart--active-border">
				<i class="fas fa-shopping-cart h-cart__icon h-cart--active-text"></i>
				<span  class="h-cart__title h-cart--active-text">Товаров: <?=$qty_items_cart?>шт.</span>
			</a>
		<? else: ?>
			<a href="" class="h-cart">
				<i class="fas fa-shopping-cart h-cart__icon"></i>
				<span  class="h-cart__title">Корзина пуста</span>
			</a>
		<? endif; ?>
	</div>
</header>