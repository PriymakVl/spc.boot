<?php

namespace app\modules\category\classes;

use app\models\ModelBase;
use app\modules\category\traits\CategoryList; 
use app\modules\category\traits\CategoryModel; 
use app\modules\category\traits\CategoryConvert; 
use app\modules\category\traits\CategoryCylinder; 
use app\modules\category\traits\CategoryCylinderFilter; 


class CategoryBase extends ModelBase {

	use CategoryList, CategoryModel, CategoryConvert, CategoryCylinder, CategoryCylinderFilter;
    
    public static function tableName()
    {
        return '{{categories}}';
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Название',
            'id_parent' => 'Родитель',
            'description' => 'Описание',
            'filters' => '',
            'code' => 'Код',
            'rating' => 'Райтинг',
            'translit' => 'Транслитерация',
            'meta_title' => 'Title',
            'meta_description' => 'Meta description',
            'meta_keywords' => 'Meta keywords',
        ];
    }





}
