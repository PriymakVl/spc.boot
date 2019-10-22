<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\News;
use app\modules\admin\classes\NewsSearch;
use app\models\User;


class NewsAdminController extends BaseController
{

	public $layout = '@layouts/admin';

    public function actionIndex()
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', compact('searchModel', 'dataProvider'));
    }

    public function actionDelete($id)
    {
        $news = News::findOne($id);
        $news->status = self::STATUS_INACTIVE;
        $news->save();
        Yii::$app->session->setFlash('success', 'Новость удалена');
        return $this->redirect('/admin/news');
    }

    public function actionView($id)
    {
        $model = News::findOne($id);
        return $this->render('view', compact('model'));
    }

    public function actionCreate()
    {
        $model = new News();
        if (Yii::$app->request->isGet) return $this->render('create', compact('model'));
        $model->load(Yii::$app->request->post());
        if ($this->saveNews()) {
            Yii::$app->session->setFlash('success', "Новость успешно создана");
            return $this->redirect(['view', 'id' => $model->id]);
        }
        Yii::$app->session->setFlash('error', 'Ошибка при редактировании новости');
        return $this->redirect($this->request->referrer);
    }

    public function actionUpdate($id)
    {
        $model = News::findOne($id);
        if (Yii::$app->request->isGet) return $this->render('update', compact('model'));
        $model->load($this->request->post());
        if ($model->validate()) {
            $model->updateNews();
            Yii::$app->session->setFlash('success', 'Новость изменена');
            return $this->redirect(['/admin/message-admin/view', 'id' => $model->id]);
        }
        Yii::$app->session->setFlash('error', 'Ошибка при редактировании новости');
        return $this->redirect($this->request->referrer);
    }


}
