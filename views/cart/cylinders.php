<?php
	use app\modules\category\classes\Category;
	use yii\helpers\Html;
?>

<? foreach ($cart['cylinders'] as $index => $data): ?>
	<? $cat = Category::findOne(['id' => $data['id_cat']]); ?>
	<tr>
		<td>
			<?= Html::img(['@img/'.$cat->image->subdir.'/'.$cat->image->filename, ['alt' => $cat->name]]) ?>
		<td><?= $cat->getCodeCylinder($data) ?></td>
		<td><?= $cat->getDescriptionCylinder($data) ?></td>
		<td>Согласовать</td>
		<td><input type="number" name="qty" value="<?=$data['qty']?>" style="width:50px;"></td>
		<td>
			 <?= Html::a('удалить', ['/cart/delete-item', 'index' => $index, 'type' => 'cylinders']) ?>
		</td>
	</tr>
<? endforeach; ?>