<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="users form large-9 medium-8 columns content">
    <?= $this->Form->create($user) ?>
    <div class="form-group">
      <fieldset>
          <legend><?= __('Edit User') ?></legend>
          <?php
          echo $this->Form->control('Login',['class' => 'form-control']);
          // echo $this->Form->control('Password');
          echo $this->Form->control('Email',['class' => 'form-control']);
          echo $this->Form->control('Name',['class' => 'form-control']);
          echo $this->Form->control('Surname',['class' => 'form-control']);
          echo $this->Form->control('Phonenumber',['class' => 'form-control','type'=> 'tel']);
          echo $this->Form->control('City',['class' => 'form-control']);
          echo $this->Form->control('Adress',['class' => 'form-control']);
          // echo $this->Form->control('Root',['class' => 'form-control']);
          echo '<label>Admin rights</label>';
          echo $this->Form->select('Root',[1=>'Yes',0=>'No'], ['empty' => '(choose one)','class' => 'form-control']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success', 'style' => 'margin-top: 10px;']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
