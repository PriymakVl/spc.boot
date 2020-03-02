<div class="sub-tab">
	<div class="sub-tab__nav">
		<a href="#tab_sub_1" onclick="show_tab_sub(this);" class="sub-tab__link sub-tab--active">серия: <span>SA-CN</span></a>
		<a href="#tab_sub_2" onclick="show_tab_sub(this);" class="sub-tab__link">серия: <span>SA-CU</span></a>
	</div>

	<div class="sub-tab__content">
		<section id="tab_sub_1" class="sub-tab__item">
			<?= $this->render('product_specification_cn') ?>
		</section>
		<section id="tab_sub_2" class="sub-tab__item">
			<?= $this->render('product_specification_cu') ?>
		</section>
	</div>
</div>
