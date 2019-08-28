<?php

namespace app\modules\order\classes;

use app\models\ModelBase;

class OrderProduct extends ModelBase {


	public static function tableName()
    {
        return '{{orders_products}}';
    }


    public static function saveProducts($products, $id_order)
    {
        foreach ($products as $item)
        {
            $product = new self();
            $product->id_prod = $item['id_prod'];
            $product->price = $item['price'];
            $product->qty = $item['qty'];
            $product->save();
        }
    }

    public function saveCart($id_order, $cart)
    {
        if (isset($cart['products'])) self::saveProducts($cart['products'], $id_order);
    }

    

   
}