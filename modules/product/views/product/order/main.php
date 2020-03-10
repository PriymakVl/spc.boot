<?php
use yii\helpers\Html;

$this->registerCssFile('@web/css/content/product/product.css');
$this->registerCssFile('@web/css/content/product/product_assortiment.css');
$this->registerCssFile('@web/css/content/product/sidebar.css');
$this->registerCssFile('@web/css/content/product/cart_modal.css');

$this->registerJsFile('@web/js/product/product_counter.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerJsFile('@web/js/product/product_add_cart.js', ['depends' => 'yii\web\YiiAsset']);

$this->registerJsFile('@web/js/product/select_air_preparation.js', ['depends' => 'yii\web\YiiAsset']);

?>

<?=$this->render('breadcrumbs', ['cat' => $cat])?>

<div class="product-wrp">
	
	<!-- Product -->
	<div class="product">
		<div class="product__inner">
		
			<?=$this->render('gallery', ['cat' => $cat])?>
				

			<!-- Product content -->
			<div class="product__content">
			
				<h1 class="product__name">Форма для заказа</h1>

				<?=$this->render('select/'.$translit)?>

				<?=$this->render('buy_block')?>
				
			</div> <!-- /.product__content -->
		</div> <!-- /.product__inner -->

	</div> <!-- /.product -->

	<?=$this->render('sidebar')?>

</div>

	<?=$this->render('assortiment/'.$translit)?>

<?= $this->render('cart_modal') ?>
