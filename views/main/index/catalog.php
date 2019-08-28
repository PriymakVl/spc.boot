<?php
  use yii\helpers\Url;
  use yii\helpers\Html;
?>

<div class="row">
    <div class="container">
        <h2 class="text-center">Каталог оборудования</h2>
        <div class="row cards-wrp">

          <? if ($catalog): ?>
            <? foreach ($catalog as $cat): ?>
              <div class="card">
                  <div class="card-body">
                     <a href="<?=Url::to(['/category', 'id_cat' => $cat->id])?>">
                        <? if ($cat->image): ?>
                          <?= Html::img(['@img/'.$cat->image->subdir.'/'.$cat->image->filename, ['alt' => $cat->name]]) ?>
                        <? else: ?>
                          <?= Html::img(['@img/no_photo_medium.png']) ?>
                        <? endif; ?>
                      </a>
                      
                  </div>
                  <div class="card-footer">
                      <?= Html::a($cat->name, ['/category', 'id_cat' => $cat->id], ['alt' => $cat->preview]) ?>
                  </div>
              </div> 
            <? endforeach; ?>
          <? endif; ?>

        </div>
    </div>
</div>
