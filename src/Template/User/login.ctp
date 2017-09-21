<?php $this->assign('title', 'Login - '.$maintitle);?>

<div class="container">
    <div class="row">
    	<div class="col-md-10">
    		<div class="panel panel-default">
			  	<div class="panel-heading">
			    	<h3 class="panel-title">Login</h3>
			 	  </div>
			  	<div class="panel-body">
            <?= $this->Form->create() ?>
            <fieldset>
			    	  <div class="form-group">
                  <?= $this->Form->control('Login',['class' => 'form-control','label'=>false,'placeholder' => 'Username','required' => true,'tabindex' => '1']) ?>
			    		</div>
			    		<div class="form-group">
                <?= $this->Form->password('Password',['class' => 'form-control','label'=>false,'placeholder' => 'Password','required' => true,'tabindex' => '2']) ?>
			    		</div>
              <?= $this->Form->button(__('Login'),['class' => 'btn btn-success','tabindex' => '3']); ?>
			    	</fieldset>
            <?= $this->Form->end() ?>
            </br>
            <p>Don't have an account?
              <?= $this->Html->link(__('Then register now!'), ['action' => 'register']) ?>
            </p>
			    </div>
			</div>
		</div>
	</div>
</div>
