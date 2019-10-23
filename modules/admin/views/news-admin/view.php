<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use App\modules\admin\classes\News;
use App\models\User;

function getUsername($model)
{
    if ($model->user_id) {
        $user = User::findIdentity($model->user_id);
        if ($user) return $user->username;
    }
}

?>
<div class="message-view">

    <h1>Информация по новости</h1>

    <p>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить новость?',
                'method' => 'post',
            ],
        ]) ?>
         <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
         <?= Html::a($model->img_id ? 'Изменить изображение' : 'Добавить изображение', ['upload-image', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            
            'title',

            'text',

            ['attribute' => 'img_id', 'label' => 'Изображение', 'value' => function ($model) { return $model->img_id ? 'есть' : 'нет'; }],

            ['attribute' => 'created_at', 'format' => ['date', 'php:d-m-y H:m']],

            ['attribute' => 'user_id', 'value' => function($model) {return getUsername($model);}],

        ],
    ]) ?>

</div>

