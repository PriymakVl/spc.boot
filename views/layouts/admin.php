<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Specialist',
        'brandUrl' => '/',
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $items = [
                ['label' => 'Звонки', 'url' => ['/callback/index'], 'active' => (Yii::$app->controller->id == 'admin')],
                ['label' => 'Заказы', 'url' => ['/admin/order'], 'active' => (Yii::$app->controller->id == 'order-admin')],
                ['label' => 'Заказчики', 'url' => ['/admin/customer'], 'active' => (Yii::$app->controller->id == 'customer-admin' && Yii::$app->controller->action->id == 'index')],
                ['label' => 'Категории', 'url' => ['/admin/category'], 'active' => (Yii::$app->controller->id == 'category-admin')],
                ['label' => 'Продукты', 'url' => ['/admin/product'], 'active' => (Yii::$app->controller->id == 'product-admin')],
                ['label' => 'Фильтры', 'url' => ['/admin/filters'], 'active' => (Yii::$app->controller->id == 'filter-admin')],
                ['label' => (Yii::$app->controller->action->id != 'login') ? 'Выход' : '', 'url' => ['/admin/logout']],
            ];


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => Yii::$app->controller->action->id == 'login' ? [] : $items,
    ]);

    NavBar::end();
    ?>

    <div class="container" style="margin-top: 50px;">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<? if (Yii::$app->controller->action->id == 'login'): ?>
    <footer class="footer navbar-fixed-bottom">
        <div class="container">
            <p class="pull-left">&copy; Specialist <?= date('Y') ?></p>

            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>
<? endif; ?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
