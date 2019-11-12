<?php

use yii\helpers\Html;
use app\modules\filter\classes\Filter;

$this->title = 'Фильтры категории';
?>
<div class="filters-category">

    <h1>
    	<? printf('%s: <a href="/category/category-admin/view?id=%s" class="text-info">%s</span>', $this->title, $cat->id, $cat->name); ?>
    </h1>

  	<form action="/category/category-admin/save-filters">
  		<!-- id category -->
  		<input type="hidden" name="id_cat" value="<?=$cat->id?>">

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="40">№</th>
            <th class="text-primary">Наименование</th>
            <th class="text-primary">Рейтинг</th>
            <th class="text-primary">Операции</th>
        </tr>
        <? if ($cat->filters): ?>
            <? $number = 1; ?>
            <? foreach($cat->filters as $filter): ?>
                <tr >
                    <td><?=$number?></td>
                    <td><?=$filter->title?></td>
                    <td><?=$filter->getRating($cat->id)?></td>
                    <!-- actions filter category -->
                    <td>
                        <!-- select item filter for category -->
                        <a href="#" class="edit_rating" id_cat="<?=$cat->id?>" id_filter="<?=$filter->id?>">Редактировать рейтинг</a>
                    </td>
                </tr>
                <? $number++; ?>
            <? endforeach; ?>
        <? else: ?>
            <td colspan="3" class="text-danger">Фильтров еще нет</td>
        <? endif; ?>
    </table>
    <!-- buttoons block -->
    <? if ($all_filters): ?>
	    <div class="form-group">
	        <input type="submit" value="Сохранить" class="btn btn-success" nam="save">
			<a href="javascript:history.back()" class="btn btn-info">Отменить</a>
	    </div>
    <? endif; ?>
	 </form>

</div>


