<?php

namespace app\modules\order\classes;

use app\models\ModelBase;
use app\modules\category\classes\Category;

class OrderCylinder extends ModelBase {

	public static function tableName()
    {
        return '{{orders_cylinders}}';
    }

    public static function saveCylinders($cylinders, $id_order)
    {
        foreach ($cylinders as $item)
        {
            $cylinder = new self();
            if ($item['series'] == 'CPT') $cylinder->code = Category::getCodeConverter($item['effort']);
            else $cylinder->code = Category::getCodeCylinder($item);
            $cylinder->qty = $item['qty'] ? $item['qty'] : 1;
            $cylinder->id_order = $id_order;
            $cylinder->save();
        }
    }

    public function saveCart($id_order, $cart)
    {
        if (isset($cart['cylinders'])) OrderCylinder::saveCylinders($cart['cylinders'], $id_order);
    }



   
}