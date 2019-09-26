<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;
use yii\helpers\ArrayHelper;
use app\modules\order\classes\OrderCylinderForm;

class OrderFormCylinderWidget extends Widget {

	public $series;

	public function run()
	{
		$series = $this->getSeries();
		$data['series'] = array_combine($series, $series);
		$data['diameters'] = $this->getDiameters();
		$data['max_stroke'] = $this->getMaxStroke();
		$data['magneto'] = $this->getMagneto();
		$data['thread_rod'] = $this->getThreadRod();
		$model = new OrderCylinderForm();
		$model->series = $this->series;
		$series = $this->series;
		$this->view->registerJsFile('@web/js/select_series_cylinder.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
		return $this->render('order_form_cylinder', compact('model', 'data', 'series'));
	}

	public function getThreadRod() 
	{
		switch ($this->series) {
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
			case 'QG': return 'out';
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
		switch ($this->series) {
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
			case 'QG': return false;
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

	private function getSeries()
	{
		switch($this->series) {
			// CP
			case 'CP': return ['CP'];
			// MS
			case 'MS': return ['MS', 'MSA', 'MSD', 'MSJ'];
			case 'MSA': return ['MS', 'MSA', 'MSD', 'MSJ'];
			case 'MSD': return ['MS', 'MSA', 'MSD', 'MSJ'];
			case 'MSJ': return ['MS', 'MSA', 'MSD', 'MSJ'];
			//MA
			case 'MA': return ['MA', 'MAA', 'MAD', 'MAJ'];
			case 'MAA': return ['MA', 'MAA', 'MAD', 'MAJ'];
			case 'MAD': return ['MA', 'MAA', 'MAD', 'MAJ'];
			case 'MAJ': return ['MA', 'MAA', 'MAD', 'MAJ'];
			// MAL
			case 'MAL': return ['MAL', 'MSAL', 'MALD', 'MALJ'];
			case 'MSAL': return ['MAL', 'MSAL', 'MALD', 'MALJ'];
			case 'MALD': return ['MAL', 'MSAL', 'MALD', 'MALJ'];
			case 'MALJ': return ['MAL', 'MSAL', 'MALD', 'MALJ'];
			// SDA
			case 'SDA': return ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ'];
			case 'SSA': return ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ'];
			case 'STA': return ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ'];
			case 'SDAD': return ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ'];
			case 'SDAJ': return ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ'];
			// ADV
			case 'ADV': return ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'];
			case 'ADS': return ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'];
			case 'ADVD': return ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'];
			case 'ADR': return ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'];
			case 'ADT': return ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'];
			case 'ADJ': return ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'];
			// JDA
			case 'JDA': return ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
			case 'JDS': return ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
			case 'JDAD': return ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
			case 'JDR': return ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
			case 'JDT': return ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
			case 'JDJ': return ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
			// SR
			case 'SR': return ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'];
			case 'SRD': return ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'];
			case 'SRJ': return ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'];
			case 'SRI': return ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'];
			case 'SRID': return ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'];
			case 'SRIJ': return ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'];
			// SW
			case 'SW': return ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'];
			case 'SWD': return ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'];
			case 'SWJ': return ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'];
			case 'SWI': return ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'];
			case 'SWID': return ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'];
			case 'SWIJ': return ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'];
			// SRT
			case 'SRT': return ['SRT'];
			// SC
			case 'SC': return ['SC', 'SCD', 'SCJ'];
			case 'SCD': return ['SC', 'SCD', 'SCJ'];
			case 'SCJ': return ['SC', 'SCD', 'SCJ'];
			// SCT
			case 'SCT': return ['SCT'];
			// SG
			case 'SG': return ['SG', 'SGD', 'SGJ'];
			case 'SGD': return ['SG', 'SGD', 'SGJ'];
			case 'SGJ': return ['SG', 'SGD', 'SGJ'];
			// QG
			case 'QG': return ['QGA', 'SGB'];
			case 'QGA': return ['QGA', 'SGB'];
			case 'QGB': return ['QGA', 'SGB'];
			// CG
			case 'CG': return ['CG', 'CG2', 'CG3'];
			case 'CG2': return ['CG', 'CG2', 'CG3'];
			case 'CG3': return ['CG', 'CG2', 'CG3'];
			// EM
			case 'EM': return ['EM'];
			// GMS
			case 'GMS': return ['GMS','GMSS', 'GLS', 'GLSS', 'GLSD'];
			case 'GMSS': return ['GMS','GMSS', 'GLS', 'GLSS', 'GLSD'];
			case 'GLS': return ['GMS','GMSS', 'GLS', 'GLSS', 'GLSD'];
			case 'GLSS': return ['GMS','GMSS', 'GLS', 'GLSS', 'GLSD'];
			case 'GLSD': return ['GMS','GMSS', 'GLS', 'GLSS', 'GLSD'];
			// TM
			case 'TM': return ['TM'];

			default: return ['CP', 'MS', 'MA', 'MAL', 'SDA', 'ADV', 'JDA', 'SR', 'SW', 'SRT', 'SC', 'SCT', 'SG', 'QG', 'CG', 'EM', 'GMS'];
		}
		
	}

	public function getMaxStroke()
	{
		switch($this->series) {
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
			case 'ADS': return 100;
			case 'ADVD': return 500;
			case 'ADR': return 300;
			case 'ADT': return 100;
			case 'ADJ': return 300;
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
		switch ($this->series) {
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
			case 'SC': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 160 => '160мм', 200 => '200мм'];
			case 'SCD': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 160 => '160мм', 200 => '200мм'];
			case 'SCJ': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 160 => '160мм', 200 => '200мм'];
			// SCT
			case 'SCT': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 160 => '160мм', 200 => '200мм'];
			// SG
			case 'SG': return [125 => '125мм', 160 => '160мм', 200 => '200мм', 250 => '250мм'];
			case 'SGD': return [125 => '125мм', 160 => '160мм', 200 => '200мм', 250 => '250мм'];
			case 'SGJ': return [125 => '125мм', 160 => '160мм', 200 => '200мм', 250 => '250мм'];
			// QG
			case 'QG': return [250 => '250мм', 320 => '320мм', 400 => '400мм'];
			case 'QGA': return [250 => '250мм', 320 => '320мм', 400 => '400мм'];
			case 'QGB': return [250 => '250мм', 320 => '320мм', 400 => '400мм'];
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
			case 'GLSD': return [32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм', 80 => '80мм', 100 => '100мм', 125 => '125мм', 160 => '160мм', 200 => '200мм'];
			// TN
			case 'TN': return [10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм'];
			
			default: return [10 => '10мм', 12 => '12мм', 16 => '16мм', 20 => '20мм', 25 => '25мм', 32 => '32мм', 40 => '40мм', 50 => '50мм', 63 => '63мм'];
		}
	}



}