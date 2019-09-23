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
        $code = Category::find()->select('code')->where(['id' => $this->id_cat])->column()[0];
        $series_stroke_1500 = ['SR', 'SRD', 'SRI', 'SRID', 'SW', 'SWD', 'SWI', 'SWID', 'SRT', 'SC', 'SCD', 'SCT', 'SG', 'SGD', 'QGA', 'QGB', 'GMS','GLS', 'GLSD'];
        $series_stroke_1000 = ['MS', 'MSD', 'MA', 'MAD', 'MAL', 'MALD', 'CG', 'CG2', 'CG3'];
        $series_stroke_500 = ['ADV', 'ADVD', 'JDA', 'JDAD', 'GMSS', 'GLSS'];
        $series_stroke_400 = ['SRJ', 'SRIJ', 'SWJ', 'SWIJ', 'SCJ', 'SGJ' ];
        $series_stroke_300 = ['MSI', 'MAJ', 'MALJ', 'SDA', 'SDAD', 'SDAJ', 'ADR', 'ADJ', 'JDR', 'JDJ'];
        $series_stroke_200 = ['EM', 'TN'];
        $series_stroke_100 = ['MSA', 'MAA', 'MSAL', 'SSA', 'STA', 'ADS', 'ADT', 'JDS', 'JDT'];
        if (in_array($code, $series_stroke_1500)) return 1500;
        if (in_array($code, $series_stroke_1000)) return 1000;
        if (in_array($code, $series_stroke_400)) return 400;
        if (in_array($code, $series_stroke_300)) return 300;
        if (in_array($code, $series_stroke_200)) return 200;
        if (in_array($code, $series_stroke_100)) return 100;
        return 1000;
    }


}