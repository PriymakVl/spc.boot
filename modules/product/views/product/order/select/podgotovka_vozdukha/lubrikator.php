<?php 

	$this->registerJsFile('@web/js/product/select/podgotovka_vozdukha/lubrikator.js', ['depends' => 'yii\web\YiiAsset']);
	
 ?>
<!-- Select Product -->
<div class="product__select-block">
	<div class="product__series">
		<label>Серия:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана серия</div>
			<select name="series" id="product_series">
				<option value="">Не выбрана</option>
				<option value="SA-LN">SA-LN</option>
				<option value="SA-LU">SA-LU</option>
				<option value="SA-LM">SA-LM</option>
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