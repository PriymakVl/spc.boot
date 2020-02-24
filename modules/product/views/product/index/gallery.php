<?php 
use yii\helpers\Html;
 ?>

<!-- Product Gallery -->
<div class="product__gallery">
	<div class="product__img">
		<?= Html::img('@web/images/'.$cat->image->subdir.'/'.$cat->image->filename) ?>
	</div>
	<div class="product__trumb">
		<?= Html::img('@web/images/'.$cat->image->subdir.'/'.$cat->image->filename) ?>
		<!-- <img src="assets/img/cat_cu.jpg" alt=""> -->
		<!-- <img src="assets/img/cat_fn.jpg" alt=""> -->
	</div>
</div> <!-- /.product__gallery -->