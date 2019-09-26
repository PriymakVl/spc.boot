<?php
	use app\modules\category\classes\Category;
	use yii\helpers\Html;
?>

<? foreach ($cart['cylinders'] as $index => $data): ?>
	<!-- get image for series -->
	<? 	$image = Category::getImageForSeries($data['series']); ?>
	<tr>
		<td>
			<? if ($image): ?>
          		<img src="<?='/web/images/'.$image->subdir.'/'.$image->filename?>">
        	<? else: ?>
          		<?= Html::img(['@img/no_photo_medium.png', ['class' => "thumbnail"]]) ?>
        	<? endif; ?>
    	</td>
		<td><?= Category::getCodeCylinder($data) ?></td>
		<td><?= Category::getDescriptionCylinder($data) ?></td>
		<td>Согласовать</td>
		<td><?=$data['qty']?></td>
		<td>
			 <?= Html::a('удалить', ['/cart/delete-item', 'index' => $index, 'type' => 'cylinders']) ?>
		</td>
	</tr>
<? endforeach; ?>