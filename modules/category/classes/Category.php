<?php

namespace app\modules\category\classes;

use app\modules\category\classes\CategoryBase;
use app\modules\product\classes\Product;
use app\models\Image;
use app\modules\filter\classes\Filter;
use app\modules\category\classes\CategoryFilter;
use yii\helpers\Inflector;//translit
use yii\web\NotFoundHttpException;

class Category extends CategoryBase {

    const PNEUMO_CYLINDER_CAT_ID = 830;

	public function getProducts()
	{
        return  Product::findAll(['id_cat' => $this->id, 'status' => self::STATUS_ACTIVE, 'IBLOCK_ID' => 14]);
	}

	public function getChildren()
	{
        return self::find()->where(['id_parent' => $this->id, 'status' => self::STATUS_ACTIVE])->orderBy(['rating' => SORT_DESC])->all();
	}

    public function getImage()
    {
        return (new Image)->get($this->id_img);
    }

    public function getFilters()
    {
    	$ids = CategoryFilter::find()->select(['id_filter'])->where(['id_cat' => $this->id, 'status' => self::STATUS_ACTIVE])->orderBy(['rating' => SORT_DESC])->asArray()->column();
        if (!$ids) return;
        foreach ($ids as $id) {
            $filter = Filter::findOne($id);
            if ($filter) $filters[] = $filter;
        }
    	return $filters;
    }

    public function saveCategory($form)
    {
    	$this->name = $form->name;
        $this->code = $form->code;
    	$this->id_parent = $form->id_parent;
    	$this->description = $form->description;
        $this->IBLOCK_ID = '14';
        if (!$this->translit || $this->translit != $form->translit) $this->translit = $this->translitName($form);
        if ($form->rating) $this->rating = $form->rating;
    	if ($this->save()) return $this;
    }

    private function translitName()
    {
        if (!$this->translit && !$form->translit) $translit = Inflector::slug($form->name);
        else $translit = $form->translit;
        if (self::findOne(['translit' => $translit])) throw new NotFoundHttpException('Не уникальный транслит');
        return $translit;
    }

    public function getNameWithParent()
    {
        if (!$this->parent) return $this->name;
        return $this->parent->name. ' / '. $this->name;
    }

    public function rules()
    {
    	return [
    		[['name', 'description', 'code', 'translit'], 'string'],
    		[['id_parent', 'rating'], 'integer'],
    		['name', 'required'],
    	];
    }
   
}
