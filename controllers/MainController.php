<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Пневмооборудование';
		$catalog = Category::findAll(['id_parent' => null, 'status' => self::STATUS_ACTIVE]);
		return $this->render('index/main', compact('catalog'));
	}

	public function actionContacts()
	{
		$this->view->title = 'Контакты';
		return $this->render('contacts/main');
	}

}