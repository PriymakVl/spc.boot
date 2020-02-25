<!-- Product Buy Block -->
<div class="product__buy-block">
	<div class="product__series">
		<label>Серия:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана серия</div>
			<select name="series" id="product_series">
				<option value="">Не выбрана</option>
				<option value="cn">SA-CN</option>
				<option value="cu">SA-CU</option>
			</select>
		</div>
		
	</div>

	<div class="product__model">
		<label>Модель:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана модель</div>
			<select name="model" id="product_model" disabled>
				<option value="">Не выбрана</option>
			</select>
		</div>
	</div>

	<div class="product__size">
		<label>Пр. резьба:</label>
		<div class="select-wrp">
			<div class="error-message">Не выбрана резьба</div>
			<select name="size" id="product_size" disabled>
				<option value="">Не выбран</option>
			</select>
		</div>
	</div>

	<div class="product__cart-block">
		<div class="product__counter-block">
			<div class="error-message">Нет количества</div>
			<span id="product_count_minus">-</span>
			<input type="text" id="product_count" value="1" name="count">
			<span id="product_count_plus">+</span>
		</div>

		<button class="product__cart-btn" type="button" data-toggle="modal" data-target="#cart_modal$$">
			<i class="fas fa-cart-plus product__cart-icon"></i>
			В корзину
		</button> 
	</div>


<!-- 	<div class="product__buy-click">
	<input type="text" name="phone" id="" placeholder="Номер телефона">
	<button class="product__buy-click-btn">Купить в 1 клик</button> 
</div> -->
</div> <!-- /.product__buy-block -->