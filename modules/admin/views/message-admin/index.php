<?php

use yii\helpers\Html;
use yii\grid\GridView;
use App\modules\admin\classes\Callback;
use App\models\User;

$this->registerJsFile('@web/js/admin/change_state_message.js', ['depends' => [\yii\web\JqueryAsset::className()]]);

$this->title = 'Cообщения';

function getState($model)
{
    if ($model->state) return '<span class="text-success call-processed" data-id="'.$model->id.'">обработан</span>';
    else return '<span class="text-danger call-not-processed" data-id="'.$model->id.'">не обработан</span>';
}

function getUsername($model)
{
    if ($model->user_id) {
        $user = User::findIdentity(101);
        if ($user) return $user->username;
    }
}

?>

<div>
	 <h1><?= Html::encode($this->title) ?></h1>

	  <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',

            'phone',

            'email',
            
            ['attribute' => 'created_at', 'format' => ['date', 'php:d-m-y H:m']],

            ['attribute' => 'state', 'format' => 'raw', 
                'value' => function($model) {return getState($model);}, 
                //'filter' => [Callback::STATE_NOT_CALLBACK => 'не обработаны', Callback::STATE_CALLBACK => 'обработаны'],
            ],

            ['attribute' => 'updated_at', 'format' => ['date', 'php:d-m-y H:m']],

            ['attribute' => 'user_id', 'value' => function($model) {return getUsername($model);}],

            ['class' => 'yii\grid\ActionColumn', 'contentOptions' => ['style' => 'width:100px; text-align:center;'],

            'headerOptions' => ['class' => 'text-info'], 'header' => 'Операции', 'template' => '{delete}',
            ], 
        ]
    ]); ?>
</div>



