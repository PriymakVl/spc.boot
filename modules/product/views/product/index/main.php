<?php
use yii\helpers\Html;

$this->registerCssFile('@web/css/content/product.css');
$this->registerCssFile('@web/css/content/product_sidebar.css');
$this->registerCssFile('@web/css/content/product_description.css');
$this->registerCssFile('@web/css/content/product_dimension.css');

$this->registerJsFile('@web/js/product/product_tab.js', ['depends' => 'yii\web\YiiAsset']);
$this->registerJsFile('@web/js/product/choice_air_preparation_air.js', ['depends' => 'yii\web\YiiAsset']);
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

	</div> <!-- /.product -->

	<?=$this->render('sidebar')?>
</div>

<?= $this->render('product_description') ?>
