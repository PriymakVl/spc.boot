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

 <!-- message -->
<div class="container">
     <?= Alert::widget() ?>
</div>

<div class="body">
    
    <? echo $content; ?>

</div> <!-- /.body -->

<!-- footer -->
<?=$this->render('footer')?>

<!-- Callback Form -->
<?=$this->render('callback_form')?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
