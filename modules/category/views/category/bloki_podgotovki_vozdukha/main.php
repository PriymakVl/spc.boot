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
	<?= Html::a('Заказать блок подготовки воздуха', ['/order/'.$cat->translit], ['class' => 'buy-btn buy-btn--top']) ?>
	<div class="cat__img">
		<? if ($cat->image): ?>
			<img src="<?printf('/images/%s/%s', $cat->image->subdir, $cat->image->filename);?>">
		<? else: ?>
			<?= Html::img('/images/no_photo_medium.png') ?>
		<? endif; ?>
	</div>
	<div class="cat__description">
		<div class="cat__description-inner">
			<p>
			Блоки подготовки воздуха используются для отделения твердых частиц и капельной влаги от воздуха в пневматической системе, регулирования давления, а также для подачи в воздух масла, для смазки трущихся частей пневматических элементов. Блок подготовки воздуха состоит из фильтра-регулятора и маслораспылителя, собранных в одном корпусе. 
			</p>
			<p>	
			Фильтр оснащен сбросом конденсата, редуктор клапаном сброса избыточного давления со стороны потребителя, маслораспылитель позволяет регулировать объем масла подающегося в систему. Для снижения потеть давления и увеличения эффективности смазки трущихся элементов, данные блоки подготовки воздуха должны устанавливаться непосредственно на оборудовании, на котором используется сжатый воздух. 
			</p> 
		</div>
		<!-- Cat Alert -->
		<div class="cat-alert">
			<div class="cat-alert__item">
				<div class="cat-alert__img">
					<i class="fas fa-exclamation-circle"></i>
				</div>
				<div class="cat-alert__text"><b>Обратите внимание</b>, блоки подготовки воздуха отделяют только капельную влагу и не в состоянии осушать воздух, для осушки воздуха используйте осушители воздуха (ссылка) в комплекте с  магистральными фильтрами (ссылка).</div>
			</div>
			<div class="cat-alert__item">
				<div class="cat-alert__img">
					<i class="fas fa-exclamation-circle"></i>
				</div>
				<div class="cat-alert__text"><b>Также обратите внимание</b>, для продления срока службы вашего пневматического оборудования используйте масло ISO VG32 (ссылка на страницу с маслом) для пневматических систем, а так же не прекращайте подачу масла в систему, если вы ее уже начали.</div>
			</div>
		</div> <!-- /.cat-alert -->
	</div>	
</div> <!-- /.cat -->
	
<div class="consultation-order-wrp">
	<div data-toggle="modal" data-target="#callback-form" class="consultation-order">
		заказать консультацию
	</div>
</div>	

<?=$this->render('cat_assortiment')?>


<div class="buy-btn-wrp">
	<?= Html::a('Заказать блок подготовки воздуха', ['/order/'.$cat->translit], ['class' => 'buy-btn buy-btn--middle']) ?>
</div>

<?=$this->render('description/main_description')?>


