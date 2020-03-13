<?php 

	$this->registerJsFile('@web/js/product/select/podgotovka_vozdukha/filtry_regulatory.js', ['depends' => 'yii\web\YiiAsset']);
	
 ?>

<!-- Select Product -->
<div class="product__select-block">
	<!-- Series -->
	<div class="product__series">
		<label>Серия:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана серия</div>
			<select name="series" id="product_series">
				<option value="">Не выбрана</option>
				<option value="SA-WN">SA-WN</option>
				<option value="SA-WU">SA-WU</option>
				<option value="SA-WM">SA-WM</option>
			</select>
		</div>
	</div>
	<!-- Thread -->
	<div class="product__thread">
		<label>Пр. резьба:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана присоединительная резьба</div>
			<select name="thread" id="product_thread" disabled>
				<option value="">Не выбрана</option>
			</select>
		</div>
	</div>
	<!-- Condensate -->
	<div class="product__condensate">
		<h3>Слив конденсата:</h3>
		<div class="error-message">Не выбран слив конденсата</div>
		<input type="radio" name="condensate" id="manual" value="">
		<label for="manual">Ручной</label>
		<input type="radio" name="condensate" id="semi-auto" value="S">
		<label for="semi-auto">Полуавтоматический</label>
		<input type="radio" name="condensate" id="auto" value="D">
		<label for="auto">Автоматический</label>
	</div>
</div> <!-- /.product__select-block -->