<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
  use app\widgets\FilterWidget;

  $cylinders = $cat->childrenFilter ? $cat->childrenFilter : $cat->children;
?>

<style type="text/css">
  .filters-cats-wrp {
    display: flex;
  }
  .cards-wrp {
    margin-left: 0;
  }
  .card {
    width: 275px; height: 270px;
  }
  .card-preview {
    font-size: 13px;
  }
</style>

<div class="row">
    <div class="container filters-cats-wrp">

        <!-- filters -->
        <?= $this->render('cylinders_filters'); ?>

        <div class="row cards-wrp">

            <? foreach ($cylinders as $subcat): ?>
              	<div class="card">
                  	<div class="card-body">
                     	<a href="<?=Url::to(['/category/'.$subcat->translit])?>">
                        	<? if ($subcat->image): ?>
                          		<?= Html::img(['@img/'.$subcat->image->subdir.'/'.$subcat->image->filename, ['alt' => $subcat->name]]) ?>
                        	<? else: ?>
                          		<?= Html::img(['@img/no_photo_medium.png']) ?>
                        	<? endif; ?>
                      	</a>
                  	</div>
	              	<div class="card-footer">
                    <div class="card-preview"><?=$subcat->preview?></div>
	                  <?= Html::a($subcat->name, ['/category/'.$subcat->translit], ['alt' => $subcat->preview]) ?>
	              	</div>
          		</div> 
            <? endforeach; ?>

        </div>
    </div>
</div>



