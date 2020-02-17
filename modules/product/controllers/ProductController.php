<?php

namespace app\modules\product\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\product\classes\Product;
use app\modules\category\classes\Category;
use yii\web\NotFoundHttpException;

class ProductController extends BaseController
{
	
    // public function actionIndex($translit, $id)
    // {
    //     $product = Product::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    //     if (!$product) throw new NotFoundHttpException('Такого продукта не существует');
    //     $this->view->title = $product->name;
    //     return $this->render('index/main', compact('product'));
    // }

    public function actionIndex($cat_id)
    {
        $cat = Category::findOne($cat_id);
        $products = Product::find()->where(['id_cat' => $cat->id, 'status' => self::STATUS_ACTIVE, 'IBLOCK_ID' => 14])->all();
        return $this->render('index/main', compact('cat', 'products'));
    }

    public function actionSearch($search)
    {
    	$products = Product::find()->where(['IBLOCK_ID' => 14])->andWhere(['like', 'name', trim($search)])->all();
        if (count($products) == 1) return $this->redirect('/product?id_prod='.$products[0]->id);
    	return $this->render('search/main', compact('products'));
    }

}
