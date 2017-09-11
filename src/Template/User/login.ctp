<?php $this->assign('title', 'Login - '.$maintitle);?>


<div class="Login">

<?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Login') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
