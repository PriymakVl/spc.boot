<?php

	namespace app\modules\category\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\product\classes\Product;
	use app\controllers\BaseController;
	use yii\data\Pagination;
	use app\helpers\Helper;
	use yii\helpers\ArrayHelper;
	use app\modules\filter\Filter;
	
class CategoryController extends BaseController {


	public function actionIndex($id_cat)
	{
		$cart = $this->session->get('cart');
		$cat = Category::findOne(['id' => $id_cat, 'status' => self::STATUS_ACTIVE]);
		if ($this->isCylinder($cat->code)) return $this->redirect(['cylinder/form', 'series' => $cat->code]);
		if ($cat->products) return $this->products($cat);
		return $this->render('categories/main', compact('cat'));
	}

	private function products($category)
	{
		$cat = $category;
		$query = Product::find()->where(['id_cat' => $cat->id, 'status' => self::STATUS_ACTIVE, 'IBLOCK_ID' => 14]);
		$pages = new Pagination(['defaultPageSize' => 6, 'totalCount' => $query->count()]);
		$products = $query->offset($pages->offset)->limit($pages->limit)->all();
		return $this->render('products/main', compact('cat', 'pages', 'products'));
	}

	private function isCylinder($code)
	{
		$series_cylinders = ['CP', 'MS', 'MA', 'MAL', 'SDA', 'ADV', 'JDA', 'SR', 
		'SW', 'SRT', 'SC', 'SCT', 'SG', 'QG', 'CG', 'EM', 'GMS', 'CPT'];
		return in_array($code, $series_cylinders);
	}

	public function actionCylinderForm($series)
	{
		return $this->render('cylinders/main', compact('series'));
	}

	public function actionFilter($id_cat)
    {
    	$cat = Category::findOne($id_cat); 
        $products = (new Product)->filter($cat);
        return $this->render('index/main', compact('cat', 'products'));
    }

}