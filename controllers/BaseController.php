<?php

	namespace app\controllers;
	
	use Yii;
	use yii\web\Controller;
	use app\helpers\Request;
	use app\modules\category\classes\Category;
	
class BaseController extends Controller {

	public $get;
	public $post;
	public $request;
	public $session;

	const STATUS_ACTIVE = 1;
	const STATUS_INACTIVE = 0;

	public function  init()
	{
		$this->get = new Request($_GET);
		$this->post = new Request($_POST);
		$this->request = Yii::$app->request;
		$this->session = Yii::$app->session;
		$this->session->open();
		$this->view->params['catalog'] = (new Category)->getMain();
	}

	public function setMessage($type, $text)
	{
		Yii::$app->session->setFlash($type, $text);
		return $this;
	} 

	public function back()
	{
		return $this->redirect($this->request->referrer);
	}

	public function registerMetaTags($object) 
	{
		$this->view->title = $object->meta_title ? $object->meta_title : $object->name;
		$this->view->registerMetaTag(['name' => 'description', 'content' => $object->meta_description]);
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => $object->meta_description]);
	}


}