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
		<td><?= $product->qty ?></td>
		<td>
			 <?= Html::a('удалить', ['/cart/delete-item', 'index' => $index, 'type' => 'products']) ?>
		</td>
	</tr>
<? endforeach; ?>