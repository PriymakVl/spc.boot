
<div class="sub-tab">
	<div class="sub-tab__nav">
		<a href="#tab_sub_dim_1" onclick="show_tab_sub(this);" class="sub-tab__link sub-tab--active">Серия SA-CN</a>
		<a href="#tab_sub_dim_2" onclick="show_tab_sub(this);" class="sub-tab__link">Серия SA-CU</a>
	</div>

	<div class="sub-tab__content">
		<section id="tab_sub_dim_1" class="sub-tab__item">
			<?= $this->render('product_dimensions_cn') ?>
		</section>
		<section id="tab_sub_dim_2" class="sub-tab__item">
			<?= $this->render('product_dimensions_cu') ?>
		</section>
	</div>
</div>
