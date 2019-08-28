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
<div class="container">
<div id="top-header" class="row">
		<!-- logo box -->
		<div class="col-md-3 logo-wrp">
			<address>г. Каменское, ул. Сергея Нигояна 26</address>
		    <a href="/">
		    	<?= Html::img('web/images/logo.jpg', ['alt' => 'logo']) ?>
	        </a>
		</div>

		<!-- search and cart box -->
		<div class="col-md-6 header-center-wrp">
			<!-- cart -->
			<a href="/cart" class="cart-wrp">
				<i class="fas fa-shopping-cart"></i>
				<span>В вашей корзине товаров: <?=$qty_items_cart?></span>
			</a>
			<!-- search -->
			<div class="form-group search-wrp">
				<form>
		    		<i class="fa fa-search form-control-feedback"></i>
	    			<input type="text" class="form-control" placeholder="Поиск товаров">
				</form>
			</div>

		</div>

		<!-- phones box -->
		<div class="col-md-3">
			<div class="phone-callback text-center">
				<span class="btn btn-orange">Заказать звонок</span>
			</div>
			<div class="phone-number text-center">
				<i class="fa fa-phone"></i>
				<a href="tel:0800210317">0800-210-317</a>
			</div>
		</div> 
	</div>
</div>