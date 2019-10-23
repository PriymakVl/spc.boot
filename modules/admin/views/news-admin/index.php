<?php

use yii\helpers\Html;
use yii\grid\GridView;
use App\models\User;
use App\modules\admin\classes\News;

$this->title = 'Новости';


function getUsername($model)
{
    if ($model->user_id) {
        $user = User::findIdentity($model->user->id);
        if ($user) return $user->username;
    }
}

?>

<div>
	<h1><?= Html::encode($this->title) ?></h1>

    <?= Html::a('Создать новость', ['create'], ['class' => 'btn btn-success']) ?>
    <br><br>

	<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'title',

            ['attribute' => 'img_id', 'label' => 'Изображение', 'value' => function($model) { return $model->img_id ? 'есть' : 'нет'; }],
            
            ['attribute' => 'created_at', 'format' => ['date', 'php:d-m-y H:m']],

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:100px; text-align:center;'],

            'headerOptions' => ['class' => 'text-info'], 'header' => 'Операции', 'template' => '{view} {update} {delete}',
            ], 
        ]
    ]); ?>
</div>



