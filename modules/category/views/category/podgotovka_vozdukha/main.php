<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->registerCssFile('@web/css/content/category.css');

?>

<?=$this->render('breadcrumbs', ['cat' => $cat])?>

<h1 class="page-title"><?=$cat->name?></h1>

<!-- Category -->
<div class="category">

	<? foreach ($cat->children as $subcat): ?>
		<a href="<?=Url::to(['/category/'.$subcat->translit])?>" class="category__item">
			<div class="category__img">
            	<? if ($subcat->image): ?>
					<?= Html::img(['@img/'.$subcat->image->subdir.'/'.$subcat->image->filename, ['alt' => $subcat->name]]) ?>
				<? else: ?>
						<?= Html::img(['@img/no_photo_medium.png']) ?>
				<? endif; ?>
			</div>
			<div class="category__preview">
				<div class="category__name"><?=$subcat->name?></div>
				<div class="category__desc"><?=$subcat->preview?></div>
			</div>
		</a>
	<? endforeach; ?>

</div> <!-- /.category -->






