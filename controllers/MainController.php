<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\admin\classes\Message;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Пневмооборудование';
		$catalog = Category::findAll(['id_parent' => null, 'status' => self::STATUS_ACTIVE]);
		return $this->render('index/main', compact('catalog'));
	}

	public function actionContacts()
	{
		$model = new Message(['scenario' => Message::SCENARIO_CREATE]);
		$this->view->title = 'Контакты';
		if ($this->request->isGet) return $this->render('contacts/main', compact('model'));
		$model->load($this->request->post());
		if (!$model->validate()) return;
		$model->saveMessage();
		$this->session->setFlash('success', "Сообщение отправлено");
		return $this->redirect(Yii::$app->request->referrer);
	}

}