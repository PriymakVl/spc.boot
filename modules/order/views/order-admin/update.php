<?php

use yii\helpers\Html;

?>

<div>

    <h1>Форма для редактирования состояния заказа</h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
