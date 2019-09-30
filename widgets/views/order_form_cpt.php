
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$efforts = ['3' => '3 тонны', '5' => '5 тонн', '10' => '10 тонн', '15' => '15 тонн', '20' => '20 тонн', '30' => '30 тонн', '40' => '40 тонн'];

?>

<h1 style="margin-top:0;">Форма для заказа пневмогидравлического  преобразователя</h1>

<div class="order-form-cylinder">

    <?php $form = ActiveForm::begin(['action' => ['/cart/add-converter']]); ?>

        <!-- maximum effort -->
        <?= $form->field($model, 'effort')->dropDownList($efforts, ['prompt' => 'Не выбрано'])->label('Максимальное усилие') ?>

        <div class="form-group">
            <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>