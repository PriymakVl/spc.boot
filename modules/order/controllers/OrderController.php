<?php

	namespace app\modules\order\controllers;

	use Yii;
	use app\controllers\BaseController;
	use app\modules\category\classes\Category;
	use app\modules\order\classes\Order;
	use app\modules\order\classes\OrderProduct;
	use app\modules\order\classes\OrderCylinder;
	use app\modules\product\classes\ProductCode;
	use app\modules\product\classes\Product;
	use app\modules\admin\classes\Customer;
	
class OrderController extends BaseController {


	public function actionSave()
	{
		$model = new Order();
		$model->load(\Yii::$app->request->post());
		if ($model->validate()) $model->saveOrder(\Yii::$app->request->post('Order'), $this->session->get('cart'));
		$this->session->setFlash('success', 'Заказ оформлен');
		$this->session->remove('cart');
		return $this->redirect('/main/index');
	}

	public function actionSaveByClick($phone, $series, $thread, $condensate, $qty)
	{
		$code = new ProductCode($series, $thread, $condensate);
		$product = Product::findOne(['name' => $code->short, 'status' => STATUS_ACTIVE]);
		$customer = Customer::getByPhone($phone);
		$order = new Order(['scenario' => Order::SCENARIO_ONE_CLICK]);
		$order->id_customer = $customer->id;
		$order->registered = time();
		$order->state = Order::STATE_REGISTERED;
		$order->save();
		return (new OrderProduct)->saveOne($order->id, $code, $product, $qty);
	}

	
	




}