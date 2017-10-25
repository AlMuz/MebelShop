<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Edit Order') ?></legend>
          <?php
            echo $order->user->Name. ' '.$order->user->Surname.'<br>'.$order->user->Country. ' '.$order->user->City.'<br>'.$order->user->Adress;
            echo $this->Form->select('Status',[0=>'Ordered',1=>'Sended',2=>'Delivered'], ['empty' => '(choose one)','class' => 'form-control']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Update order'),['class'=>'btn btn-success margintop10']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
