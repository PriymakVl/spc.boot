<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
  use app\widgets\FilterWidget;
?>

<style type="text/css">

  .filters-cards-wrp {
    display: flex;
    /*justify-content: space-between;*/
  }

  .filters-wrp {
    width: 255px;
  }

  .cards-wrp {
/*    display: flex;
    justify-content: space-between;*/
    margin-left: 40px;
  }

  .cards-wrp .card {
    margin: 0 0 20px 20px;
  }

  .card-body {
    margin-bottom: 30px;
  }
</style>

<!-- products -->
<div class="row">
    <div class="container">
        <div class="row filters-cards-wrp">

          <!-- filters -->
          <? if ($cat->filters): ?>
            <?= FilterWidget::widget(['cat' => $cat]) ?>
          <? endif; ?>

          <!-- products -->
          <div class="cards-wrp">
            <? foreach ($products as $product): ?>
              	<div class="card">
                  	<div class="card-body">
                     	<a href="<?=Url::to(['/product/'.$product->getTranslit().'/'.$product->id])?>">
                        	<? if ($product->image): ?>
                          		<?= Html::img(['@img/'.$product->image->subdir.'/'.$product->image->filename, ['alt' => $product->name]]) ?>
                        	<? else: ?>
                          		<?= Html::img(['@img/no_photo_medium.png']) ?>
                        	<? endif; ?>
                      	</a>
                  	</div>

                    <!-- button add -->
                    <div class="btn-wrp">
                      <a href="/product/<?=$product->getTranslit().'/'.$product->id?>" class="btn btn-success" id="add-cart">Купить</a>
                    </div>
                  	<!-- footer -->
                	<div class="card-footer">
                       <?= Html::a($product->name, ['/product/'.$product->getTranslit().'/'.$product->id], ['alt' => '']) ?>
                	</div>
          		</div> 
            <? endforeach; ?>
          </div>
        </div>
    </div>
</div>



