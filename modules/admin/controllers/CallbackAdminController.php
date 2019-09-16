<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\Callback;
use app\modules\admin\classes\CallbackSearch;


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
		(new Callback)->add($this->request->get());
		Yii::$app->session->setFlash('success', 'Обратный звонок заказан');
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

}
