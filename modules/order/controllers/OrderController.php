<?php

	namespace app\modules\order\controllers;

	use Yii;
	use app\controllers\BaseController;
	use app\modules\category\classes\Category;
	use app\models\Customer;
	use app\modules\order\classes\Order;
	use app\modules\order\classes\OrderProduct;
	use app\modules\order\classes\OrderCylinder;
	
class OrderController extends BaseController {


	public function actionSave()
	{
		$form = (object) $_GET;
		$customer = (new Customer)->getAccordingToForm($form);
		$order = (new Order)->saveOrder($customer->id, $form->note);
		(new OrderCylinder)->saveCart($order->id, $this->session->get('cart'));
		(new OrderProduct)->saveCart($order->id, $this->session->get('cart'));
		$this->session->setFlash('success', 'Заказ оформлен');
		$this->session->remove('cart');
		return $this->redirect('/main/index');
	}


}