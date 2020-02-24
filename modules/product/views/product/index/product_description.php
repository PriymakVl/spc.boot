<div class="product-description">

	<div class="main-tab">
		<div class="main-tab__nav">
			<a href="#tab_main_1" onclick="show_tab_main(this);" class="main-tab__link main-tab--active">Технические характеристики</a>
			<a href="#tab_main_2" onclick="show_tab_main(this);" class="main-tab__link">Габаритные размеры</a>
			<a href="#tab_main_3" onclick="show_tab_main(this);" class="main-tab__link">Принцип работы</a>
      <a href="#tab_main_4" onclick="show_tab_main(this);" class="main-tab__link">Правила эксплуатации</a>
      <a href="#tab_main_5" onclick="show_tab_main(this);" class="main-tab__link">Выбор блока</a>
      <a href="#tab_main_6" onclick="show_tab_main(this);" class="main-tab__link">Общие сведения</a>
		</div>

		<div class="main-tab__content">
			<section id="tab_main_1" class="main-tab__item">
				<?= $this->render('product_specification_main') ?>
			</section>
			<section id="tab_main_2" class="main-tab__item">
				<?= $this->render('product_dimensions_main') ?>
			</section>
			<section id="tab_main_3" class="main-tab__item">
        <?= $this->render('product_work') ?>   
      </section>
      <section id="tab_main_4" class="main-tab__item">
        <?= $this->render('product_rules') ?>   
      </section>
      <section id="tab_main_5" class="main-tab__item">
        <?= $this->render('product_choice') ?>   
      </section>
      <section id="tab_main_6" class="main-tab__item">
        <?= $this->render('product_total') ?>   
      </section>
		</div>
	</div>
	
</div>
