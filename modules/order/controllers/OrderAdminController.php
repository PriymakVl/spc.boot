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

    // public function actionCreate()
    // {
    //     $model = new Order();
    //     if ($model->load(Yii::$app->request->post()) && $model->saveProduct((object)Yii::$app->request->post('Product'))) {
    //         Yii::$app->session->setFlash('success', "Продукт успешно создан");
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }
    //     return $this->render('create', compact('model'));
    // }

    // public function actionUpdate($id)
    // {
    //     $model = $this->findModel($id);
    //     if ($model->load(Yii::$app->request->post()) && $model->validate()) {
    //         $model->saveProduct((object)Yii::$app->request->post('Product'));
    //         return $this->redirect(['view', 'id' => $model->id]);
    //     }
    //     return $this->render('update', compact('model'));
    // }


    // public function actionDelete($id)
    // {
    //     $product = Product::findOne($id);
    //     $product->status = Product::STATUS_INACTIVE;
    //     $product->save(); 
    //     Yii::$app->session->setFlash('success', "Продукт успешно удален");
    //     //to do method delete with delete filters;
    //     return $this->redirect(['index']);
    // }


    protected function findModel($id)
    {
        $order = Order::find()->where(['id' => $id, 'status' => Product::STATUS_ACTIVE])->limit(1)->one();
        if ($order === null) throw new NotFoundHttpException('The requested page does not exist.');
        return $order;
    }
}
