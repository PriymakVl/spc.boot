<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\product\classes\Product;
	use app\modules\order\classes\Order;
	use app\models\OrderCylinderForm;
	
class CartController extends BaseController {

	public function actionIndex()
	{
		$cart = $this->session->get('cart');
		$model = new Order();
		return $this->render('index', compact('cart', 'model'));
	}

	public function actionAddCylinderToCart()
	{
		$this->setSessionCylinder();
		Yii::$app->session->setFlash('success', 'Пневмоцилиндр добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}
	//for series CPT
	public function actionAddConverterToCart()
	{
		$this->setSessionConverter();
		Yii::$app->session->setFlash('success', 'Пневмогидравлический преобразователь добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	// public function actionAddProductToCart($id_prod, $qty)
	// {
	// 	$this->setSessionProduct($id_prod, $qty);
	// 	Yii::$app->session->setFlash('success', 'Товар добавлен в корзину');
	// 	return $this->redirect($this->request->referrer);
	// }

	//ajax
	public function actionAddProductByCode($model, $size, $qty)
	{
		$name = $model.'-'.$size;
		$product = Product::findOne(['name' => $name, 'status' => self::STATUS_ACTIVE]);
		if (!$product) return 'no';
		$this->setSessionProduct($product, $qty);
		return $this->calculateItemsCart();
	}

	private function calculateItemsCart()
	{
		if (empty($_SESSION['cart'])) return 0;
		$qty_cylinders = empty($_SESSION['cart']['cylinders']) ? 0 : count($_SESSION['cart']['cylinders']);
		$qty_products = empty($_SESSION['cart']['products']) ? 0 : count($_SESSION['cart']['products']);
		return $qty_cylinders + $qty_products;
	}

	public function actionDeleteItemCart($type, $index)
	{
		unset($_SESSION['cart'][$type][$index]);
		if (empty($_SESSION['cart'][$type])) unset($_SESSION['cart'][$type]);
		// Yii::$app->session->setFlash('success', 'Продукт удален из корзины');
		$count = $this->calculateItemsCart();
		if ($count) return $this->redirect('/cart');
		return $this->goHome();
	}

	private function setSessionProduct($product, $qty)
	{
		$data['id_prod'] = $product->id;
		$data['name'] = $product->name;
		// $data['price'] = $product->price->value;
		$data['preview'] = $product->preview;
		$data['qty'] = $qty;
		$data['img'] = $product->image ? '@img/'.$product->image->subdir.'/'.$product->image->filename : '@img/no_photo_medium.png';
		$_SESSION['cart']['products'][] = $data;
	}

	private function setSessionCylinder()
	{
		$form = (object)$this->request->post('OrderCylinderForm');
		$data['series'] = $form->series;
		$data['stroke'] = $form->stroke;
		$data['diameter'] = $form->diameter;
		$data['qty'] = $form->qty;
		$data['magneto'] = $form->magneto;
		$data['thread_rod'] = $form->thread_rod; 
		$_SESSION['cart']['cylinders'][] = $data;
	}

	private function setSessionConverter()
	{
		$data['series'] = 'CPT';
		$data['effort'] =  $this->request->post('OrderCylinderForm')['effort'];
		$data['qty'] = $this->request->post('OrderCylinderForm')['qty'];
		$_SESSION['cart']['cylinders'][] = $data;
	}

}