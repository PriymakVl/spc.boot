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
    <script src="https://kit.fontawesome.com/5f29610ead.js" crossorigin="anonymous"></script>
    <?php $this->registerCsrfMetaTags(); ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>


 <?=$this->render('header')?>

<div class="body">

    <?=$this->render('sidebar')?>

    <div class="body__inner">
        <!-- main -->
        <main class="content">
    
            <? echo $content; ?>

        </main>

    </div> <!-- /.body__inner -->
</div> <!-- /.body -->

<!-- footer -->
<?//=$this->render('footer')?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
