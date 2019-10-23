<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use App\modules\admin\classes\News;

?>


<div class="message-form">

    <?php $form = ActiveForm::begin(); ?>

	    <?= $form->field($model, 'title')->label('Заголовок') ?>

	    <?= $form->field($model, 'text')->textarea(['rows' => '6'])->label('Текст новости') ?>

	    <div class="form-group">
	        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
	        <?= Html::a('Отменить', ['index'], ['class' => 'btn btn-info']) ?>
	    </div>

    <?php ActiveForm::end(); ?>

</div>
