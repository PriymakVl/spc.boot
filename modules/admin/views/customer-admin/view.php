<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

?>
<div class="order-view">

    <h1>Информация по заказчику <span class="text-primary"><?=$model->name?></span></h1>

    <p>
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
            
            ['attribute' => 'name', 'label' => 'Имя'],

            'phone',

            'email',

            ['attribute' => 'orders', 'label' => 'Количество заказов', 'format' => 'raw', 'value' => function($model) {return $model->createLinkCountOrders();}],
        ],
    ]) ?>

</div>

