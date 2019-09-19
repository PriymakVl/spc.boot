<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;
use yii\helpers\ArrayHelper;
use app\modules\order\classes\OrderCylinderForm;

class OrderFormCylinderWidget extends Widget {

	public $category;

	public function run()
	{
		$data['series'] = $this->createSeriesArray();
		$data['diameters'] = $this->getDiameters();
		$data['max_stroke'] = $this->getMaxStroke();
		$data['magneto'] = $this->getMagneto();
		$data['thread_rod'] = $this->getThreadRod();
		$model = new OrderCylinderForm();
		$model->id_cat = $this->category->id;
		$this->view->registerJsFile('@web/js/select_category_cylinder.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
		return $this->render('order_form_cylinder', compact('model', 'data'));
	}

	public function getThreadRod() 
	{
		switch ($this->category->code) {
			//CP
			//case 'CP': return false;
			// MS
			case 'MS': return 'out';
			case 'MSA': return 'out';
			case 'MSD': return 'out';
			case 'MSJ': return 'out';
			//MA
			case 'MA': return  'out';
			case 'MAA': return 'out';
			case 'MAD': return 'out';
			case 'MAJ': return 'out';
			// MAL
			case 'MAL': return  'option';
			case 'MSAL': return 'option';
			case 'MALD': return  'option';
			case 'MALJ': return 'option';
			// SDA
			case 'SDA': return 'option';
			case 'SSA': return 'option';
			case 'STA': return 'option';
			case 'SDAD': return 'option';
			case 'SDAJ': return 'option';
			// ADV
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			// JDA
			case 'JDA': return 'option';
			case 'JDS': return 'option';
			case 'JDAD': return 'option';
			case 'JDR': return 'option';
			case 'JDT': return 'option';
			case 'JDJ': return 'option';
			// SR
			case 'SR': return 'out';
			case 'SRD': return 'out';
			case 'SRJ': return 'out';
			case 'SRI': return 'out';
			case 'SRID': return 'out';
			case 'SRIJ': return 'out';
			// SW
			case 'SW': return 'out';
			case 'SWD': return 'out';
			case 'SWJ': return 'out';
			case 'SWI': return 'out';
			case 'SWID': return 'out';
			case 'SWIJ': return 'out';
			// SRT
			case 'SRT': return 'out';
			// SC
			case 'SC': return 'out';
			case 'SCD': return 'out';
			case 'SCJ': return 'out';
			// SCT
			case 'SCT': return 'out';
			// SG
			case 'SG': return 'out';
			case 'SGD': return 'out';
			case 'SGJ': return 'out';
			// QG
			case 'QGA': return 'out';
			case 'QGB': return 'out';
			// CG
			case 'CG': return false;
			case 'CG2': return false;
			case 'CG3': return false;
			// EM
			case 'EM': return false;
			// GMS
			case 'GMS': return  false;
			case 'GMSS': return false;
			case 'GLS': return  false;
			case 'GLSS': return false;
			case 'GLSD': return  false;
			// TM
			case 'TM': return false;

			default: return 'option'; 
		}
	}

	public function getMagneto()
	{
		switch ($this->category->code) {
			//CP
			case 'CP': return false;
			// MS
			case 'MS': return true;
			case 'MSA': return true;
			case 'MSD': return true;
			case 'MSJ': return true;
			//MA
			case 'MA': return  false;
			case 'MAA': return false;
			case 'MAD': return false;
			case 'MAJ': return false;
			// MAL
			case 'MAL': return  'option';
			case 'MSAL': return 'option';
			case 'MALD': return  'option';
			case 'MALJ': return 'option';
			// SDA
			case 'SDA': return 'option';
			case 'SSA': return 'option';
			case 'STA': return 'option';
			case 'SDAD': return 'option';
			case 'SDAJ': return 'option';
			// ADV
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			case 'ADV': return 'option';
			// JDA
			case 'JDA': return 'option';
			case 'JDS': return 'option';
			case 'JDAD': return 'option';
			case 'JDR': return 'option';
			case 'JDT': return 'option';
			case 'JDJ': return 'option';
			// SR
			case 'SR': return true;
			case 'SRD': return true;
			case 'SRJ': return true;
			case 'SRI': return true;
			case 'SRID': return true;
			case 'SRIJ': return true;
			// SW
			case 'SW': return true;
			case 'SWD': return true;
			case 'SWJ': return true;
			case 'SWI': return true;
			case 'SWID': return true;
			case 'SWIJ': return true;
			// SRT
			case 'SRT': return true;
			// SC
			case 'SC': return true;
			case 'SCD': return true;
			case 'SCJ': return true;
			// SCT
			case 'SCT': return true;
			// SG
			case 'SG': return true;
			case 'SGD': return true;
			case 'SGJ': return true;
			// QG
			case 'QGA': return false;
			case 'QGB': return false;
			// CG
			case 'CG': return false;
			case 'CG2': return false;
			case 'CG3': return 'option';
			// EM
			case 'EM': return 'option';
			// GMS
			case 'GMS': return  false;
			case 'GMSS': return false;
			case 'GLS': return  false;
			case 'GLSS': return false;
			case 'GLSD': return  false;
			// TM
			case 'TM': return false;

			default: return 'option'; 
		}
	}

	private function createSeriesArray()
	{
		$categories = Category::find()->where(['id_parent' => Category::PNEUMO_CYLINDER_CAT_ID, 'status' => Category::STATUS_ACTIVE])->asArray()->all();
		$series = ArrayHelper::map($categories, 'id', 'name');
		unset($series[862], $series[863], $series[1031], $series[1032]);
		return $series;
	}

	public function getMaxStroke()
	{
		switch($this->category->code) {
			// MS
			case 'MS': return 1000;
			case 'MSA': return 100;
			case 'MSD': return 1000;
			case 'MSJ': return 300;
			//MA
			case 'MA': return 1000;
			case 'MAA': return 100;
			case 'MAD': return 1000;
			case 'MAJ': return 300;
			// MAL
			case 'MAL': return 1000;
			case 'MSAL': return 100;
			case 'MALD': return 1000;
			case 'MALJ': return 300;
			// SDA
			case 'SDA': return 300;
			case 'SSA': return 100;
			case 'STA': return 100;
			case 'SDAD': return 300;
			case 'SDAJ': return 300;
			// ADV
			case 'ADV': return 500;
			case 'ADV': return 100;
			case 'ADV': return 500;
			case 'ADV': return 300;
			case 'ADV': return 100;
			case 'ADV': return 300;
			// JDA
			case 'JDA': return 500;
			case 'JDS': return 100;
			case 'JDAD': return 500;
			case 'JDR': return 300;
			case 'JDT': return 100;
			case 'JDJ': return 300;
			// SR
			case 'SR': return 1500;
			case 'SRD': return 1500;
			case 'SRJ': return 400;
			case 'SRI': return 1500;
			case 'SRID': return 1500;
			case 'SRIJ': return 400;
			// SW
			case 'SW': return 1500;
			case 'SWD': return 300;
			case 'SWJ': return 300;
			case 'SWI': return 300;
			case 'SWID': return 300;
			case 'SWIJ': return 300;
			// SRT
			case 'SRT': return 1500;
			// SC
			case 'SC': return 1500;
			case 'SCD': return 1500;
			case 'SCJ': return 400;
			// SCT
			case 'SCT': return 1500;
			// SG
			case 'SG': return 1500;
			case 'SGD': return 1500;
			case 'SGJ': return 400;
			// QG
			case 'QGA': return 1500;
			case 'QGB': return 1500;
			// CG
			case 'CG': return 1000;
			case 'CG2': return 1000;
			case 'CG3': return 1000;
			// EM
			case 'EM': return 200;
			// GMS
			case 'GMS': return 1500;
			case 'GMSS': return 500;
			case 'GLS': return 1500;
			case 'GLSS': return 500;
			case 'GLSD': return 1500;
			// TM
			case 'TM': return 200;

			default: return 1500;
		}
	}

	public function getDiameters()
	{
		switch ($this->category->code) {
			case 'CP': return [6 => '6мм', 10 => '10мм', 16 => '16мм'];
			//MS
			case 'MS': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			case 'MSA': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			case 'MSD': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			case 'MSJ': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			//MA
			case 'MA': return [8 => '8мм', 10 => '10мм',12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			case 'MAA': return [8 => '8мм', 10 => '10мм',12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			case 'MAD': return [8 => '8мм', 10 => '10мм',12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			case 'MAJ': return [8 => '8мм', 10 => '10мм',12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			//MAL
			case 'MAL': return [16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм'];
			case 'MSAL': return [16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм'];
			case 'MALD': return [16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм'];
			case 'MALJ': return [16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм'];
			//SDA
			case 'SDA': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SSA': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'STA': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SDAD': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SDAJ': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			//ADV
			case 'ADV': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'ADS': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'ADVD': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'ADR': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'ADT': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'ADJ': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			//JDA
			case 'JDA': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'JDS': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'JDAD': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'JDR': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'JDT': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'JDJ': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			//SR
			case 'SR': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			case 'SRD': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			case 'SRJ': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			case 'SRI': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			case 'SRID': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			case 'SRIJ': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			// SW
			case 'SW': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SWD': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SWJ': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SWI': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SWID': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'SWIJ': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			// SRT
			case 'SRT': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм'];
			// SC
			case 'SC': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 200 => '200мм'];
			case 'SCD': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 200 => '200мм'];
			case 'SCJ': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 200 => '200мм'];
			// SCT
			case 'SCT': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 200 => '200мм'];
			// SG
			case 'SG': return [125 => '125мм', 200 => '200мм', 250 => '250мм'];
			case 'SGD': return [125 => '125мм', 200 => '200мм', 250 => '250мм'];
			case 'SGJ': return [125 => '125мм', 200 => '200мм', 250 => '250мм'];
			// QGA
			case 'QGA': return [250 => '250мм', 400 => '400мм'];
			case 'QGB': return [250 => '250мм', 400 => '400мм'];
			// CG
			case 'CG': return [6 => '6мм', 8 => '8мм', 10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм'];
			case 'CG2': return [6 => '6мм', 8 => '8мм', 10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм'];
			case 'CG3': return [6 => '6мм', 8 => '8мм', 10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм'];
			// EM
			case 'EM': return [20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм'];
			// GMS
			case 'GMS': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'GMSS': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм'];
			case 'GLS': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм'];
			case 'GLSS': return [12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм'];
			case 'GLSD': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 200 => '200мм'];
			// TN
			case 'TN': return [10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			
			default: return [10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм'];
		}
	}



}