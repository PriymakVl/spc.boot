<?php

namespace app\modules\admin\classes;

use app\models\ModelBase;
use app\modules\order\classes\Order;

class Customer extends ModelBase {

	public static function tableName()
    {
        return '{{customers}}';
    }

    public function getAccordingToForm($form)
    {
        $customer = self::findOne(['name' => $form->name, 'email' => $form->email, 'phone' => $form->phone]);
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

   
}
