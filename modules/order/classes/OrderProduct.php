<?php

namespace app\modules\order\classes;

use app\models\ModelBase;
use app\modules\product\classes\Product;

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
            $product->name = Product::find()->select('name')->where(['id' => $item['id_prod']])->asArray()->limit(1)->column()[0];
            $product->price = $item['price'];
            $product->qty = $item['qty'];
            $product->id_order = $id_order;
            $product->save();
        }
    }

    public function saveCart($id_order, $cart)
    {
        if (isset($cart['products'])) self::saveProducts($cart['products'], $id_order);
    }

    

   
}