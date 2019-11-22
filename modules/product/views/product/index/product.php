<?
	use yii\helpers\Html;
?>

<style type="text/css">
	.product-price {
		font-size: 16px;
		margin: 10px 0 20px;
	}

	.price-value {
		font=size: 20px;
	}

	.product-form-order input[type="number"] {
		margin: 0 35px 0 15px;
		height: 30px;
		width: 70px;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col-md-4">
			<? if ($product->image): ?>
	      		<img src="<?='/web/images/'.$product->image->subdir.'/'.$product->image->filename?>" class="thumbnail" width="325" height="265" alt="<?=$product->name?>">
	    	<? else: ?>
	      		<?= Html::img(['@img/no_photo_medium.png', ['class' => "thumbnail"]]) ?>
	    	<? endif; ?>
		</div>

		
		<div class="col-md-8">
			<div class="row ">
				<h1 style="margin-top:0;"><?=$product->name?></h1>
			
				<!-- form order  -->
				<div class="product-form-order">
					<form action="/cart/add-product">
				    	<label>Кол-во товара:</label>
				    	<!-- count product -->
				    	<input type="number" name="qty" value="1">
				    	<!-- id product -->
				    	<input type="hidden" name="id_prod" value="<?=$product->id?>">
				    	
				        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-success']) ?>
			    	</form>
				</div>
			    
				<!-- pdf -->
			    <br><br>
				<a href="#">
					<img width="50" height="50" src="/web/images/pdf_file.png">
					<span>Скачать каталог в формате PDF</span>
				</a>

			</div>
		</div>
	</div>
</div>