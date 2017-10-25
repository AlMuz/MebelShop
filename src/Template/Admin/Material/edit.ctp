<div class="material form large-9 medium-8 columns content">
    <?= $this->Form->create($material) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Edit Material') ?></legend>
          <?php
              echo $this->Form->control('Title',['class' => 'form-control']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success margintop10']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
