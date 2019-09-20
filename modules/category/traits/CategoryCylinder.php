<?php

namespace app\modules\category\traits;

trait CategoryCylinder {

    public function getCodeCylinder($cylinder)
    {
    	$cylinder = (object) $cylinder;
    	$code = $this->createCodeCylinder($cylinder);
    	return $code;
    }

    private function createCodeCylinder($cylinder)
    {
    	$code = 'SC';
    	$code .= '-'.$this->code;
    	$code .= '-'.$cylinder->diameter.'x'.$cylinder->stroke;
        if ($cylinder->magneto == 'yes') $code .= '-S';
    	if ($cylinder->thread_rod == 'out' || $cylinder->thread_rod == 'with') $code .= '-B';
    	return $code;
    }

    public function getDescriptionCylinder($cylinder)
    {
        $cylinder = (object) $cylinder; 
        $description = $this->getHeaderDescription();
        $description .= 'диаметр '.$cylinder->diameter.' ';
        $description .= 'ход '.$cylinder->stroke;
        $description .= $this->getMagnetoDescription($cylinder);
        $description .= $this->getThreadRodDescription($cylinder);
        $description .= $this->getSleeveShapeDescription();
        if ($this->code == 'CG3') $description .= ' (с магнитами для срабатывания датчиков положения и планкой для закрепления датчиков)';
        return $description;
    }

    private function getHeaderDescription()
    {
        $messages = parse_ini_file(\Yii::getAlias('@app/web/ini/cylinders.ini'), true);
        return $messages[$this->code] ? $messages[$this->code] : 'Пневматический цилиндр ';
    }

    private function getMagnetoDescription($cylinder)
    {
        if ($this->code == 'CP') return '';
        if ($cylinder->magneto == 'yes') return ' с магнитом на поршне, ';
        return ' без магнита на поршне, ';
    }

    private function getThreadRodDescription($cylinder)
    {
        if ($this->code == 'CP') {
            if ($cylinder->thread_rod == 'with') return ' с резьбой на штоке';
            else return ' без резьбы на штоке';
        }
        if ($cylinder->thread_rod == 'out') return ' с наружной резьбой на штоке ';
        else return ' с внутренней резьбой на штоке ';
    }

    private function getSleeveShapeDescription() 
    {
        switch ($this->code) {
            case 'SR': return ' (круглая гильза, шпильки видны)';
            case 'SRD': return ' (круглая гильза, шпильки видны)';
            case 'SRJ': return ' (круглая гильза, шпильки видны)';
            case 'SRI': return ' (профильрая гильза, шпильки не видны)';
            case 'SRID': return ' (профильрая гильза, шпильки не видны)';
            case 'SRIJ': return ' (профильрая гильза, шпильки не видны)';

            case 'SW': return ' (круглая гильза, шпильки видны)';
            case 'SWD': return ' (круглая гильза, шпильки видны)';
            case 'SWJ': return ' (круглая гильза, шпильки видны)';
            case 'SWI': return ' (профильрая гильза, шпильки не видны)';
            case 'SWID': return ' (профильрая гильза, шпильки не видны)';
            case 'SWIJ': return ' (профильрая гильза, шпильки не видны)';

            case 'SRT': return ' (круглая гильза, шпильки видны)';
            
            case 'SC': return ' (круглая гильза, шпильки видны)';
            case 'SCD': return ' (круглая гильза, шпильки видны)';
            case 'SCJ': return ' (круглая гильза, шпильки видны)';
            
            case 'SCT': return ' (круглая гильза, шпильки видны)';
            
            case 'SG': return ' (круглая гильза, шпильки видны)';
            case 'SGD': return ' (круглая гильза, шпильки видны)';
            case 'SGJ': return ' (круглая гильза, шпильки видны)';
            
            case 'QGA': return ' (круглая гильза, шпильки видны)';
            case 'QGB': return ' (круглая гильза, шпильки видны)';

            default: return '';
        }
    }

}