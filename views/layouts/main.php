<?php
    use app\assets\BaseAsset;
    use yii\helpers\Html;
    use app\widgets\CatalogMenuWidget;
    use app\widgets\Alert;

    BaseAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <?php $this->registerCsrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="body" class="container-fluid">
    
    <header id="header">
    <!-- header -->
        <?=$this->render('header')?>

        <!-- main menu -->
        <?=$this->render('main_menu')?>
    </header>
    
    <?= Alert::widget() ?>

    <!-- main -->
    <main>
        <?= $content ?>
    </main>

    <!-- footer -->
    <?=$this->render('footer')?>
    
     <!-- yii setup -->     
    <p class="pull-right"><?//= Yii::powered() ?></p>
</div> 

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
