<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\order\classes\Order;

$states = [
    Order::STATE_REGISTERED => 'зарегистрирован',
    Order::STATE_CLOSED => 'выполнен',
    Order::STATE_PENDING => 'отложен',
];

?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <!-- state -->
    <?= $form->field($model, 'state')->dropdownList($states)->label('Состояние:'); ?>

    <!-- id -->
    <?//= $form->field($model, 'id')->hiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
