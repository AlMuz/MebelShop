<?php $this->assign('title', 'Login - '.$maintitle);?>

<div class="Login">
  <?= $this->Form->create() ?>
      <fieldset>
          <legend><?= __('Login') ?></legend>
          <?= $this->Form->control('Login') ?>
          <?= $this->Form->label('Password','Password'); ?>
          <?= $this->Form->password('Password',['label' => ['text' => 'Password']]) ?>
      </fieldset>
  <?= $this->Form->button(__('Login')); ?>
  <?= $this->Form->end() ?>
  <p>Don't have an account?
    <?= $this->Html->link(__('Then register now!'), ['action' => 'register']) ?>
  </p>
</div>
