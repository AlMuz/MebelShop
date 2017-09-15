<?php $this->assign('title', 'Register page - '.$maintitle);?>

<div class="user form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Register') ?></legend>

            <?= $this->Form->control('Login');?>
            <?= $this->Form->label('Password','Password'); ?>
            <?= $this->Form->password('Password',['label' => ['text' => 'Password']]);?>
            <!-- <?= $this->Form->password('ConfPassword',['label' => ['text' => 'Password']]);?> -->
            <?= $this->Form->control('Email', ['type' => 'email']);?>
            <?= $this->Form->control('Name');?>
            <?= $this->Form->control('Surname');?>
            <?= $this->Form->control('Phonenumber');?>
            

    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
