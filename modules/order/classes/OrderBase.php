<?php

namespace app\modules\order\classes;

use app\models\ModelBase;

class OrderBase extends ModelBase {

    public $name; //custormer name
    public $phone; //customer phone
    public $email; //customer email
    
    public static function tableName()
    {
        return '{{orders}}';
    }

    public function rules()
    {
        return [
            [['name', 'phone'], 'required'],
            [['note'], 'string'],
            ['email', 'email'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'note' => 'Примечание',
            'phone' => 'Телефон',
            'email' => 'Email',
        ];
    }




}
