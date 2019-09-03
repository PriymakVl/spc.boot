<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	// use app\modules\product\classes\Product;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Пневмооборудование';
		$catalog = (new Category)->getMain();
		return $this->render('index/main', compact('catalog'));
	}

	public function actionCallback()
	{
		debug($this->request->get());
		$callback = (new Callback)->add();
		Yii::$app->session->setFlash('success', 'Обратный звонок заказан');
		return $this->redirect($this->request->referrer);
	}

	public function actionContacts()
	{
		$this->view->title = 'Контакты';
		return $this->render('contacts/main');
	}

}