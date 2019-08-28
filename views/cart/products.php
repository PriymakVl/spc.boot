<?php
	use app\modules\product\classes\Product;
	use yii\helpers\Html;
?>

<? foreach ($cart['products'] as  $index => $product): ?>
	<? $product = (object) $product; ?>
	<tr>
		<td>
			<?= Html::img([$product->img, ['alt' => $product->name]]) ?>
		<td><?= $product->name ?></td>
		<td><?= $product->preview ?></td>
		<td><?= $product->price ?></td>
		<td>
			<input type="number" name="qty" value="1" style="width:50px;">
		<td>
			 <?= Html::a('удалить', ['/main/delete-item-cart', 'index' => $index, 'type' => 'products']) ?>
		</td>
	</tr>
<? endforeach; ?>