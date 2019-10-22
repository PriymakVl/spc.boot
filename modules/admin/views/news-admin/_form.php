<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use App\modules\admin\classes\Message;

$states = [Message::STATE_NOT_PROCESSED => 'не обработан', Message::STATE_PROCESSED => 'обработан', Message::STATE_DELAYED => 'отложен'];

?>


<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'state')->dropdownList($states)->label('Состояние сообщения'); ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
