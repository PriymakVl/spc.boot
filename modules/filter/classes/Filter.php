<?php

namespace app\modules\filter\classes;

use app\models\ModelBase;
use app\modules\category\classes\CategoryFilter;
use app\modules\filter\classes\FilterItem;
use app\modules\category\classes\Category;

class Filter extends ModelBase {

	public static function tableName()
    {
        return '{{filters}}';
    }

    public function getForCategory($id_cat)
    {
    	$ids_arr = (new CategoryFilter)->selectByIdCategory($id_cat);
    	if ($ids_arr) return self::find()->select('name')->where(['id' => $ids_arr])->column();
    }

    public static function selectAllNames()
    {
    	return self::find()->select('name')->where(['status' => self::STATUS_ACTIVE])->column();
    }

    public function getItems()
    {
    	return (new FilterItem)->selectByIdFilter($this->id);
    }

    public function selectByName($name)
    {
    	return self::find()->where(['name' => $name,  'status' => self::STATUS_ACTIVE])->limit(1)->one();
    }

    public function saveFilter($form)
    {
        $this->name = strtolower(trim($form->name));
        $this->title = trim($form->title);
        return $this->save();
    }

    public function getRating($id_cat)
    {
        $obj = CategoryFilter::findOne(['id_cat' => $id_cat, 'id_filter' => $this->id, 'status' => self::STATUS_ACTIVE]);
        return $obj ? $obj->rating : 0;
    }

    public function getCategories()
    {
        $items = CategoryFilter::findAll(['id_filter' => $this->id, 'status' => self::STATUS_ACTIVE]);
        if (!$items) return;
        foreach ($items as $item) {
            $cats[] = Category::findOne(['id' => $item->id_cat, 'status' => self::STATUS_ACTIVE]);
        }
        return $cats;
    }

    public function rules()
    {
        return [
            [['name', 'title'], 'required'],
        ];
    }
   
}
