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
            [['state', 'closed'], 'safe'],

            [['name', 'phone'], 'required'],
            [['note'], 'string'],
            ['email', 'email'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[static::SCENARIO_ADMIN] = ['state', 'closed'];
        $scenarios[static::SCENARIO_USER] = ['name', 'phone', 'email'];
        return $scenarios;
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
