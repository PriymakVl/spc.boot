<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;

\yii\web\YiiAsset::register($this);

function getCategories($filter)
{
    $categories = $filter->getCategories();
    if (!$categories) return;
    $list = '<ol>';
    foreach ($categories as $category) {
        if (!$category) continue;
        $item = '<li>';
        if ($category->parent) $item .= $category->parent->name.' / ';
        $item .= $category->name.'</li>';
        $list .= $item;
    }
    return $list.'</ol>';
}

?>



<div class="category-view">

    <h1>Фильтр: <span class="text-success"><?=$this->title?></span></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот фильтр?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Элементы фильтра', ['filter-item-admin/index', 'id_filter' => $model->id], ['class' => 'btn btn-primary']) ?>
         <?= Html::a('Категории', ['filter-admin/categories', 'id_filter' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'title',
            ['attribute' => 'category', 'label' => 'Категории', 'format' => 'raw', 'value' => function($model) {return getCategories($model);} ],
        ],
    ]) ?>

</div>
