<?php

namespace app\modules\order\classes;

use Yii;
use yii\base\Model;
use app\models\OrderCylinder;
use yii\web\NotFoundHttpException;
use app\modules\category\classes\Category;

class OrderCylinderForm extends Model
{
    public $series;
    public $diameter;
    public $stroke;
    public $qty;
    public $magneto;
    public $thread_rod;
    public $effort; //for series CPT

    public function rules()
    {
        return [
            [['diameter, effort'], 'integer'],
            [['id_cat', 'diameter', 'length', 'qty', 'stroke', 'effort'], 'required'],
            [['magneto', 'tread_rod', 'series'], 'string'],
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
            'effort' => 'Максимальное усилие',
        ];
    }

    public function getMaxStroke()
    {
        $series = Yii::$app->request->get('series');
        $series_stroke_1500 = ['SR', 'SRD', 'SRI', 'SRID', 'SW', 'SWD', 'SWI', 'SWID', 'SRT', 'SC', 'SCD', 'SCT', 'SG', 'SGD', 'QGA', 'QGB', 'GMS','GLS', 'GLSD'];
        $series_stroke_1000 = ['MS', 'MSD', 'MA', 'MAD', 'MAL', 'MALD', 'CG', 'CG2', 'CG3'];
        $series_stroke_500 = ['ADV', 'ADVD', 'JDA', 'JDAD', 'GMSS', 'GLSS'];
        $series_stroke_400 = ['SRJ', 'SRIJ', 'SWJ', 'SWIJ', 'SCJ', 'SGJ' ];
        $series_stroke_300 = ['MSI', 'MAJ', 'MALJ', 'SDA', 'SDAD', 'SDAJ', 'ADR', 'ADJ', 'JDR', 'JDJ'];
        $series_stroke_200 = ['EM', 'TN'];
        $series_stroke_100 = ['MSA', 'MAA', 'MSAL', 'SSA', 'STA', 'ADS', 'ADT', 'JDS', 'JDT'];
        if (in_array($series, $series_stroke_1500)) return 1500;
        if (in_array($series, $series_stroke_1000)) return 1000;
        if (in_array($series, $series_stroke_400)) return 400;
        if (in_array($series, $series_stroke_300)) return 300;
        if (in_array($series, $series_stroke_200)) return 200;
        if (in_array($series, $series_stroke_100)) return 100;
        return 1000;
    }


}