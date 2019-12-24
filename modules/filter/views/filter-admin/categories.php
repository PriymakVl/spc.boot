<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\category\classes\CategoryFilter;
use app\modules\category\classes\Category;

$this->title = 'Категории фильтра';
?>

<div class="categories_filter">

    <h1>
    	<? printf('%s: <a href="/filter/filter-admin/view?id=%s" class="text-info">%s</a>', $this->title, $filter->id, $filter->title_long); ?>
    </h1>

    <table class="table table-striped table-bordered table-hover">
        <tr>
            <th width="40">№</th>
            <th class="text-primary">Наименование</th>
            <th class="text-primary">Операции</th>
        </tr>
        <? if ($categories): ?>
            <? $number = 1; ?>
            <? foreach($categories as $category): ?>
                <? if (!$category) continue; ?>
                <tr >
                    <td><?=$number?></td>
                    <td><?=$category->getNameWithParent()?></td>
                    <!-- actions filter category -->
                    <td>
                        <!-- select item filter for category -->
                        <a href="#" onclick="delete_cat(this);" data-cat="<?=$category->id?>"  data-filter="<?=$filter->id?>">Удалить</a>
                    </td>
                </tr>
                <? $number++; ?>
            <? endforeach; ?>
        <? else: ?>
            <td colspan="3" class="text-danger">Категорий еще нет</td>
        <? endif; ?>
    </table>

    <!-- form add category -->
    <?php 
        $form = ActiveForm::begin();
            //id main cat
            $items = Category::convertForSelectMain();
            echo $form->field($model, 'id_main_cat')->dropDownList($items,['prompt' => 'Не выбрана'])->label('Главная категория');
            //id cat
            $items = (new Category)->convertForSelectMainWithSubcategory();
            echo $form->field($model, 'id_cat')->dropDownList($items,['prompt' => 'Не выбрана'])->label('Категория');
            //id_filter
            echo $form->field($model, 'id_filter', ['template' => '{input}'])->hiddenInput(['value' => $filter->id]);
            //button submit
            echo Html::submitButton('Добавить категорию', ['class' => 'btn btn-success']);
        ActiveForm::end(); 
    ?>

</div>

<!-- js code -->
<script type="text/javascript">

function delete_cat(elem) {
    let agree = confirm('Вы действительно хотите удалить категорию');
    if (!agree) return;
    let id_cat = elem.dataset.cat;
    let id_filter = elem.dataset.filter;
    location.href = '/filter/filter-admin/delete-category?id_cat=' + id_cat + '&id_filter=' + id_filter;
}

</script>



