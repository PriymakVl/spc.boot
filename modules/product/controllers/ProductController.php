<?php

namespace app\modules\product\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\product\classes\Product;
use app\modules\category\classes\Category;
use yii\web\NotFoundHttpException;

class ProductController extends BaseController
{

    public function actionOrder($translit)
    {
        $cat = Category::findOne(['translit' => $translit]);
        return $this->render('order/main', compact('cat', 'translit'));
    }

    public function actionSearch($search)
    {
    	$products = Product::find()->where(['IBLOCK_ID' => 14])->andWhere(['like', 'name', trim($search)])->all();
        if (count($products) == 1) return $this->redirect('/product?id_prod='.$products[0]->id);
    	return $this->render('search/main', compact('products'));
    }

}
