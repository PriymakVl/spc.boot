<?php

use yii\helpers\Html;


$this->title = 'Редактировать новость' ;

?>
<div class="news-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
