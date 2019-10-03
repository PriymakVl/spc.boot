<? 
  use yii\helpers\Html;
  use yii\widgets\ActiveForm;
  use app\modules\admin\classes\Callback;
  
  $model = new Callback;
?>

<div class="modal" id="callback-form">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Заказать обратный звонок</h4>
      </div>
    
    <? $form = ActiveForm::begin(['action' => ['/callback/create']]) ?>
      
      <!-- Modal body -->
      <div class="modal-body">
          
        <!-- name -->
        <?= $form->field($model, 'name')->label('Ваше имя:') ?>
         
        <!-- phone -->
        <?= $form->field($model, 'phone')->label('Ваш телефон:') ?>
      
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <?= Html::submitButton('Заказать', ['class' => 'btn btn-success']) ?>
      </div>

    <?php ActiveForm::end() ?>      

    </div>
  </div>
</div>