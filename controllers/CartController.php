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
		$this->view->title = 'Корзина';
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

	public function actionAddProductToCart($id_prod, $qty)
	{
		$this->setSessionProduct($id_prod, $qty);
		Yii::$app->session->setFlash('success', 'Товар добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionDeleteItemCart($type, $index)
	{
		unset($_SESSION['cart'][$type][$index]);
		if (empty($_SESSION['cart'][$type])) unset($_SESSION['cart'][$type]);
		Yii::$app->session->setFlash('success', 'Продукт удален из корзины');
		return $this->redirect('/cart');
	}

	private function setSessionProduct()
	{
		$product = Product::findOne($this->request->get('id_prod'));
		$data['id_prod'] = $product->id;
		$data['name'] = $product->name;
		// $data['price'] = $product->price->value;
		$data['preview'] = $product->preview;
		$data['qty'] = $this->request->get('qty');
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