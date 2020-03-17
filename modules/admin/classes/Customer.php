<?php

namespace app\modules\admin\classes;

use app\models\ModelBase;
use app\modules\order\classes\Order;

class Customer extends ModelBase {

    const SCENARIO_PHONE = 'phone';

	public static function tableName()
    {
        return '{{customers}}';
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        $scenarios[static::SCENARIO_PHONE] = ['phone'];
        return $scenarios;
    }

    public function getAccordingToForm($form)
    {
        $customer = self::findOne(['phone' => $form->phone]);
        if ($customer) return $customer;
        return $this->registerCustomer($form);
     }  

    private function registerCustomer($form)
    {
        $customer = new self;
        $customer->name = $form->name;
        $customer->email = $form->email;
        $customer->phone = $form->phone;
        if ($customer->save()) return $customer;
    }

    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['id_customer' => 'id'])->where(['status' => self::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC]);
    }

    public function createLinkCountOrders()
    {
        if ($this->orders) return sprintf('<a href="/admin/customer/orders?id_customer=%s">%s</a>', $this->id, count($this->orders));
        return '<span classes="text-danger">нет</span>';
    }

    public function getByPhone($phone)
    {
        $customer = self::findOne(['phone' => $phone]);
        if ($customer) return $customer;
        $customer = new self(['scenario' => self::SCENARIO_PHONE]);
        $customer->phone = $phone;
        return $customer->save();
    }

   
}
