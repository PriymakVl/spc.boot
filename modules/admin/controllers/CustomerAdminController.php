<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\CustomerSearch;
use app\modules\admin\classes\Customer;

class CustomerAdminController extends BaseController
{

	public $layout = '@layouts/admin';

    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionView($id)
    {
        $customer = Customer::findOne($id);
        return $this->render('view', ['model' => $customer]);
    }

    public function actionOrders($id_customer)
    {
        $customer = Customer::findOne($id_customer);
        return $this->render('orders', ['customer' => $customer]);
    }


}
