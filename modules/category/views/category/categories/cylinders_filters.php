<?php
	$standart = Yii::$app->request->get('standart');
	$type = Yii::$app->request->get('type');
?>

<div class="filters-wrp">
	<form>
		<!-- filter standart cylinder-->
		<section>
			<h3>
				<span>Стандарт</span>
				<i class="fas fa-angle-up"></i>
			</h3>

			<div class="filter-content-wrp">

				<div class="filter-item-wrp">
					<input type="checkbox" name="standart" <? if ($standart == 6430) echo 'checked'; ?> value="6430" >
					<label>ISO 6430</label>
				</div>
							<div class="filter-item-wrp">
					<input type="checkbox" name="standart" <? if ($standart == 6431) echo 'checked'; ?> value="6431" >
					<label>ISO 6431</label>
				</div>
							<div class="filter-item-wrp">
					<input type="checkbox" name="standart" <? if ($standart == 6432) echo 'checked'; ?> value="6432" >
					<label>ISO 6432</label>
				</div>
							<div class="filter-item-wrp">
					<input type="checkbox" name="standart" <? if ($standart == 'not') echo 'checked'; ?> value="no" >
					<label>Нестандартные</label>
				</div>
						
			</div>
		</section>

		<!-- filter type cylinder-->
		<section>
			<h3>
				<span>Тип</span>
				<i class="fas fa-angle-up"></i>
			</h3>

			<div class="filter-content-wrp">

				<div class="filter-item-wrp">
					<input type="checkbox" name="type" <? if ($type == 'mini') echo 'checked'; ?> value="mini" >
					<label>Миниатюрный</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="type" <? if ($type == 'compact') echo 'checked'; ?> value="compact" >
					<label>Компактный</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="type" <? if ($type == 'tandem') echo 'checked'; ?> value="tandem" >
					<label>Тандем</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="type" <? if ($type == 'rodless') echo 'checked'; ?> value="rodless" >
					<label>Бесштоковый</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="type" <? if ($type == 'integrated_guides') echo 'checked'; ?> value="integrated_guides" >
					<label>С направляющими</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="type" value="double" <? if ($type == 'double') echo 'checked'; ?>>
					<label>Сдвоенный</label>
				</div>
				<div class="filter-item-wrp">
					<input type="checkbox" name="type" <? if ($type == 'converter') echo 'checked'; ?>value="converter" >
					<label>Пневмогидр. преобразов.</label>
				</div>	
			</div>
		</section>

		<!-- form button block -->
		<div class="form-button-wrp">
			<input type="submit" value="Показать">
		</div>
	</form>
</div>