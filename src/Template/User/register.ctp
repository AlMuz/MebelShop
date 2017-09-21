<?php $this->assign('title', 'Registration - '.$maintitle);?>

<div class="container">
  <div class="col-md-10">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">
            <strong>Registration</strong>
          </h3>
        </div>
        <div class="panel-body">
          <?= $this->Form->create($user) ?>
            <fieldset>
             <div class="row">
        			<div class="col-xs-12 col-sm-5 col-md-5">
      					<div class="form-group">
                  <?= $this->Form->control('Name',['class' => 'form-control','label'=>false,'placeholder' => 'Name','required' => true,'tabindex' => '1']) ?>
      					</div>
      			  </div>
      				<div class="col-xs-12 col-sm-5 col-md-5">
      					<div class="form-group">
                  <?= $this->Form->control('Surname',['class' => 'form-control','label'=>false,'placeholder' => 'Surname','required' => true,'tabindex' => '2']) ?>
      					</div>
      				</div>
        		  </div>
          		<div class="form-group">
                <?= $this->Form->control('Login',['class' => 'form-control','label'=>false,'placeholder' => 'Username','required' => true,'tabindex' => '3']) ?>
          		</div>
          		<div class="form-group">
                <?= $this->Form->control('Email',['class' => 'form-control','label'=>false,'placeholder' => 'Email Address','required' => true,'type' => 'email','tabindex' => '4']) ?>
          		</div>
        			<div class="row">
        				<div class="col-xs-12 col-sm-5 col-md-5">
        					<div class="form-group">
        						<!-- <input type="password" name="password" id="password" class="form-control " placeholder="Password" tabindex="5"> -->
                    <?= $this->Form->password('Password',['class' => 'form-control','label'=>false,'placeholder' => 'Password','required' => true,'tabindex' => '5']) ?>

        					</div>
        				</div>
        				<!-- <div class="col-xs-10 col-sm-5 col-md-5">
        					<div class="form-group">
        						<input type="password" name="password_confirmation" id="password_confirmation" class="form-control " placeholder="Confirm Password" tabindex="6">
        					</div>
        			  </div> -->
        		  </div>
              <div class="form-group">
                <?= $this->Form->control('Phonenumber',['class' => 'form-control','label'=>false,'placeholder' => 'Phonenumber','required' => true,'tabindex' => '6']) ?>
          		</div>
            </fieldset>
            <?= $this->Form->button(__('Register'),['class' => 'btn btn-success','tabindex' => '7']) ?>
          <?= $this->Form->end() ?>
        </div>
      </div>
  </div>
</div>
