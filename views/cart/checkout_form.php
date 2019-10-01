<?
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
?>
<style type="text/css">
   #checkout input[type="text"], #checkout textarea {
      width: 550px;
   }
</style>

<div class="modal" id="checkout">
  <div class="modal-dialog">
    <div class="modal-content">

    <!-- Modal Header -->
    <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
      <h4 class="modal-title">Оформить заказ</h4>
    </div>
    
    
    <? $form = ActiveForm::begin(['action' => ['/order/save']]) ?>

    <!-- Modal body -->
      <div class="modal-body">

      <!-- name -->
      <?= $form->field($model, 'name')->label('Ваше имя:') ?>

      <!-- email -->
      <?= $form->field($model, 'email')->label('Ваш email:') ?>
      
      <!-- phone -->
      <?= $form->field($model, 'phone')->label('Ваш телефон:') ?>

      <!-- order note -->
      <?= $form->field($model, 'note')->textarea(['rows' => '5']) ?>



      <!-- Modal footer -->
      <div class="modal-footer">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
      </div>
        
    <?php ActiveForm::end() ?>



    </div>
  </div>
</div>