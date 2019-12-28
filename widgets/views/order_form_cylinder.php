
<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\filter\Category;

$product_name = 'пневмоцилиндра';
$rail_series = ['GMS', 'GMSS', 'GLS', 'GLSS', 'GLSD'];
if (in_array($model->series, $rail_series)) $product_name = 'направляющей';
?>

<h1 style="margin-top:0;">Форма для заказа <?=$product_name?></h1>

<div class="order-form-cylinder">

    <?php $form = ActiveForm::begin(['action' => ['/cart/add-cylinder']]); ?>

    <!-- series cylinder -->
    <?= $form->field($model, 'series')->dropDownList($data['series'], ['id' => 'series_cylinder'])->label('Серия'); ?>

    <!-- cylinder diameter-->
    <?= $form->field($model, 'diameter')->dropDownList($data['diameters'], ['prompt' => 'Не выбран'])->label('Диаметр поршня'); ?>
    
    <!-- cylinder stroke -->
    <? if ($model->series == 'CP'): ?>
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
    <? if ($model->series == 'CP'): ?>
        <? $model->thread_rod = 'with'; ?>
        <?= $form->field($model, 'thread_rod')->radioList(['with' => 'С резьбой', 'without' => 'Без резьбы'])->label('Резьба на штоке') ?>
    <? elseif ($data['thread_rod'] === 'option'): ?>
        <? $model->thread_rod = 'out'; ?>
        <?= $form->field($model, 'thread_rod')->radioList(['out' => 'Наружная', 'inner' => 'Внутренняя'])->label('Резба на штоке') ?>
    <? elseif($data['thread_rod'] === 'out'): ?>
        <? $model->thread_rod = 'out'; ?>
        <?= $form->field($model, 'thread_rod')->radioList(['out' => 'Наружная'])->label('Резьба на штоке') ?>
    <? endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
