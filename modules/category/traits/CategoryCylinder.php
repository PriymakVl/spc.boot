<?php

namespace app\modules\category\traits;

trait CategoryCylinder {

    public static function getCodeCylinder($cylinder)
    {
    	$cylinder = (object) $cylinder;
    	$code = self::createCodeCylinder($cylinder);
    	return $code;
    }

    private static function createCodeCylinder($cylinder)
    {
    	$code = 'SC';
    	$code .= '-'.$cylinder->series;
    	$code .= '-'.$cylinder->diameter.'x'.$cylinder->stroke;
        if ($cylinder->magneto == 'yes') $code .= '-S';
        $thread_rod_arr = ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ', 'ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ', 'SDA', 'SSA', 'STA', 'SDAD', 'SDAJ', 'CP'];
        if (in_array($cylinder->series, $thread_rod_arr)) {
            if ($cylinder->thread_rod == 'out' || $cylinder->thread_rod == 'with') $code .= '-B';
        }
    	return $code;
    }

    public  static function getCodeConverter($effort)
    {
        switch($effort) {
            case '3'; return 'SC-CPT-63X100-20-3';
            case '5'; return 'SC-CPT-80X100-20-5';
            case '10'; return 'SC-CPT-80X100-20-10';
            case '15'; return 'SC-CPT-100X100-20-15';
            case '20'; return 'SC-CPT-125X100-20-20';
            case '30'; return 'SC-CPT-125X100-20-30';
            case '40'; return 'SC-CPT-160X100-20-40';
        }
    }

    public static function getDescriptionConverter($effort)
    {
        return 'Пневмогидравлический преобразователь, ход под низким усилием 100мм, ход с максимальным усилием 20мм. Маскимальное усилие '. $effort .' тонны';
    }

    public static function getDescriptionCylinder($cylinder)
    {
        $cylinder = (object) $cylinder; 
        $description = self::getHeaderDescription($cylinder->series);
        //for rail
        if (in_array($cylinder->series, ['GMS', 'GMSS', 'GLS', 'GLSS', 'GLSD'])) return $description;
        //for cylinder
        $description .= 'диаметр '.$cylinder->diameter.' ';
        $description .= 'ход '.$cylinder->stroke;
        $description .= self::getMagnetoDescription($cylinder);
        $description .= self::getThreadRodDescription($cylinder);
        $description .= self::getSleeveShapeDescription($cylinder->series);
        if ($cylinder->series == 'CG3') $description .= ' (с магнитами для срабатывания датчиков положения и планкой для закрепления датчиков)';
        return $description;
    }

    private static function getHeaderDescription($series)
    {
        $messages = parse_ini_file(\Yii::getAlias('@app/web/ini/cylinders.ini'), true);
        return $messages[$series] ? $messages[$series] : 'Пневматический цилиндр ';
    }

    private static function getMagnetoDescription($cylinder)
    {
        if (in_array($cylinder->series, ['CP', 'CG2', 'CG3'])) return '';
        if ($cylinder->magneto == 'yes') return ' с магнитом на поршне, ';
        return ' без магнита на поршне, ';
    }

    private static function getThreadRodDescription($cylinder)
    {
        if ($cylinder->series == 'CP') {
            if ($cylinder->thread_rod == 'with') return ' с резьбой на штоке';
            else return ' без резьбы на штоке';
        }
        $series_with = ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ', 'ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ', 'JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'];
        if (!in_array($cylinder->series, $series_with)) return '';
        if ($cylinder->thread_rod == 'out') return ' с наружной резьбой на штоке ';
        return ' с внутренней резьбой на штоке ';
    }

    private static function getSleeveShapeDescription($series) 
    {
        switch ($series) {
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

    //for form order cylinder
    public static function getImageForSeries($series)
    {
        $parent = self::getParentCategoryBySeriesCylinder($series);
        if (!$parent) return false;
        $cat = self::find()->where(['code' => $parent])->limit(1)->one();
        return $cat->image;
    }

    private static function getParentCategoryBySeriesCylinder($series) {
        // CP
        if (in_array($series, ['CP'])) return 'CP';
        // MS
        else if (in_array($series, ['MS', 'MSA', 'MSD', 'MSJ'])) return 'MS';
        //MA
        else if (in_array($series, ['MA', 'MAA', 'MAD', 'MAJ'])) return 'MA';
        // MAL
        else if (in_array($series, ['MAL', 'MSAL', 'MALD', 'MALJ'])) return 'MAL';
        // SDA
        else if (in_array($series, ['SDA', 'SSA', 'STA', 'SDAD', 'SDAJ'])) return 'SDA';
        // ADV
        else if (in_array($series, ['ADV', 'ADS', 'ADVD', 'ADR', 'ADT', 'ADJ'])) return 'ADV';
        // JDA
        else if (in_array($series, ['JDA', 'JDS', 'JDAD', 'JDR', 'JDT', 'JDJ'])) return 'JDA';
        // SR
        else if (in_array($series, ['SR', 'SRD', 'SRJ', 'SRI', 'SRID', 'SRIJ'])) return 'SR';
        // SW
        else if (in_array($series, ['SW', 'SWD', 'SWJ', 'SWI', 'SWID', 'SWIJ'])) return 'SW';
        // SRT
        else if (in_array($series, ['SRT'])) return 'SRT';
        // SC
        else if (in_array($series, ['SC', 'SCD', 'SCJ'])) return 'SC';
        // SCT
        else if (in_array($series, ['SCT'])) return 'SCT';
        // SG
        else if (in_array($series, ['SG', 'SGD', 'SGJ'])) return 'SG';
        // QG
        else if (in_array($series, ['QGA', 'SGB', 'QG'])) return 'QG';
        // CG
        else if (in_array($series, ['CG', 'CG2', 'CG3'])) return 'CG';
        // EM
        else if (in_array($series, ['EG'])) return 'EG';
        // GMS
        else if (in_array($series, ['GMS','GMSS', 'GLS', 'GLSS', 'GLSD'])) return 'GMS';
        // TM
        else if (in_array($series, ['TM'])) return 'TM';
        //CPT
        else if (in_array($series, ['CPT'])) return 'CPT';
    }

    public function getTranslitBySeriesCylinder($series)
    {
        $parent = self::getParentCategoryBySeriesCylinder($series);
        if (!$parent) return false;
        switch ($parent) {
            case 'SR': return 'seriya_sr';
            case 'SC': return 'seriya_sc';
            case 'MS': return 'seriya_ms';
            case 'MAL': return 'seriya_mal';
            case 'SDA': return 'seriya_sda';
            case 'ADV': return 'seriya_adv';
            case 'JDA': return 'seriya_jda';
            case 'CP': return 'seriya_cp';
            case 'SG': return 'seriya_sg';
            case 'EM': return 'seriya_em';
            case 'SW': return 'seriya_sw';
            case 'MA': return 'seriya_ma';
            case 'SRT': return 'seriya_srt';
            case 'SCT': return 'seriya_sct';
            case 'QGA': return 'seriya_qga';
            case 'CG': return 'seriya_cg';
            case 'EG': return 'seriya_eg';
            case 'GMS': return 'seriya_gms';
            case 'TM': return 'seriya_tm';
            case 'QG': return 'seriya_qg';
            case 'CPT': return 'seriya_cpt';
        }
    }

    

}