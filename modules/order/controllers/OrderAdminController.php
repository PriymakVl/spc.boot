<?php

namespace app\modules\order\controllers;

use Yii;
use app\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\order\classes\Order;
use app\modules\order\classes\OrderSearch;

class OrderAdminController extends BaseController
{
	public $layout = '@layouts/admin';
	
    public function behaviors()
    {
        return ['verbs' => ['class' => VerbFilter::className(), 'actions' => ['delete' => ['POST'],],],];
    }

    public function actionIndex()
    {
        $searchModel = new OrderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionView($id)
    {
        $order = Order::findOne($id);
        return $this->render('view', ['model' => $order]);
    }

    public function actionDelete($id)
    {
        $order = Order::findOne($id);
        $order->status = Order::STATUS_INACTIVE;
        $order->save();
        Yii::$app->session->setFlash('success', "Заказ успешно удален");
        return $this->redirect(['index']);
    }

    public function actionUpdate($id)
    {
        $model = Order::findOne($id);
        if ($this->request->isGet) return $this->render('update', compact('model'));
        $model->scenario = Order::SCENARIO_ADMIN;
        $model->load(Yii::$app->request->post());
        if ($model->state == Order::STATE_CLOSED) $model->closed = time(); 
        if ($model->save()) Yii::$app->session->setFlash('success', "Состояние заказа успешно обновлено");
        else Yii::$app->session->setFlash('error', "Ошибка при редактировании состояния заказа");
        return $this->redirect(['index']);
    }

}
