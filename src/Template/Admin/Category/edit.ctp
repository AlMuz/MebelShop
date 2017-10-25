<div class="category form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Edit Category') ?></legend>
          <?php
          echo $this->Form->control('Title',['class' => 'form-control']);
          echo $this->Form->control('Description',['class' => 'form-control']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success margintop10']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
