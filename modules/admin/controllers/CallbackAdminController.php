<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\Callback;
use app\modules\admin\classes\CallbackSearch;
use app\models\User;


class CallbackAdminController extends BaseController
{

	public $layout = '@layouts/admin';

    public function actionIndex()
    {
        $searchModel = new CallbackSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionCreate()
	{
        $callback = new Callback();
        $callback->load($this->request->post());
        if (!$callback->validate()) {
            Yii::$app->session->setFlash('error', 'Произошла ошибка при заказе обратного звонка'); 
        } else {
            $callback->add();
            Yii::$app->session->setFlash('success', 'Обратный звонок заказан');
            $this->sendMail();
        }
		return $this->redirect($this->request->referrer);
	}

    public function actionDelete($id)
    {
        $callback = Callback::findOne($id);
        $callback->status = self::STATUS_INACTIVE;
        $callback->save();
        Yii::$app->session->setFlash('success', 'Обратный звонок удален');
        return $this->redirect($this->request->referrer);
    }

    public function actionState($id, $state = null)
    {

        $callback = Callback::findOne($id);
        if ($state) $callback->state = Callback::STATE_CALLBACK;
        else $callback->state = Callback::STATE_NOT_CALLBACK;
        $callback->processed = time();
        $callback->user_id = Yii::$app->user->getId();
        $callback->save();
        Yii::$app->session->setFlash('success', 'Состояние изменено');
        return $this->redirect($this->request->referrer);
    }

    private function sendMail()
    {
        $callback = (object) $this->request->get();
        $textMail = 'Прошу перезвонить<br> Имя: <b>'.$callback->name.'</b><br>'.'телефон: <b>'.$callback->phone.'</b>';
        Yii::$app->mailer->compose()
        ->setFrom(['admin@cobot.bar' => 'Сайт cobot.bar'])
        ->setTo('PriymakVl@gmail.com')
        ->setSubject('Перевонить по телефону')
        // ->setTextBody('Текст сообщения')
        ->setHtmlBody($textMail)
        ->send();
    }


}
