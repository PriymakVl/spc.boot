<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="news-image-form">

    <h1>Изображение новости: <span class="text-info"><?=$news->title?></span></h1>
    <? if ($news->image): ?>
        <img class="img-thumbnail" src="<?printf('/web/images/%s/%s', $news->image->subdir, $news->image->filename);?>">
        <div class="alert alert-info" style="margin-top: 20px;">
            При загрузке файла изображение новости будет заменено.
        </div>
    <? else: ?>
        <div class="alert alert-danger">
            Изображения еще нет
        </div>
    <? endif; ?>

    <div class="panel panel-default" style="margin-top: 20px;">
        <div class="panel-heading">Форма для добавления изображения новости</div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'imageFile')->fileInput()->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Загрузить', ['class' => 'btn btn-success']) ?>
                <a href="<?=Yii::$app->request->referrer?>" class="btn btn-primary">Отменить</a>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>  
    

</div>
