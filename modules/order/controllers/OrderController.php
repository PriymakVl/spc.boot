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
		$model = new Order();
		$model->load(\Yii::$app->request->post());
		if ($model->validate()) $model->saveOrder(\Yii::$app->request->post('Order'), $this->session->get('cart'));
		$this->session->setFlash('success', 'Заказ оформлен');
		$this->session->remove('cart');
		return $this->redirect('/main/index');
	}


}