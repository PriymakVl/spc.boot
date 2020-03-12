<?php 
	use yii\helpers\Html;
	use app\modules\category\classes\Category;

	$cat_ln = Category::findOne(['translit' => 'seriya_ln', 'status' => STATUS_ACTIVE]);
	$cat_lu = Category::findOne(['translit' => 'seriya_lu', 'status' => STATUS_ACTIVE]);
	$cat_lm = Category::findOne(['translit' => 'seriya_lm', 'status' => STATUS_ACTIVE]);
 ?>

<div class="cat__assortiment">
	<h2 class="cat__assortiment-title">В нашем ассортименте представлены 3 серии маслораспылителей</h2>
	<h3 class="cat__assortiment-subtitle">таблица с основными отличиями данных серий.</h3>
			
	<table>
		<tr>
			<th width="430">Серия</th>
			<th>SA-LN</th>
			<th>SA-LU</th>
			<th>SA-LМ</th>
		</tr>
		<tr>
			<td>Внешний вид</td>
			<!-- img seriya_ln -->
			<td class="cat__assortiment-img">
				<? if ($cat_ln->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_ln->image->subdir, $cat_ln->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>
			</td>
			<!-- img seriya_lu -->
			<td class="cat__assortiment-img">
				<? if ($cat_lu->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_lu->image->subdir, $cat_lu->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
			<!-- img seriya_lm -->
			<td class="cat__assortiment-img">
				<? if ($cat_lm->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_lm->image->subdir, $cat_lm->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
		</tr>
		<tr>
			<td>Каталог PDF</td>
			<td class="cat__assortiment-pdf">
				<a href="">
					<img width="30" src="/web/images/pdf_file.png" alt="">
					скачать каталог
				</a>
			</td>
			<td class="cat__assortiment-pdf">
				<a href="">
					<img width="30" src="/web/images/pdf_file.png" alt="">
					скачать каталог
				</a>
			</td>
			<td class="cat__assortiment-pdf">
				<a href="">
					<img width="30" src="/web/images/pdf_file.png" alt="">
					скачать каталог
				</a>
			</td>
		</tr>

		<tr>
			<td>3D модель</td>
			<td>
				<a href="">
					Нет
					<!-- <img src="" alt=""> -->
				</a>
			</td>
			<td>
				<a href="">
					Нет
					<!-- <img src="" alt=""> -->
				</a>
			</td>
			<td>
				<a href="">
					Нет
					<!-- <img src="" alt=""> -->
				</a>
			</td>
		</tr>

		<tr>
			<td>Максимальное входное давление</td>
			<td>15 Бар</td>
			<td>10 Бар</td>
			<td>10 Бар</td>
		</tr>

		<tr>
			<td>Присоединительные резьбы</td>
			<td>M5 - G1”</td>
			<td>G1/4” - G1”</td>
			<td>G1/4”,  G1/2”</td>
		</tr>

		<tr>
			<td>Материал защитного стакана</td>
			<td>Металл</td>
			<td>Пластик</td>
			<td>Пластик</td>
		</tr>

		<tr>
			<td>Комплект поставки</td>
			<td colspan="2">Маслораспылитель, кронштейн</td>
			<td>Маслораспылитель</td>
		</tr>
	</table>
</div> <!-- /.cat__assortiment -->