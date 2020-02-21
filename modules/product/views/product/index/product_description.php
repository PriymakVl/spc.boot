<div class="product-description">

	<div class="main-tab">
		<div class="main-tab__nav">
			<a href="#tab_main_1" onclick="show_tab_main(this);" class="main-tab__link main-tab--active">Технические характеристики</a>
			<a href="#tab_main_2" onclick="show_tab_main(this);" class="main-tab__link">Габаритные размеры</a>
			<a href="#tab_main_3" onclick="show_tab_main(this);" class="main-tab__link">Описание</a>
		</div>

		<div class="main-tab__content">
			<section id="tab_main_1" class="main-tab__item">
				<?= $this->render('product_specification_main') ?>
			</section>
			<section id="tab_main_2" class="main-tab__item">
				<?= $this->render('product_dimensions_main') ?>
			</section>
			<section id="tab_main_3" class="main-tab__item">3</section>
		</div>
	</div>
	
</div>

<script type="text/javascript">
  function show_tab_main(elem) {
    let tab_id, tab, all_tab;
        document.querySelectorAll('.main-tab__link').forEach(function(el) {
   el.classList.remove('main-tab--active');
});
    document.querySelectorAll('.main-tab__item').forEach(function(el) {
   el.style.display = 'none';
});
    elem.classList.add("main-tab--active");
    tab_id = elem.getAttribute('href');
    tab_id = tab_id.replace('#', '');
    tab = document.getElementById(tab_id);
    tab.style.display = 'block';
  }

function show_tab_sub(elem) {
    let tab_id, tab, all_tab;
        document.querySelectorAll('.sub-tab__link').forEach(function(el) {
   el.classList.remove('sub-tab--active');
});
    document.querySelectorAll('.sub-tab__item').forEach(function(el) {
   el.style.display = 'none';
});
    elem.classList.add("sub-tab--active");
    tab_id = elem.getAttribute('href');
    tab_id = tab_id.replace('#', '');
    console.log(tab_id);
    tab = document.getElementById(tab_id);
    tab.style.display = 'block';
  }
</script>