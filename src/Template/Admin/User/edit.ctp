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
          echo $this->Form->control('Country',['class' => 'form-control','options' => $country,]);
          echo $this->Form->control('City',['class' => 'form-control']);
          echo $this->Form->control('Adress',['class' => 'form-control']);
          echo '<label>Admin rights</label>';
          echo $this->Form->select('Root',[1=>'Yes',0=>'No'], ['empty' => '(choose one)','class' => 'form-control']);
          ?>
      </fieldset>
      <?= $this->Form->button(__('Submit'),['class'=>'btn btn-success', 'style' => 'margin-top: 10px;']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>
