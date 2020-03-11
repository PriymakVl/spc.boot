<?php
use yii\helpers\Html;

$this->registerCssFile('@web/css/content/category/category.css');

// $this->registerCssFile('@web/css/content/product/product.css');
$this->registerCssFile('@web/css/content/category/description.css');
$this->registerCssFile('@web/css/content/category/dimension.css');

$this->registerJsFile('@web/js/category/category_tab.js', ['depends' => 'yii\web\YiiAsset']);

?>


<?=$this->render('breadcrumbs', ['cat' => $cat])?>

<!-- Category -->
<h1 class="page-title"><?=$cat->name?></h1>
<div class="cat">
	
	<?= Html::a('Заказать фильтр', ['/order/'.$cat->translit], ['class' => 'buy-btn buy-btn--top']) ?>

	<div class="cat__img">
		<img src="/web/images/block_prep.jpg">
	</div>
	<div class="cat__description">
		<div class="cat__description-inner">
			<p>
			Маслораспылители используются для подачи масла в исполнительные механизмы: распределители, цилиндры, пневмодвигатели и другие устройства, работающие на повышенных частотах. 
			</p>
			<p>	 
		</div>
		<!-- Cat Alert -->
		<div class="cat-alert">
			<div class="cat-alert__item">
				<div class="cat-alert__img">
					<i class="fas fa-exclamation-circle"></i>
				</div>
				<div class="cat-alert__text">Для продления срока службы вашего пневматического оборудования используйте масло ISO VG32 <span class="red">(ссылка на страницу с маслом)</span> для пневматических систем, а так же не прекращайте подачу масла в систему, если вы ее уже начали.</div>
			</div> 
		</div>	<!-- /.cat-alert -->

		<!-- Consultation Button -->
		<div class="consultation-order-wrp">
			<div data-toggle="modal" data-target="#callback-form" class="consultation-order">
				заказать консультацию
			</div>
		</div>	

	</div> <!-- /.cat__description -->
</div> <!-- /.cat -->
	
<?=$this->render('cat_assortiment')?>

<div class="buy-btn-wrp">
	<?= Html::a('Заказать фильтр', ['/order/'.$cat->translit], ['class' => 'buy-btn buy-btn--middle']) ?>
</div>

<?//=$this->render('description/main_description')?>

