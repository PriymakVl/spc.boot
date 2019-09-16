	<footer id="footer" class="row bg-blue">
            <!-- company -->
            <div class="col-md-3 firm-name">
                <h4>Компания</h4>
                <a href="/" class="">Specialist</a>
                <address>г. Каменское, ул. Сергея Нигояна 26</address>
            </div>
            <!-- catalog -->
            <div class="col-md-3 footer-catalog">
                <h4>Каталог</h4>
                <ul>
                    <? foreach ($this->params['catalog'] as $cat): ?>
                        <li>
                            <a href="/category?id_cat=<?=$cat->id?>"><?=$cat->name?></a>
                        </li>
                    <? endforeach; ?>
                </ul>
            </div>
            <!-- menu -->
            <div class="col-md-3 footer-menu">
                <h4>Меню</h4>
                <ul>
                    <li><a href="#">Главная</a></li>
                    <li><a href="">Новости</a></li>
                    <li><a href="">О компании</a></li>
                    <li><a href="">Контакты</a></li>
                </ul>
            </div>
            <!-- phone -->
            <div class="col-md-3 callback-wrp">
                <h4>Телефон</h4>
                <a href="tel:0800210317">0800-210-317</a>
                <br><br><br>
                <span data-toggle="modal" data-target="#callback-form">Заказать звонок</span>
            </div>
   </footer>