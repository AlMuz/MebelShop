<?php
/**
 * @var \App\View\AppView $this
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Category'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="category form large-9 medium-8 columns content">
    <?= $this->Form->create($category) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Add Category') ?></legend>
          <?php
              echo $this->Form->control('Title',['class' => 'form-control']);
              echo $this->Form->control('Description',['class' => 'form-control']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success', 'style' => 'margin-top: 10px;']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
