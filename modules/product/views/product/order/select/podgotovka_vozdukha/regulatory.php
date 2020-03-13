<?php 

	$this->registerJsFile('@web/js/product/select/podgotovka_vozdukha/regulatory.js', ['depends' => 'yii\web\YiiAsset']);
	
 ?>
<!--Select Product -->
<div class="product__select-block">
	<!-- Series -->
	<div class="product__series">
		<label>Серия:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана серия</div>
			<select name="series" id="product_series">
				<option value="">Не выбрана</option>
				<option value="SA-RN">SA-RN</option>
				<option value="SA-RU">SA-RU</option>
				<option value="SA-RM">SA-RM</option>
				<option value="SA-RH">SA-RH</option>
				<option value="SA-RHF">SA-RHF</option>
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
	
</div> <!-- /.product__select-block -->