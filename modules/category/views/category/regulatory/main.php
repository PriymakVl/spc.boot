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
	
	<?= Html::a('Заказать регулятор давления', ['/order/'.$cat->translit], ['class' => 'buy-btn buy-btn--top']) ?>

	<div class="cat__img">
		<img src="/web/images/block_prep.jpg">
	</div>
	<div class="cat__description">
		<div class="cat__description-inner">
			<p>
			Регуляторы используются для регулирования давления после себя, они снабжены клапаном сброса избыточного давления со стороны потребителя, манометром и кронштейном.   
			</p>
			<p>	 
		</div>
		<!-- Cat Alert -->
		<div class="cat-alert">
			<div class="cat-alert__item">
				<div class="cat-alert__img">
					<i class="fas fa-exclamation-circle"></i>
				</div>
				<div class="cat-alert__text"><b>Обратите внимание</b>, что в данном разделе представлены общепромышленные регуляторы давления с невысокой точностью регулирования давления. Если Вам нужно регулировать давление с высокой точностью (от 0,1 Бара), Вам необходимы регуляторы серии SA-RP <span class="red">(ссылка)</span>.  Также обратите внимание на электронные регуляторы для автоматизированных систем регулирования давления серии SA-EPV <span class="red">(ссылка)</span> и электронные мано-ваууметры серии SA-DPS <span class="red">(ссылка)</span>.</div>
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
	<?= Html::a('Заказать регулятор давления', ['/order/'.$cat->translit], ['class' => 'buy-btn buy-btn--middle']) ?>
</div>

<?//=$this->render('description/main_description')?>

