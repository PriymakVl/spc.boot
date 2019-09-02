<?php
    use app\modules\category\classes\Category;
    $catalog = (new Category)->getMain();
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
                    <? foreach ($catalog as $cat): ?>
                        <li>
                            <a href="/category?id_cat=<?=$cat->id?>"><?=$cat->name?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </li> 
            <li class="active">
                <a  href="/">Главная</a>
            </li>
            <li>
                <a href="#">Новости</a>
            </li>
            <li>
                <a href="#">О компании</a>
            </li>
            <li>
                <a href="#">Контакты</a>
            </li>
        </ul>
    </div>
</nav>

 
           
