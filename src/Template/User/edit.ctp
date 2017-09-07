<?php
/**
  * @var \App\View\AppView $this
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->idUser],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->idUser)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List User'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="user form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Edit User') ?></legend>
        <?php
            echo $this->Form->control('Login');
            echo $this->Form->control('Password');
            echo $this->Form->control('Email');
            echo $this->Form->control('Name');
            echo $this->Form->control('Surname');
            echo $this->Form->control('Phonenumber');
            echo $this->Form->control('Ip');
            echo $this->Form->control('Date');
            echo $this->Form->control('Root');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
