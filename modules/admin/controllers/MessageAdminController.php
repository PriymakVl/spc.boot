<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\Message;
use app\modules\admin\classes\MessageSearch;
use app\models\User;


class MessageAdminController extends BaseController
{

	public $layout = '@layouts/admin';

    public function actionIndex()
    {
        $searchModel = new MessageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionDelete($id)
    {
        $message = Message::findOne($id);
        $message->status = self::STATUS_INACTIVE;
        $message->save();
        Yii::$app->session->setFlash('success', 'Сообщение удалено');
        return $this->redirect('/admin/message');
    }

    public function actionView($id)
    {
        $model = Message::findOne($id);
        return $this->render('view', compact('model'));
    }

    public function actionUpdate($id)
    {
        $model = Message::findOne($id);
        $model->scenario = Message::SCENARIO_UPDATE_STATE;
        if (Yii::$app->request->isGet) return $this->render('update', compact('model'));
        $model->load($this->request->post());
        if ($model->validate()) {
            $model->updateState();
            Yii::$app->session->setFlash('success', 'Состояние изменено');
            return $this->redirect(['/admin/message-admin/view', 'id' => $model->id]);
        }
        Yii::$app->session->setFlash('error', 'Ошибка при редактировании состояния');
        return $this->redirect($this->request->referrer);
    }

    private function sendMail()
    {
        $message = (object) $this->request->get();
        $textMail = 'Получено сообщение<br> Имя: <b>'.$message->name.'</b><br>'.'телефон: <b>'.$message->phone.'</b>';
        Yii::$app->mailer->compose()
        ->setFrom(['admin@cobot.bar' => 'Сайт cobot.bar'])
        ->setTo('PriymakVl@gmail.com')
        ->setSubject('Получено новое сообщение')
        // ->setTextBody('Текст сообщения')
        ->setHtmlBody($textMail)
        ->send();
    }


}
