<?php

namespace app\modules\product\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\product\classes\Product;

class ProductController extends BaseController
{
	
    public function actionIndex($id_prod)
    {
        $product = (new Product)->get($id_prod);
        $this->view->title = $product->name;
        return $this->render('index/main', compact('product'));
    }

    public function actionSearch($search)
    {
    	$products = Product::find()->where(['IBLOCK_ID' => 14])->andWhere(['like', 'name', trim($search)])->all();
        if (count($products) == 1) return $this->redirect('/product?id_prod='.$products[0]->id);
    	return $this->render('search/main', compact('products'));
    }

}
