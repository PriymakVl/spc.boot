<?php
use yii\helpers\Html;

$this->registerCssFile('@web/css/content/product.css');
$this->registerCssFile('@web/css/content/product_sidebar.css');
?>

<?=$this->render('breadcrumbs', ['cat' => $cat])?>

<div class="product-wrp">
	<!-- Product -->
	<div class="product">
		<div class="product__inner">
		
			<?=$this->render('gallery', ['cat' => $cat])?>
				

			<!-- Product content -->
			<div class="product__content">
			
				<h1 class="product__name"><?=$cat->name?></h1>

				<?=$this->render('buy_block')?>
				
			</div> <!-- /.product__content -->
		</div> <!-- /.product__inner -->

		<?= $this->render('product_description') ?>

	</div> <!-- /.product -->

	<?=$this->render('sidebar')?>
</div>
