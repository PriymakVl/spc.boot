<?php

namespace app\modules\category\traits;

use app\modules\filter\Filter;
use yii\helpers\ArrayHelper;
use app\modules\category\classes\Category;

trait CategoryConvert {

    public function convertFiltersToList()
    {
        if (!$this->filters) return;
        $list = '<ol>';
        foreach ($this->filters as $filter) {
            $list .= sprintf('<li><a href="/filter/filter-admin/view?id=%s">%s</a></li>', $filter->id, $filter->title);
        }
        return $list .= '</ol>';
    }

    public function convertForSelectMain()
    {
        $params = ['id_parent' => null, 'status' => self::STATUS_ACTIVE];
        return Category::find()->select(['name'])->where($params)->asArray()->indexBy('id')->orderBy(['rating' => SORT_DESC])->column();
    }

    public function convertForSelectMainWithSubcategory()
    {
        $params = ['id_parent' => null, 'status' => self::STATUS_ACTIVE];
        $main = self::find()->select(['id', 'name'])->where($params)->asArray()->orderBy(['rating' => SORT_DESC])->all();
        for ($i = 0; $i < count($main); $i++) {
            $subcategories = self::find()->select(['name'])->where(['id_parent' => $main[$i]['id'], 'status' => self::STATUS_ACTIVE])->asArray()->indexBy('id')->column();
            if ($subcategories) $result[$main[$i]['name']] = $subcategories;
            else $result[$main[$i]['id']] = $main[$i]['name'];
        }
        return $result;
    }
}