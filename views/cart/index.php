<?php
use yii\helpers\Html;	
?>
<!-- css files -->
<link rel="stylesheet" type="text/css" href="/web/css/cart.css">

<!-- breadcrumbs -->
<div class="container">
    <ol class="breadcrumb">
		<li><a href="/">Главная</a></li>
		<li>Корзина</li>
	</ol>
</div>

<h1 class="text-center">Корзина</h1>

<div class="container" style="margin-bottom: 50px;">
	<? if (!empty($cart)): ?>
		<table class="table table-striped table-bordered">
			<tr>
				<th width="120">Фото</th>
				<th width="200">Кодировка</th>
				<th>Описание</th>
				<th>Цена</th>
				<th width="50">Кол-во</th>
				<th>Управление</th>
			</tr>

			<!-- cylinders -->
			<? if (isset($cart['cylinders'])): ?>
				<? include 'cylinders.php'; ?>
			<? endif ?>

			<!-- products -->
			<? if (isset($cart['products'])): ?>
				<? include 'products.php'; ?>
			<? endif ?>
		</table>

		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#checkout">
				Оформить заказ
		</button>

	<? else: ?>
		<p>В корзине еще нет товаров</p>
	<? endif; ?>

	<!-- checkout form -->
	<? include 'checkout_form.php'; ?>
</div>
