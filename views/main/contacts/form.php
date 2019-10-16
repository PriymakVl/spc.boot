<?php
	use yii\widgets\ActiveForm;
?>
<style type="text/css">

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
            	<?php $form = ActiveForm::begin(['action' => ['main/contacts'], 'options' => ['class' => 'form-horizontal']]) ?>
                <!-- <form class="form-horizontal" method="post"> -->
						
						<!-- name -->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <?= $form->field($model, 'name')->textInput(['placeholder' => 'Имя'])->label(false) ?>
                            </div>
                        </div>
						
						<!-- email -->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope bigicon"></i></span>
                            <div class="col-md-8">
                                <?= $form->field($model, 'email')->textInput(['placeholder' => 'Email'])->label(false) ?>
                            </div>
                        </div>
						
						<!-- phone -->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <?= $form->field($model, 'phone')->textInput(['placeholder' => 'Телефон'])->label(false) ?>
                            </div>
                        </div>
						
						<!-- message -->
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pen-square bigicon"></i></span>
                            <div class="col-md-8">
                                <?= $form->field($model, 'text')->textarea(['rows' => '7'])->label(false) ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Отправить</button>
                            </div>
                        </div>
				<?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>