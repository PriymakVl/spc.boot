<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\modules\category\classes\Category;
use app\modules\filter\Filter;
use yii\helpers\ArrayHelper;

class FilterWidget extends Widget {

	public $cat;

	public function run()
	{
		$filters = $this->createFiltersNamesArray();
		// $this->view->registerCssFile('filter/filter_widget.css');
		return $this->render('filters/main', ['filters' => $filters, 'cat' => $this->cat]);
	}

	private function createFiltersNamesArray()
	{
		if (!$this->cat->filters) return;
		$names = [];
		foreach ($this->cat->filters as $filter) {
			$names[] = $filter->name;
		}
		return $names;
	}



}