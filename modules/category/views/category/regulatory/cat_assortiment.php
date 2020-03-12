<?php 
	use yii\helpers\Html;
	use app\modules\category\classes\Category;

	$cat_rn = Category::findOne(['translit' => 'seriya_rn', 'status' => STATUS_ACTIVE]);
	$cat_ru = Category::findOne(['translit' => 'seriya_ru', 'status' => STATUS_ACTIVE]);
	$cat_rm = Category::findOne(['translit' => 'seriya_rm', 'status' => STATUS_ACTIVE]);
	$cat_rh = Category::findOne(['translit' => 'seriya_rh', 'status' => STATUS_ACTIVE]);
	$cat_rhf = Category::findOne(['translit' => 'seriya_rhf', 'status' => STATUS_ACTIVE]);
 ?>

<div class="cat__assortiment">
	<h2 class="cat__assortiment-title">В нашем ассортименте представлены 5 серий регуляторов давления</h2>
	<h3 class="cat__assortiment-subtitle">таблица с основными отличиями данных серий.</h3>
			
	<table>
		<tr>
			<th width="430">Серия</th>
			<th>SA-RN</th>
			<th>SA-RU</th>
			<th>SA-RМ</th>
			<th>SA-RH</th>
			<th>SA-RHF</th>
		</tr>
		<tr>
			<td>Внешний вид</td>
			<!-- img seriya_rn -->
			<td class="cat__assortiment-img">
				<? if ($cat_rn->image): ?>
					<img width="100" src="<?printf('/images/%s/%s', $cat_rn->image->subdir, $cat_rn->image->filename);?>">
				<? else: ?>
					<?= Html::img('/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>
			</td>
			<!-- img seriya_ru -->
			<td class="cat__assortiment-img">
				<? if ($cat_ru->image): ?>
					<img width="100" src="<?printf('/images/%s/%s', $cat_ru->image->subdir, $cat_ru->image->filename);?>">
				<? else: ?>
					<?= Html::img('/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
			<!-- img seriya_rm -->
			<td class="cat__assortiment-img">
				<? if ($cat_rm->image): ?>
					<img width="100" src="<?printf('/images/%s/%s', $cat_rm->image->subdir, $cat_rm->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
			<!-- img seriya_rhf -->
			<td class="cat__assortiment-img">
				<? if ($cat_rh->image): ?>
					<img width="100" src="<?printf('/images/%s/%s', $cat_rh->image->subdir, $cat_rh->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>
			</td>
			<!-- img seriya_rh -->
			<td class="cat__assortiment-img">
				<? if ($cat_rhf->image): ?>
					<img width="100" src="<?printf('/images/%s/%s', $cat_rhf->image->subdir, $cat_rhf->image->filename);?>">
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
					<!-- <img src="" alt=""> -->
					Нет
				</a>
			</td>
			<td>
				<a href="">
					<!-- <img src="" alt=""> -->
					Нет
				</a>
			</td>
			<td>
				<a href="">
					<!-- <img src="" alt=""> -->
					Нет
				</a>
			</td>
			<td>
				<a href="">
					<!-- <img src="" alt=""> -->
					Нет
				</a>
			</td>
			<td>
				<a href="">
					<!-- <img src="" alt=""> -->
					Нет
				</a>
			</td>
		</tr>

		<tr>
			<td>Максимальное входное давление</td>
			<td>15 Бар</td>
			<td>10 Бар</td>
			<td>10 Бар</td>
			<td>40 Бар</td>
			<td>10 Бар</td>
		</tr>

		<tr>
			<td>Диапазон регулирования выходного давления</td>
			<td>0-10 Бар</td>
			<td>0-8 Бар</td>
			<td>0-8 Бар</td>
			<td>2,5-35 Бар</td>
			<td>0-8 Бар</td>
		</tr>

		<tr>
			<td>Присоединительные резьбы</td>
			<td>M5 - G1”</td>
			<td>G1/4” - G1”</td>
			<td>G1/4”,  G1/2”</td>
			<td>G1/2”,  G1”</td>
			<td>G2”</td>
		</tr>

		<tr>
			<td>Тип регулятора</td>
			<td>Мембранный</td>
			<td>Поршневой</td>
			<td>Мембранный</td>
			<td>Поршневой</td>
			<td>Мембранный</td>
		</tr>

		<tr>
			<td>Комплект поставки</td>
			<td colspan="3">Регулятор, кронштейн, манометр</td>
			<td colspan="2">Регулятор, манометр</td>
		</tr>
	</table>
</div> <!-- /.cat__assortiment -->