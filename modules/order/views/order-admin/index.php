<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\order\classes\Order;


function createLinkOrder($order)
{
    return sprintf('<a href="/order/order-admin/view?id=%s">Заказ №%s</a>', $order->id, $order->id);
}

function createSelectOrderState()
{
    $states = [];
    $states[Order::STATE_REGISTERED] = Order::convertState(Order::STATE_REGISTERED);
    $states[Order::STATE_CLOSED] = Order::convertState(Order::STATE_CLOSED);
    $states[Order::STATE_PENDING] = Order::convertState(Order::STATE_PENDING);
    return $states;
}


$this->title = 'Заказы';

?>

<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'id', 'label' => '№ заказа', 'format' => 'raw', 'value' => function($model) {return createLinkOrder($model);}], 

            ['attribute' => 'id_customer', 'label' => 'Заказчик', 'format' => 'raw', 'value'=> function ($model) {return $model->createLinkCustomer();}],

            ['attribute' => 'products', 'label' => 'Товары', 'headerOptions' => ['class' => 'text-info'], 'format' => 'raw', 'value'=> function ($model) {return $model->createFieldProducts();}],
            
            ['attribute' => 'cylinders', 'header' => 'Цилиндры', 'format' => 'raw', 'headerOptions' => ['class' => 'text-info'], 'value'=> function ($model) {return $model->createFieldCylinders();}],
            
            ['attribute' => 'state', 'label' => 'Состояние', 'filter' => createSelectOrderState(), 'format' => 'raw',
                'value' => function($model) {return $model->createFieldState();},
            ],

            ['attribute' => 'registered', 'label' => 'Дата рег.', 'value'=> function ($model) {return date('d.m.y', $model->registered);}],

            ['attribute' => 'closed', 'label' => 'Дата вып.', 'value'=> function ($model) { return $model->closed ? date('d.m.y', $model->closed) : '';}],
            
            ['class' => 'yii\grid\ActionColumn', 'template' => '{delete} {update}', 'header' => 'Упр.', 'headerOptions' => ['class' => 'text-info']],
            
        ]
    ]); ?>


</div>
