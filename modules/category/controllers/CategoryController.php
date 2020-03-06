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
	use yii\web\NotFoundHttpException;
	use app\modules\product\classes\ProductItemFilter;
	
class CategoryController extends BaseController {


	public function actionIndex($translit)
	{
		$cart = $this->session->get('cart');
		$cat = Category::findOne(['translit' => $translit, 'status' => self::STATUS_ACTIVE]);
		$this->registerMetaTags($cat);
		if (!$cat) throw new NotFoundHttpException('Такой категории не существует');
		// if ($this->isCylinder($cat->code)) return $this->redirect(['cylinder/form', 'series' => $cat->code]);
		//if ($cat->products) return $this->redirect(['/product/', 'cat_id' => $cat->id]);
		// if ($cat->translit == 'tsilindry') $cat->filterCylinders();
		$template = $this->getTemplate($translit);
		return $this->render($template, compact('cat'));
	}

	private function getTemplate($translit) {
		switch($translit) {
			case 'podgotovka_vozdukha': return 'podgotovka_vozdukha/main';
			case 'bloki_podgotovki_vozdukha': return 'bloki_podgotovki_vozdukha/main';
			case 'filtry_regulatory': return 'filtry_regulatory/main';
			default:  throw new NotFoundHttpException('Такой категории не существует');
		}
	}

	// private function products($cat)
	// {
		// $query = Product::find()->where(['id_cat' => $cat->id, 'status' => self::STATUS_ACTIVE, 'IBLOCK_ID' => 14]);
		// $pages = new Pagination(['defaultPageSize' => 6, 'totalCount' => $query->count()]);
		// $products = $query->offset($pages->offset)->limit($pages->limit)->all();
		// $products = Product::find()->where(['id_cat' => $cat->id, 'status' => self::STATUS_ACTIVE, 'IBLOCK_ID' => 14])->all();
		// return $this->render('products/main', compact('cat', 'products'));
	// }

	private function cylinders($cat) {
		$this->render('categories/main_', compact('cat'));
	}

	private function isCylinder($code)
	{
		$series_cylinders = ['CP', 'MS', 'MA', 'MAL', 'SDA', 'ADV', 'JDA', 'SR', 
		'SW', 'SRT', 'SC', 'SCT', 'SG', 'QG', 'CG', 'EM', 'GMS', 'CPT'];
		return in_array($code, $series_cylinders);
	}

	public function actionCylinderForm($series)
	{
		$translit = Category::getTranslitBySeriesCylinder($series);
		$cat = Category::findOne(['translit' => $translit, 'status' => STATUS_ACTIVE]);
		// debug($cat);
		return $this->render('cylinders/main', compact('series', 'cat'));
	}

	public function actionFilter($id_cat)
    {
    	$cat = Category::findOne($id_cat); 
        $products = (new Product)->filter($cat);
        return $this->render('filters/main', compact('cat', 'products'));
    }

    // public function actionUpfilter()
    // {
    // 	$translit = 'seriya_cn';
    // 	$id_filter = 7;
    // 	$id_item_filter = 35;
    // 	$cat = Category::findOne(['translit' => $translit, 'status' => self::STATUS_ACTIVE]);
    // 	// debugProp($cat->products, 'name');
    // 	foreach ($cat->products as $product) {
    // 		$obj = new ProductItemFilter();
	   //  	$obj->id_filter = $id_filter;
	   //  	$obj->id_item = $id_item_filter;
	   //  	$obj->id_prod = $product->id;
	   //  	$obj->save();
    // 	}
    // 	exit('end');
    // }

}