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
    	if ($cylinder->thread_rod == 'out') $code .= '-B';
    	return $code;
    }

    public function getDescriptionCylinder($cylinder)
    {
        $cylinder = (object) $cylinder; 
        $description = $this->getHeaderDescription();
        $description .= 'диаметр '.$cylinder->diameter.' ';
        $description .= 'ход '.$cylinder->stroke;
        $description = ($cylinder->magneto == 'yes') ? $description .= ' с магнитом, ' : $description .= ' без магнита, ';
        $description = ($cylinder->thread_rod == 'out') ? $description .= ' с наружной резьбой на штоке ' : $description .= ' с внутренней резьбой на штоке ';
        return $description;
    }

    private function getHeaderDescription()
    {
        $messages = parse_ini_file(\Yii::getAlias('@web/ini/cylinders.ini'), true);
        return $messages[$this->code] ? $messages[$this->code] : 'Пневматический цилиндр ';
    }

}