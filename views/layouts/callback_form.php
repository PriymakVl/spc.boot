<div class="modal" id="callback-form">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Заказать обратный звонок</h4>
      </div>
    
   <form action="/main/callback">
      <!-- Modal body -->
      <div class="modal-body">
         <!-- name -->
         <div class="form-group">
            <label for="name">Ваше имя:</label>
            <input type="text" class="form-control input-sm" id="name" name="name" required>
         </div>
         <!-- phone customer -->
         <div class="form-group">
            <label for="phone">Ваш телефон:</label>
            <input type="text" class="form-control input-sm" id="phone" name="phone" required>
         </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value="Заказать">
      </div>
   </form>
      

    </div>
  </div>
</div>