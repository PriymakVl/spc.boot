<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
  use app\widgets\FilterWidget;
?>

<style type="text/css">

.filters-cats-wrp {
  display: flex;
}

</style>

<div class="row">
    <div class="container filters-cats-wrp">

          <!-- filters -->
          <? if ($cat->filters): ?>
            <?= FilterWidget::widget(['cat' => $cat]) ?>
          <? endif; ?>
          
          <!-- categories -->
          <div class="cards-wrp">
            <? foreach ($cat->children as $subcat): ?>
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
                      <?= Html::a($subcat->name, ['/category/'.$subcat->translit], ['alt' => $subcat->preview]) ?>
                </div>
              </div> 
            <? endforeach; ?>
          </div>
          
    </div>
</div>



