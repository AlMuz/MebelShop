<?php $this->assign('title', 'Registration - '.$maintitle);?>

<div class="row">
  <div class="col-md-12">
    <!-- need to centrate grid  -->
    <div class="col-md-1 hidden-xs hidden-sm">
    </div>
    <div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <strong>Registration</strong>
          </h3>
        </div>
        <div class="panel-body">
          <?= $this->Form->create($user,['id'=>'regform']) ?>
            <fieldset>
             <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <?= $this->Form->control('Name',['class' => 'form-control','label'=>false,'placeholder' => 'Name', 'tabindex' => '1']) ?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="form-group">
                  <?= $this->Form->control('Surname',['class' => 'form-control','label'=>false,'placeholder' => 'Surname', 'tabindex' => '2']) ?>
                </div>
              </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->control('Login',['class' => 'form-control','label'=>false,'placeholder' => 'Username', 'tabindex' => '3']) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->control('Email',['class' => 'form-control','label'=>false,'placeholder' => 'Email Address', 'type' => 'email','tabindex' => '4']) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->password('Password',['class' => 'form-control','label'=>false,'placeholder' => 'Password', 'tabindex' => '5','id' => 'Password']) ?>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <input type="password" name="Password_confirmation" id="Password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->control('Country',['empty' => '(Country: choose one)','class' => 'form-control','options' => $country,'label'=>false,'placeholder' => 'Country','tabindex' => '7']) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->control('City',['class' => 'form-control','label'=>false,'placeholder' => 'City', 'tabindex' => '8','id' => 'City']) ?>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->control('Adress',['class' => 'form-control','label'=>false,'placeholder' => 'Adress', 'tabindex' => '9','id' => 'Adress']) ?>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-6">
                  <div class="form-group">
                    <?= $this->Form->control('Phonenumber',['type' => 'text','class' => 'form-control','label'=>false,'placeholder' => 'Phonenumber 20001234', 'tabindex' => '10']) ?>
                  </div>
                </div>
              </div>
            </fieldset>
            <?= $this->Form->button(__('Register'),['class' => 'btn btn-success col-xs-12 col-sm-1','tabindex' => '11']) ?>
          <?= $this->Form->end() ?>
        </div>
      </div>
    </div>
    <!-- need to centrate grid  -->
    <div class="col-md-1 hidden-xs hidden-sm">
    </div>
  </div>
</div>

<script src="/js/validation.js"></script>
