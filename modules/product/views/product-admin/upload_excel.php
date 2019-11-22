<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
 // debug($product->image);
?>

<div>

    <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-heading">Форма загрузки продуктов из файла excel</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                <?= $form->field($model, 'excelFile')->fileInput()->label(false) ?>

                <div class="form-group">
                    <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
                    <a href="<?=Yii::$app->request->referrer?>" class="btn btn-primary">Отменить</a>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>  
    

</div>
