<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\product\classes\Product;
	use app\models\OrderCylinderForm;
	
class CartController extends BaseController {

	public function actionIndex()
	{
		$cart = $this->session->get('cart');
		$this->view->title = 'Корзина';
		return $this->render('index', compact('cart'));
	}

	public function actionAddCylinderToCart()
	{
		$this->setSessionCylinder();
		Yii::$app->session->setFlash('success', 'Пневмоцилиндр добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionAddProductToCart($id_prod)
	{
		$this->setSessionProduct($id_prod);
		Yii::$app->session->setFlash('success', 'Товар добавлен в корзину');
		return $this->redirect($this->request->referrer);
	}

	public function actionDeleteItemCart($type, $index)
	{
		unset($_SESSION['cart'][$type][$index]);
		if (empty($_SESSION['cart'][$type])) unset($_SESSION['cart'][$type]);
		Yii::$app->session->setFlash('success', 'Продукт удален из корзины');
		return $this->redirect('cart');
	}

	private function setSessionProduct($id_prod)
	{
		$product = Product::findOne($id_prod);
		$data['id_prod'] = $product->id;
		$data['name'] = $product->name;
		$data['price'] = $product->price->value;
		$data['preview'] = $product->preview;
		$data['img'] = $cat->image ? '@img/'.$cat->image->subdir.'/'.$cat->image->filename : '@img/no_photo_medium.png';
		$_SESSION['cart']['products'][] = $data;
	}

	private function setSessionCylinder()
	{
		$form = (object)$this->request->post('OrderCylinderForm');
		$data['id_cat'] = $form->id_cat;
		$data['stroke'] = $form->stroke;
		$data['diameter'] = $form->diameter;
		$data['qty'] = $form->qty;
		$data['magneto'] = $form->magneto;
		$data['thread_rod'] = $form->thread_rod;  
		$_SESSION['cart']['cylinders'][] = $data;
	}

}