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
            [ ['id_customer'], 'integer'],
            [['state', 'registered', 'closed'], 'safe'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios[static::SCENARIO_ONE_CLICK] = ['id_customer'];
        $scenarios[static::SCENARIO_CART] = ['phone', 'name'];
        $scenarios[static::SCENARIO_ADMIN] = ['state', 'closed'];
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
