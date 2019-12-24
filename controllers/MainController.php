<?php

	namespace app\controllers;

	use Yii;
	use app\modules\category\classes\Category;
	use app\modules\admin\classes\Message;
	use app\modules\admin\classes\News;
	
class MainController extends BaseController {

	public function actionIndex()
	{
		$this->view->title = 'Пневмооборудование';
		$catalog = Category::find()->where(['id_parent' => null, 'status' => self::STATUS_ACTIVE])->orderBy(['rating' => SORT_DESC])->all();
		return $this->render('index/main', compact('catalog'));
	}

	public function actionContacts()
	{
		$model = new Message(['scenario' => Message::SCENARIO_CREATE]);
		$this->view->title = 'Контакты';
		if ($this->request->isGet) return $this->render('contacts/main', compact('model'));
		$model->load($this->request->post());
		if (!$model->validate()) return $this->setMessage('error', "Ошибка при отправке сообщения")->back();
		debug($model->saveMessage());
		return $this->setMessage('success', "Сообщение отправлено")->back();
	}

	public function actionNews()
	{
		$news = News::find()->where(['status' => self::STATUS_ACTIVE])->orderBy(['created_at' => SORT_DESC])->all();
		return $this->render('news/main', compact('news'));
	}

	public function actionStuff()
	{
		return $this->render('stuff/main');
	}

}