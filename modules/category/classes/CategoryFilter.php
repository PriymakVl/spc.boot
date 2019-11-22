<?php

namespace app\modules\category\classes;

use app\models\ModelBase;
use app\helpers\Helper;

class CategoryFilter extends ModelBase {

    public $id_main_cat; //for select tag

	public static function tableName()
    {
        return '{{categories_filters}}';
    }



    public function selectByIdCategory($id_cat)
    {
        return self::find()->select('id_filter')->where(['id_cat' => $id_cat, 'status' => self::STATUS_ACTIVE])->asArray()->column();
    }

    // public static function saveFilters($form)
    // {
    // 	$filters_exist = self::find()->where(['id_cat' => $form->id_cat, 'status' => self::STATUS_ACTIVE])->all();
    // 	if ($filters_exist) Helper::callMethods($filters_exist, ['delete']);
    // 	foreach ($form->filters_new as $id_filter) {
    // 		self::saveFilter($id_filter, $form->id_cat);
    // 	}
    // 	return true;
    // }

    // private static function saveFilter($id_filter, $id_cat)
    // {
    // 	$object = new self();
    // 	$object->id_filter = $id_filter;
    // 	$object->id_cat = $id_cat;
    // 	$object->save();
    // }

    public function add ($form)
    {
        $id_cat = $form->id_main_cat ? $form->id_main_cat : $form->id_cat;
        $result = self::findOne(['id_cat' => $id_cat, 'id_filter' => $form->id_filter, 'status' => self::STATUS_ACTIVE]);
        if ($result) return false;
        $this->id_cat = $id_cat;
        $this->id_filter = $form->id_filter;
        return $this->save();
    }

    public function rules()
    {
        return [
            [['id_cat', 'id_filter'], 'integer'],
        ];
    }


   
}
