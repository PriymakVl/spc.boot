<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\order\classes\Order;

function createLinkCustomer($order)
{
    $customer = $order->customer;
    $str = '<a class="customer-link" href="/customer/customer-admin/view?id_customer=%s">%s</a>';
    $str .= '<br><span>%s</span><br><span>%s</span>';
    return sprintf($str, $customer->id, $customer->name, $customer->email, $customer->phone);
}

function createFieldCylinders($order)
{
    if (!$order->cylinders) return '<span class="text-danger">нет</span>';
    $str = '';
    foreach ($order->cylinders as $cylinder) {
        $str .= $cylinder->code . '<br>';
    }
    return $str;
}

function createFieldProducts($order)
{
    if (!$order->products) return '<span class="text-danger">нет</span>';
    $str = '';
    foreach ($order->products as $product) {
        
        $str .= $product->name . '<br>';
    }
    return $str;
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
<!-- style link -->

<div class="order-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['attribute' => 'id', 'label' => '№ заказа', 'format' => 'raw', 'value' => function($model) {return '<a href="#">Заказ №'.$model->id.'</a>';}], 

            ['attribute' => 'id_customer', 'label' => 'Заказчик', 'format' => 'raw', 'value'=> function ($model) {return createLinkCustomer($model);}],

            ['attribute' => 'products', 'label' => 'Товары', 'headerOptions' => ['class' => 'text-info'], 'format' => 'raw', 'value'=> function ($model) {return createFieldProducts($model);}],
            
            ['attribute' => 'cylinders', 'header' => 'Цилиндры', 'format' => 'raw', 'headerOptions' => ['class' => 'text-info'], 'value'=> function ($model) {return createFieldCylinders($model);}],
            
            ['attribute' => 'state', 'label' => 'Состояние',
                'value' => function($model) {return $model->convertState();}, 'filter' => createSelectOrderState(),
            ],

            ['attribute' => 'registered', 'label' => 'Дата регистрации', 'value'=> function ($model) {return date('d.m.y', $model->registered);}],
            // ['attribute' => 'registered', 'header' => 'Зарегистрирован', 'format' => 'raw', 'headerOptions' => ['class' => 'text-info'], 'value'=> function ($model) {return createLinkPrice($model);}],
            
        ]
    ]); ?>


</div>
