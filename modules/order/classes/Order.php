<?php

namespace app\modules\order\classes;

use Yii;
use yii\web\NotFoundHttpException;
use app\models\ModelBase;
use app\modules\admin\classes\Customer;
use app\modules\order\classes\OrderCylinder;
use app\modules\order\classes\OrderProduct;
use app\modules\product\classes\Product;
use app\modules\order\traits\OrderConvert;

class Order extends OrderBase
{
    use OrderConvert;

    const SCENARIO_ADMIN = 'admin';
    const SCENARIO_ONE_CLICK = 'one_click';
    const SCENARIO_CART = 'cart';
    
    const STATE_ALL = 'all';
    const STATE_REGISTERED = 1;
    const STATE_CLOSED = 2;
    const STATE_PENDING = 3;

    public function rules()
    {
        return [
            ['phone', 'required'],
            ['phone', 'trim'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();

        return $scenarios;
    }

    public function saveOrder($form, $cart)
    {
        $customer = (new Customer)->getAccordingToForm((object) $form);
        $this->id_customer = $customer->id;
        $this->registered = time();
        $this->state = self::STATE_REGISTERED;
        $this->save();
        (new OrderCylinder)->saveCart($this->id, $cart);
        (new OrderProduct)->saveCart($this->id, $cart);
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

    public function editState()
    {
        //if ($this->state == self::STATE_CLOSED) $this->closed = time();
        $this->state = 3;
        return $this->save();
    }


}