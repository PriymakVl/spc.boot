<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use App\modules\admin\classes\Message;

function getState($model)
{
    if ($model->state == Message::STATE_PROCESSED) return '<span class="text-success" data-id="'.$model->id.'">обработан</span>';
    else if ($model->state == Message::STATE_DELAYED) return '<span class="text-primary" data-id="'.$model->id.'">отложен</span>';
    else return '<span class="text-danger" data-id="'.$model->id.'">не обработан</span>';
}

function getUsername($model)
{
    if ($model->user_id) {
        $user = User::findIdentity(101);
        if ($user) return $user->username;
    }
}

?>
<div class="message-view">

    <h1>Информация по сообщению</h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить сообщение?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'name',

            'phone',

            'email',

            'text',

            ['attribute' => 'created_at', 'format' => ['date', 'php:d-m-y H:m']],

            ['attribute' => 'state', 'format' => 'raw', 
                'value' => function($model) {return getState($model);}, 
            ],

            ['attribute' => 'updated_at', 'format' => ['date', 'php:d-m-y H:m']],

        ],
    ]) ?>

</div>

