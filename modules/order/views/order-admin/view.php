<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="order-view">

    <h1>Информация по заказу №<?=$model->id?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить заказ?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'id', 'label' => '№заказа', 'value' => function($model) {return $model->id;}],
            ['attribute' => 'registered', 'label' => 'Дата регистрации', 'value' => function($model) {return date('d.m.y', $model->registered);}],
            ['attribute' => 'closed', 'label' => 'Дата выполнения', 'value' => function($model) {return $model->closed ? date('d.m.y', $model->closed) : '';}],
            ['attribute' => 'state', 'label' => 'Состояние', 'format' => 'raw', 'value' => function($model) {return $model->createFieldState();}],
            ['attribute' => 'id_customer', 'label' => 'Заказчик', 'format' => 'raw', 'value' => function($model) {return $model->createLinkCustomer();}],
            ['attribute' => 'products', 'label' => 'Товары', 'format' => 'raw', 'value' => function($model) {return $model->createFieldProducts();}],
            ['attribute' => 'cylinders', 'label' => 'Цилиндры', 'format' => 'raw', 'value' => function($model) {return $model->createFieldCylinders();}],
            ['attribute' => 'note', 'label' => 'Примечание', 'value' => function($model) {return $model->note;}],
        ],
    ]) ?>

</div>

