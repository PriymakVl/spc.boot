<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use app\widgets\OrderFormCylinderWidget;
	use app\modules\category\classes\Category;

	$image = Category::getImageForSeries($series);
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<? if ($image): ?>
          		<img src="<?='/web/images/'.$image->subdir.'/'.$image->filename?>" class="thumbnail" width="325" height="265">
        	<? else: ?>
          		<?= Html::img(['@img/no_photo_medium.png', ['class' => "thumbnail"]]) ?>
        	<? endif; ?>
			<br><br>
			<a href="#">
				<img width="50" height="50" src="/web/images/pdf_file.png">
				<span>Скачать каталог в формате PDF</span>
			</a>
		</div>
		<!-- form order cylinder -->
		<div class="col-md-8">
			<div class="row ">
				<?= OrderFormCylinderWidget::widget(['series' => $series]); ?>
			</div>
		</div>
	</div>
</div>