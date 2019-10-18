<?php

namespace app\modules\admin\classes;

use Yii;
use app\models\ModelBase;

class Message extends ModelBase {

	const STATE_NOT_PROCESSED = 1;
	const STATE_PROCESSED = 2;
	const STATE_DELAYED = 3;

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE_STATE = 'update_state';

	public static function tableName()
    {
        return '{{messages}}';
    }

    public function rules()
    {
        return [
            [['name', 'phone', 'text'], 'required'],
            [['name', 'phone, email'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[static::SCENARIO_CREATE] = ['name', 'phone', 'text', 'email'];
        $scenarios[static::SCENARIO_UPDATE_STATE] = ['state'];
        return $scenarios;
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'created_at' => 'Время регистрации',
            'updated_at' => 'Время обработки',
            'user_id' => 'Кем обработан',
            'state' => 'Состояние',
            'status' => 'Status',
            'text' => 'Текст сообщения'
        ];
    }

    public function saveMessage()
    {
        $this->created_at = time();
        $this->state = self::STATE_NOT_PROCESSED;
        $this->save();
    }

    public function updateState()
    {
        $this->updated_at = time();
        if (Yii::$app->user->id) $this->user_id = Yii::$app->user->id;
        $this->save();
    }

   
}
