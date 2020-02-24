<!-- Product Buy Block -->
<div class="product__buy-block">

	<div class="product__series">
		<label>Серия:</label>
		<select name="series" id="product_series">
			<option value="">Не выбрана</option>
			<option value="cn">SA-CN</option>
			<option value="cu">SA-CU</option>
		</select>
	</div>

	<div class="product__model">
		<label>Модель:</label>
		<select name="model" id="product_model" disabled>
			<option value="">Не выбрана</option>
		</select>
	</div>

	<div class="product__size">
		<label>Пр. резьба:</label>
		<select name="size" id="product_size" disabled>
			<option value="">Не выбран</option>
		</select>
	</div>

	<div class="product__cart-block">
		<div class="product__counter-block">
			<span>-</span>
			<input type="text" id="count" value="1">
			<span>+</span>
		</div>

		<button class="product__cart-btn" type="submit" >
			<i class="fas fa-cart-plus product__cart-icon"></i>
			В корзину
		</button> 
	</div>
	
	<div class="product__buy-click">
		<input type="text" name="phone" id="" placeholder="Номер телефона">
		<button class="product__buy-click-btn">Купить в 1 клик</button> 
	</div>
</div> <!-- /.product__buy-block -->