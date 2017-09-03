<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Userinfo'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="userinfo form large-9 medium-8 columns content">
    <?= $this->Form->create($userinfo) ?>
    <fieldset>
        <legend><?= __('Add Userinfo') ?></legend>
        <?php
            echo $this->Form->control('Name');
            echo $this->Form->control('Surname');
            echo $this->Form->control('PhoneNumber');
            echo $this->Form->control('City');
            echo $this->Form->control('Adress');
            echo $this->Form->control('IP');
            echo $this->Form->control('Date');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
