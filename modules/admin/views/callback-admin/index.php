<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Заказанные звонки';
?>


<div>
	 <h1><?= Html::encode($this->title) ?></h1>

	  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'phone',
            'state',

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:100px;'],
            'headerOptions' => ['class' => 'text-info'], 'header' => 'Операции',
            ], //'template' => '{delete}'
        ]
    ]); ?>
</div>

