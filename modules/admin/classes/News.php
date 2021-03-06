<?php

namespace app\modules\admin\classes;

use Yii;
use app\models\ModelBase;
use app\models\Image;

class News extends ModelBase {

	public static function tableName()
    {
        return '{{news}}';
    }

    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'created_at' => 'Время создания',
            'user_id' => 'Добавил',
            'status' => 'Status',
            'text' => 'Текст сообщения'
        ];
    }

    public function saveNews()
    {
        $this->created_at = time();
        $this->user_id = Yii::$app->user->getId();
        return $this->save();
    }

    public function getImage()
    {
        if ($this->img_id) return (new Image)->get($this->img_id);
    }
   
}
