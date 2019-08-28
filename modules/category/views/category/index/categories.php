<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
?>

<div class="row">
    <div class="container">
        <div class="row cards-wrp">

            <? foreach ($cat->children as $subcat): ?>
              	<div class="card">
                  	<div class="card-body">
                     	<a href="<?=Url::to(['/category', 'id_cat' => $subcat->id])?>">
                        	<? if ($subcat->image): ?>
                          		<?= Html::img(['@img/'.$subcat->image->subdir.'/'.$subcat->image->filename, ['alt' => $subcat->name]]) ?>
                        	<? else: ?>
                          		<?= Html::img(['@img/no_photo_medium.png']) ?>
                        	<? endif; ?>
                      	</a>
                  	</div>
	              	<div class="card-footer">
	                      <?= Html::a($subcat->name, ['/category', 'id_cat' => $subcat->id], ['alt' => $subcat->preview]) ?>
	              	</div>
          		</div> 
            <? endforeach; ?>

        </div>
    </div>
</div>



