<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\classes\Customer;
use app\modules\order\classes\Order;

$this->title = 'Заказчики';

?>

<div>
	 <h1><?= Html::encode($this->title) ?></h1>

	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',

            'phone',

            'email',

            ['attribute' => 'orders', 'label' => 'Количество заказов', 'headerOptions' => ['class' => 'text-info'], 'format' => 'raw', 'value' => function($model) {return $model->createLinkCountOrders();}],

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:100px; text-align:center;'],

            'headerOptions' => ['class' => 'text-info'], 'header' => 'Операции', 'template' => '{view}',
            ],  
        ]
    ]); ?>
</div>



