<?php

namespace app\modules\admin\controllers;

use Yii;
use app\controllers\BaseController;
use app\modules\admin\classes\News;
use app\modules\admin\classes\NewsSearch;
use app\models\User;
use app\models\UploadForm;
use yii\web\UploadedFile;


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
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->saveNews()) {
            return $this->setMessage('success', "Новость успешно создана")->redirect(['view', 'id' => $model->id]);
        }
        return $this->setMessage('error', 'Ошибка при редактировании новости')->back();
    }

    public function actionUpdate($id)
    {
        $model = News::findOne($id);
        if (Yii::$app->request->isGet) return $this->render('update', compact('model'));
        if ($model->load($this->request->post()) && $model->validate() && $model->saveNews()) {
           return $this->setMessage('success', 'Новость изменена')->redirect(['/admin/news-admin/view', 'id' => $model->id]);
        }
        return $this->setMessage('error', 'Ошибка при редактировании новости')->back();
    }

    public function actionUploadImage($id)
    {
        $news = News::findOne($id);
        $model = new UploadForm();
        if (Yii::$app->request->isGet) return $this->render('upload_image', compact('news', 'model'));
        $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
        if ($model->uploadImageNews($news)) Yii::$app->session->setFlash('success', "Изображение успешно загружено");
        else Yii::$app->session->setFlash('error', "Ошибка пр загрузке изображения");
        return $this->redirect(['view', 'id' => $id]);
    }


}
