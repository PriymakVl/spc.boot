
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filter\Category;
?>

<h1 style="margin-top:0;">Форма для заказа пневмоцилиндра</h1>

<div class="order-form-cylinder">

    <?php $form = ActiveForm::begin(['action' => ['/cart/add-cylinder']]); ?>

    <!-- series cylinder -->
    <?= $form->field($model, 'id_cat')->dropDownList($data['series'], ['id' => 'id_cat'])->label('Серия пневмоцилиндра'); ?>

    <!-- cylinder diameter-->
    <?= $form->field($model, 'diameter')->dropDownList($data['diameters'], ['prompt' => 'Не выбран'])->label('Диаметр поршня'); ?>
    
    <!-- cylinder stroke -->
    <? if ($code == 'CP'): ?>
        <?= $form->field($model, 'stroke')->dropDownList([5 => '5мм', 10 => '10мм', 15 => '15мм'], ['prompt' => 'Не выбран'])->label('Ход цилиндра:') ?> 
    <? else: ?>
        <? $label_stroke = 'Ход цилиндра: <span style="color:#444;">от 5мм до '.$data['max_stroke'].'мм</span>'; ?>
        <?= $form->field($model, 'stroke')->textInput()->label($label_stroke) ?>
    <? endif; ?>
    
     <!-- cylinder count -->
    <?= $form->field($model, 'qty')->textInput(['type' => 'number', 'value' => 1])->label('Количество') ?>
    
    <!-- cylinder magneto -->
    <? $model->magneto = 'yes'; ?>
    <? if ($data['magneto'] === 'option'): ?>
        <?= $form->field($model, 'magneto')->radioList(['yes' => 'С магнитом', 'no' => 'Без магнита'])->label('Наличие магнита на поршне') ?>
    <? elseif ($data['magneto'] === true): ?>
        <?= $form->field($model, 'magneto')->radioList(['yes' => 'С магнитом'])->label('Наличие магнита на поршне') ?>
    <? endif; ?>
    
    <!-- cylinder thread rod -->
    <? if ($code == 'CP'): ?>
        <? $model->thread_rod = 'with'; ?>
        <?= $form->field($model, 'thread_rod')->radioList(['with' => 'С резьбой', 'without' => 'Без резьбы'])->label('Резьба на штоке') ?>
    <? elseif ($data['thread_rod'] === 'option'): ?>
        <? $model->thread_rod = 'out'; ?>
        <?= $form->field($model, 'thread_rod')->radioList(['out' => 'Наружная', 'inner' => 'Внутренняя'])->label('Резба на штоке') ?>
    <? elseif($data['thread_rod'] === 'out'): ?>
        <? $model->thread_rod = 'out'; ?>
        <?= $form->field($model, 'thread_rod')->radioList(['out' => 'Наружная'])->label('Резба на штоке') ?>
    <? endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>