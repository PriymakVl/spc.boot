<?php

namespace app\modules\category\traits;

trait CategoryCylinderFilter {

	//standart
	private $standard_6430 = ['seriya_sc', 'seriya_sct'];
    private $standard_6431 = ['seriya_sr', 'seriya_sw', 'seriya_srt', 'seriya_sg', ];
    private $standard_6432 = ['seriya_ms', 'seriya_ma', ];
    private $standard_21287 = ['seriya_jda'];
 	//type
 	private $type_mini = ['seriya_cp'];
 	private $type_compact = ['seriya_sda', 'seriya_adv', 'seriya_jda'];
 	private $type_tandem = ['seriya_srt', 'seriya_sct'];
 	private $type_rodless = ['seriya_cg'];
 	private $type_integrated_guides = ['seriya_em'];
 	// private $type_guides = ['seriya_gms'];
 	private $type_double = ['seriya_tn'];
 	private $type_converter = ['seriya_crt'];

	public function filterCylinders()
    {
        
        $children_standard = $this->filterStandard($this->children);
        $this->childrenFilter = $children_standard ? $children_standard : $this->children;
        $children_type = $this->filterType($this->childrenFilter);
        $this->childrenFilter = $children_type ? $children_type : $this->children;
        // if ($standart) $cat->children = $this->filterStandart($standart);
        // debugProp($this->children, 'translit');
    }

    private function filterStandard($cats) 
    {
    	$standards_cats = $this->getArrayCategoriesByStandard();
    	if (!$standards_cats) return false;
        return $this->filterCategories($standards_cats, $cats);
    }

    private function filterType($cats) 
    {
        $types_cats = $this->getArrayCategoriesByType();
        if (!$types_cats) return;
        return $this->filterCategories($types_cats, $cats);
    }

    private function filterCategories($cats_arr, $cats) 
    {
        $cats_filter = [];
        foreach ($cats as $cat) {
            $translit = $this->getTranslitBySeriesCylinder($cat->code);
            if (in_array($translit, $cats_arr)) $cats_filter[] = $cat;
        }
        return $cats_filter;
    }

    private function getArrayCategoriesByStandard() {
    	$standard = \Yii::$app->request->get('standart');
    	if ($standard == 6430) return $this->standard_6430;
    	if ($standard == 6431) return $this->standard_6431;
    	if ($standard == 6432) return $this->standard_6432;
    	if ($standard == 21287) return $this->standard_21287;
    }

    private function getArrayCategoriesByType() {
    	$type = \Yii::$app->request->get('type');
    	if ($type == 'mini') return $this->type_mini;
    	if ($type == 'compact') return $this->type_compact;
    	if ($type == 'tandem') return $this->type_tandem;
    	if ($type == 'rodless') return $this->type_rodless;
    	if ($type == 'integrated_guides') return $this->type_integrated_guides;
    	if ($type == 'double') return $this->type_double;
    	if ($type == 'converter') return $this->type_converter;
    }


}