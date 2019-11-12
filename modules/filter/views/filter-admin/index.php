<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\filter\classes\Filter;

$this->title = 'Фильтры';
$this->params['breadcrumbs'][] = $this->title;

function getCategories($filter)
{
    $categories = $filter->getCategories();
    if (!$categories) return;
    $list = '<ol>';
    foreach ($categories as $category) {
        $item = '<li>';
        if ($category->parent) $item .= $category->parent->name.' / ';
        $item .= $category->name.'</li>';
        $list .= $item;
    }
    return $list.'</ol>';
}

?>
<div class="filter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать фильтр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'title', 'label' => 'Название'],
            ['attribute' => 'categories', 'format' => 'raw', 'label' => 'Категории', 'value' => function($model) {return getCategories($model);}],
            ['class' => 'yii\grid\ActionColumn', 'header' => 'Операции'],
        ],
    ]); ?>


</div>
