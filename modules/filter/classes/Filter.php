<?php

namespace app\modules\filter\classes;

use app\models\ModelBase;
use app\modules\category\classes\CategoryFilter;
use app\modules\filter\classes\FilterItem;
use app\modules\category\classes\Category;
use app\modules\product\classes\Product;
use app\modules\product\classes\ProductItemFilter;
use app\helpers\Helper;

class Filter extends ModelBase {

    private $catId;

	public static function tableName()
    {
        return '{{filters}}';
    }

    public function setCatId($cat_id)
    {
        $this->catId = $cat_id;
        return $this;
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

    //если есть продукты для этого фильтра то в фильтре выбирает только элементы этих продуктоы
    public function getItems()
    {
        if ($this->catId) $item_ids = $this->getItemsForCategory();
        if ($item_ids) return FilterItem::find()->where(['id_filter' => $this->id, 'id' => $item_ids, 'status' => STATUS_ACTIVE])->orderBy(['rating' => SORT_DESC])->all();
        return (new FilterItem)->selectByIdFilter($this->id);
    }

    public function getItemsForCategory()
    {
        $cat = Category::findOne($this->catId);
        $products = Product::getProductsCategory($cat);
        if (!$products) return $this;
        $prod_ids = Helper::getProperties($products, 'id');
        return ProductItemFilter::find()->select('id_item')->where(['id_filter' => $this->id, status => STATUS_ACTIVE])->asArray()->groupBy('id_item')->column();
    }

    public function selectByName($name)
    {
    	return self::find()->where(['name' => $name,  'status' => self::STATUS_ACTIVE])->limit(1)->one();
    }

    public function saveFilter($form)
    {
        $this->name = strtolower(trim($form->name));
        $this->title = trim($form->title);
        $this->title_long = trim($form->title_long);
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
