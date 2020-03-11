<?php 
	use yii\helpers\Html;
	use app\modules\category\classes\Category;

	$cat_cn = Category::findOne(['translit' => 'seriya_cn', 'status' => STATUS_ACTIVE]);
	$cat_cu = Category::findOne(['translit' => 'seriya_cu', 'status' => STATUS_ACTIVE]);
	$cat_cm = Category::findOne(['translit' => 'seriya_cm', 'status' => STATUS_ACTIVE]);
 ?>

<div class="cat__assortiment">
	<h2 class="cat__assortiment-title">В нашем ассортименте представлены 3 серии блоков подготовки воздуха</h2>
	<h3 class="cat__assortiment-subtitle">таблица с основными отличиями данных серий.</h3>
			
	<table>
		<tr>
			<th width="430">Серия</th>
			<th>SA-CN</th>
			<th>SA-CU</th>
			<th>SA-CМ</th>
		</tr>
		<tr>
			<td>Внешний вид</td>
			<!-- img seriya_cn -->
			<td class="cat__assortiment-img">
				<? if ($cat_cn->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_cn->image->subdir, $cat_cn->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>
			</td>
			<!-- img seriya_cn -->
			<td class="cat__assortiment-img">
				<? if ($cat_cu->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_cu->image->subdir, $cat_cu->image->filename);?>">
				<? else: ?>
					<?= Html::img('@web/images/no_photo_medium.png', ['width' => 100]) ?>
				<? endif; ?>			
			</td>
			<!-- img seriya_cm -->
			<td class="cat__assortiment-img">
				<? if ($cat_cm->image): ?>
					<img width="100" src="<?printf('/web/images/%s/%s', $cat_cm->image->subdir, $cat_cm->image->filename);?>">
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
			<td>Диапазон регулирования выходного давления</td>
			<td>0-10 Бар</td>
			<td>0-8 Бар</td>
			<td>0-8 Бар</td>
		</tr>

		<tr>
			<td>Присоединительные резьбы</td>
			<td>M5 - G1”</td>
			<td>G1/4” - G1”</td>
			<td>G1/4”,  G1/2”</td>
		</tr>

		<tr>
			<td>Тип регулятора</td>
			<td>Мембранный</td>
			<td>Поршневой</td>
			<td>Мембранный</td>
		</tr>

		<tr>
			<td>Тип слива конденсата (стандартный)</td>
			<td>Ручной</td>
			<td>Полуавтомат</td>
			<td>Полуавтомат</td>
		</tr>
					
		<tr>
			<td>Возможность установки автоматического слива конденсата</td>
			<td>Да</td>
			<td>Да</td>
			<td>Нет</td>
		</tr>

		<tr>
			<td>Материал защитного стакана</td>
			<td>Металл</td>
			<td>Пластик</td>
			<td>Пластик</td>
		</tr>

		<tr>
			<td>Комплект поставки</td>
			<td colspan="3">Блок подготовки, кронштейн, манометр</td>
		</tr>
	</table>
</div> <!-- /.cat__assortiment -->