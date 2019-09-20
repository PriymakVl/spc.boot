<?php

namespace app\modules\order\classes;

use Yii;
use yii\base\Model;
use app\models\OrderCylinder;
use yii\web\NotFoundHttpException;
use app\modules\category\classes\Category;

class OrderCylinderForm extends Model
{
    public $id_cat;
    public $diameter;
    public $stroke;
    public $qty;
    public $magneto;
    public $thread_rod;

    public function rules()
    {
        return [
            [['id_cat', 'diameter'], 'integer'],
            [['id_cat', 'diameter', 'length', 'qty', 'stroke'], 'required'],
            [['magneto', 'tread_rod'], 'string'],
            [['qty'], 'number', 'min' => 1],
            [['stroke'], 'number', 'min' => 5, 'max' => $this->getMaxStroke()],
        ];
    }



    public function attributeLabels()
    {
        return [
            'id_cat' => 'Серия пневмоцилиндра',
            'diameter' => 'Диаметр поршня',
            'stroke' => 'Ход поршня',
            'qty' => 'Количество', 
        ];
    }

    public function getMaxStroke()
    {
        $code = Category::find()->select('code')->where(['id' => $id_cat])->column()[0];
        $series_stroke_1000 = ['MS', 'MSD'];
        if (in_array($code, $series_stroke_1000)) return 1000;
        return 100;
    }


}