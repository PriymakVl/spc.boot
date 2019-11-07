<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\widgets\LinkPager;
?>
<!-- sort product -->
<!-- <div class="sort-product-wrp">
	<div class="link-block">
		<a href="#">По популярности<i class="fas fa-angle-down"></i></a>
		<a href="#">По алфавиту<i class="fas fa-angle-down"></i></a>
		<a href="#">По цене<i class="fas fa-angle-down"></i></a>
	</div>
</div> -->

<style type="text/css">
  .card-body {
    margin-bottom: 30px;
  }
</style>

<!-- products -->
<div class="row">
    <div class="container">
        <div class="row cards-wrp">

            <? foreach ($products as $product): ?>
              	<div class="card">
                  	<div class="card-body">
                     	<a href="<?=Url::to(['/product', 'id_prod' => $product->id])?>">
                        	<? if ($product->image): ?>
                          		<?= Html::img(['@img/'.$product->image->subdir.'/'.$product->image->filename, ['alt' => $product->name]]) ?>
                        	<? else: ?>
                          		<?= Html::img(['@img/no_photo_medium.png']) ?>
                        	<? endif; ?>
                      	</a>
                  	</div>

                  	<!-- price -->
<!--                   	<div class="card-price">
                  		<? //if ($product->price->value): ?>
                          <span>Цена: </span>
            							<span class="price-value"><?=$product->price->value?></span>
            							<span class="price-currency">грн.</span>
            							<span class="price-measure">/шт</span>
                      <?// else: ?>
                        <span>Согласовать</span>
            					<? //endif; ?>
                  	</div> -->

                    <!-- button add -->
                    <div class="btn-wrp">
                      <a href="/product?id_prod=<?=$product->id?>" class="btn btn-success" id="add-cart">Купить</a>
                    </div>
                  	<!-- footer -->
	              	<div class="card-footer">
	                     <?= Html::a($product->name, ['/product', 'id_prod' => $product->id], ['alt' => '']) ?>
	              	</div>
          		</div> 
            <? endforeach; ?>

        </div>
    </div>
</div>

<!-- pagination -->
<div class="container">
  <div class="row">
    <div class="col-md-12 text-center">
      <?php if ($pages) echo LinkPager::widget(['pagination' => $pages,]); ?>
    </div>
  </div>
</div>


