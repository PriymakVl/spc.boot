<?php

use yii\helpers\Html;


$this->title = 'Редактирование состояние сообщения' ;

?>
<div class="message-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
