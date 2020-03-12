<?php 
	use yii\helpers\Html;
	use app\modules\category\classes\Category;

	$cat_fn = Category::findOne(['translit' => 'seriya_fn', 'status' => STATUS_ACTIVE]);
	$cat_fu = Category::findOne(['translit' => 'seriya_fu', 'status' => STATUS_ACTIVE]);
	$cat_fm = Category::findOne(['translit' => 'seriya_fm', 'status' => STATUS_ACTIVE]);
	$cat_fh = Category::findOne(['translit' => 'seriya_fh', 'status' => STATUS_ACTIVE]);
 ?>
<div class="cat__assortiment">
	<h2 class="cat__assortiment-title">В нашем ассортименте представлены 4 серии фильтров</h2>
	<h3 class="cat__assortiment-subtitle">таблица с основными отличиями данных серий.</h3>
			
	<table>
		<tr>
			<th width="430">Серия</th>
			<th>SA-FN</th>
			<th>SA-FU</th>
			<th>SA-FМ</th>
			<th>SA-FH</th>
		</tr>
		<tr>
			<td>Внешний вид</td>
			<!-- img seriya_fn -->
			<td class="cat__assortiment-img">
				<? if ($cat_fn->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_fn->image->subdir, $cat_fn->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>
			</td>
			<!-- img seriya_fu -->
			<td class="cat__assortiment-img">
				<? if ($cat_fu->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_fu->image->subdir, $cat_fu->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
			<!-- img seriya_fm -->
			<td class="cat__assortiment-img">
				<? if ($cat_fm->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_fm->image->subdir, $cat_fm->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
			<!-- img seriya_fh -->
			<td class="cat__assortiment-img">
				<? if ($cat_fh->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_fh->image->subdir, $cat_fh->image->filename);?>">
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
			<td>40 Бар</td>
		</tr>

		<tr>
			<td>Присоединительные резьбы</td>
			<td>M5 - G1”</td>
			<td>G1/4” - G1”</td>
			<td>G1/4”,  G1/2”</td>
			<td>G1/2”,  G1”</td>
		</tr>

		<tr>
			<td>Тип слива конденсата (стандартный)</td>
			<td>Ручной</td>
			<td>Полуавтомат</td>
			<td>Полуавтомат</td>
			<td>Полуавтомат</td>
		</tr>
					
		<tr>
			<td>Возможность установки автоматического слива конденсата</td>
			<td>Да</td>
			<td>Да</td>
			<td>Нет</td>
			<td>Нет</td>
		</tr>

		<tr>
			<td>Материал защитного стакана</td>
			<td>Металл</td>
			<td>Пластик</td>
			<td>Пластик</td>
			<td>Металл</td>
		</tr>

		<tr>
			<td>Комплект поставки</td>
			<td colspan="2">Фильтр, кронштейн</td>
			<td colspan="2">Фильтр</td>
		</tr>
	</table>
</div> <!-- /.cat__assortiment -->