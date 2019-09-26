<?php

namespace app\modules\order\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\order\classes\OrderSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        $order = $this->findModel($id);
        return $this->render('view', ['model' => $order]);
    }

    protected function findModel($id)
    {
        $order = Order::find()->where(['id' => $id, 'status' => Product::STATUS_ACTIVE])->limit(1)->one();
        if ($order === null) throw new NotFoundHttpException('The requested page does not exist.');
        return $order;
    }
}
