<?php

namespace app\modules\order\classes;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\ModelBase;
use app\models\Customer;
use app\modules\order\classes\OrderCylinder;
use app\modules\order\classes\OrderProduct;
use app\modules\product\classes\Product;

class Order extends ModelBase
{

    const STATE_ALL = 'all';
    const STATE_REGISTERED = 1;
    const STATE_CLOSED = 2;
    const STATE_PENDING = 3;

    public static function tableName()
    {
        return '{{orders}}';
    }

    public function saveOrder($id_customer, $note)
    {
        $order = new self;
        $order->id_customer = $id_customer;
        $order->registered = time();
        $order->note = $note;
        $order->state = self::STATE_REGISTERED;
        if ($order->save()) return $order;
    }

    public function getCustomer()
    {
        return Customer::findOne($this->id_customer);
    }

    public function getCylinders()
    {
        return OrderCylinder::findAll(['id_order' => $this->id, 'status' => self::STATUS_ACTIVE]);
    }

    public function getProducts()
    {
        return OrderProduct::find()->where(['id_order' => $this->id, 'status' => self::STATUS_ACTIVE])->all();
    }

    public function convertState($state = null)
    {
        $state = $state ? $state : $this->state;
        switch ($state) {
            case self::STATE_REGISTERED: return 'зарегистрирован';
            case self::STATE_CLOSED: return 'выполнен';
            case self::STATE_PENDING: return 'отложен';
            default: return 'не известно';
        }
    }


}