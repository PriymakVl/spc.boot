<?php
	use yii\helpers\Html;
	use yii\helpers\Url;
	use app\modules\product\classes\Product;
?>

<? foreach ($cart['products'] as  $index => $product): ?>
	<? $product = (object) $product; ?>
	<tr>
		<td>
			<?= Html::img([$product->img, ['alt' => $product->name]]) ?>
		<td class="cart__name"><?= $product->name ?></td>
		<td class="cart__preview"><?= $product->preview ?></td>
		<td class="cart__price">Согласовать</td>
		<td class="cart__qty"><?= $product->qty ?></td>
		<td class="cart__item-delete">
			<a href="<?=Url::to(['/cart/delete-item', 'index' => $index, 'type' => 'products'])?>">
				<i class="fas fa-trash-alt cart__item-delete-icon"></i>
			</a>
		</td>
	</tr>
<? endforeach; ?>