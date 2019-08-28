<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use app\widgets\OrderFormCylinderWidget;
?>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<? if ($cat->image): ?>
          		<img src="<?='/web/images/'.$cat->image->subdir.'/'.$cat->image->filename?>" class="thumbnail" width="325" height="265" alt="<?=$cat->name?>">
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
				<?= OrderFormCylinderWidget::widget(['category' => $cat]); ?>
			</div>
		</div>
	</div>
	<!-- tabs -->
	<div class="row">
		<div class="col-md-12">
			<? include 'tabs.php'; ?>
		</div>
	</div>
</div>