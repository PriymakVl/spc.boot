<?php

namespace app\modules\admin\classes;

use app\models\ModelBase;

class Message extends ModelBase {

	const STATE_NOT_PROCESSED = 1;
	const STATE_PROCESSED = 2;
	const STATE_DELAYED = 3;

	public static function tableName()
    {
        return '{{messages}}';
    }

    public function rules()
    {
        return [
            [['name', 'phone', 'text'], 'required'],
            [['name', 'phone', 'email'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'email' => 'E-mail',
            //'created' => 'Время заказа',
            // 'processed' => 'Время обработки',
            // 'user_id' => 'Кем обработан',
            'state' => 'Состояние',
            'status' => 'Status',
        ];
    }

    public function saveMessage()
    {
        $this->created_at = time();
        $this->state = self::STATE_NOT_PROCESSED;
        $this->save();
    }

   
}
