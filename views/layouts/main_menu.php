<?php
    use yii\helpers\Url;
?>

<nav class="navbar">
    <!-- Brand -->
    <!-- <a class="navbar-brand" href="#">Specialist</a> -->

    <!-- Toggler/collapsibe Button -->
<!--     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button> -->

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="main-menu nav navbar-nav">
            <!-- catalog -->
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Каталог
                    <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <? foreach ($this->params['catalog'] as $cat): ?>
                        <li>
                            <a href="/category/<?=$cat->translit?>"><?=$cat->name?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </li> 


            <? $class = (Yii::$app->controller->id == 'main' &&  Yii::$app->controller->action->id == 'index') ? 'active' : ''; ?>
            <li class="<?=$class?>">
                <a  href="/">Главная</a>
            </li>
            
            <? $class = (Yii::$app->controller->id == 'main' &&  Yii::$app->controller->action->id == 'news') ? 'active' : ''; ?>
            <li class="<?=$class?>">
                <a href="<?=Url::to('/news')?>">Новости</a>
            </li>

            <? $class = (Yii::$app->controller->id == 'main' &&  Yii::$app->controller->action->id == 'about') ? 'active' : ''; ?>
            <li class="<?=$class?>">
                <a href="/stuff">О компании</a>
            </li>

            <? $class = (Yii::$app->controller->id == 'main' &&  Yii::$app->controller->action->id == 'contacts') ? 'active' : ''; ?>
            <li class="<?=$class?>">
                <a href="<?=Url::to('/contacts')?>">Контакты</a>
            </li>
        </ul>
    </div>
</nav>

 
           
