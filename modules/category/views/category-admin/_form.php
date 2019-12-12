<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filter\Filter;
?>
<!-- css -->
<link rel="stylesheet" href="/web/css/admin/form.css">

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- name -->
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <!-- code -->
    <?= $form->field($model, 'code')->textInput() ?>

    <!-- parent -->
     <?= $form->field($model, 'id_parent')->dropDownList($model->convertForSelectMain(), ['prompt' => 'Не выбрана'])->label('Родительская категория') ?>

    <!-- rating -->
    <?= $form->field($model, 'rating')->textInput() ?>

    <!-- translit -->
    <?= $form->field($model, 'translit')->textInput() ?>

    <!-- meta title -->
    <?= $form->field($model, 'meta_title')->textarea(['rows' => 1]) ?>

    <!-- meta keywords -->
    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => 1]) ?>

    <!-- meta description -->
    <?= $form->field($model, 'meta_description')->textarea(['rows' => 2]) ?>

    <!-- description -->
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
