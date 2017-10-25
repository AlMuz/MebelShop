<?php $this->assign('title', 'Edit profile - '.$maintitle);?>

<div class="container-fluid well">
	<div class="row-fluid">
    <?= $this->Form->create($user,['id'=>'profile']) ?>
      <fieldset>
        <legend><?= __('Edit Profile') ?></legend>
        <div class="form-group">
          <label>Name</label>
          <?= $this->Form->control('Name',['class' => 'form-control','label'=>false,'placeholder' => 'Name', 'tabindex' => '1']) ?>
        </div>

        <div class="form-group">
          <label>Surname</label>
          <?= $this->Form->control('Surname',['class' => 'form-control','label'=>false,'placeholder' => 'Surname', 'tabindex' => '2']) ?>
        </div>

        <div class="form-group">
          <label>Email</label>
          <?= $this->Form->control('Email',['class' => 'form-control','label'=>false,'placeholder' => 'Email Address', 'type' => 'email','tabindex' => '3']) ?>
        </div>

				<div class="form-group">
					<label>Country</label>
					<?= $this->Form->control('Country',['class' => 'form-control','options' => $country,'label'=>false,'placeholder' => 'Riga', 'tabindex' => '4','id' => 'Country']) ?>
				</div>

        <div class="form-group">
          <label>City</label>
          <?= $this->Form->control('City',['class' => 'form-control','label'=>false,'placeholder' => 'Riga', 'tabindex' => '5','id' => 'City']) ?>
        </div>

        <div class="form-group">
          <label>Adress</label>
          <?= $this->Form->control('Adress',['class' => 'form-control','label'=>false,'placeholder' => 'Brivibas iela', 'tabindex' => '6','id' => 'Adress']) ?>
        </div>

        <div class="form-group">
          <label>Phonenumber</label>
          <?= $this->Form->control('Phonenumber',['type' => 'text','class' => 'form-control','label'=>false,'placeholder' => 'Phonenumber 20001234', 'tabindex' => '7']) ?>
        </div>
      </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-success col-xs-12 col-sm-1','tabindex' => '8']) ?>
    <?= $this->Form->end() ?>
  </div>
</div>

<script src="/js/validation.js"></script>
