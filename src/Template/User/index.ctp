<?php $this->assign('title', 'Profile - '.$maintitle);?>
<div class="container-fluid well span6">
	<div class="row-fluid">
		<?php foreach ($user as $user):?>

	      <h1 style="margin-top: 0;"><?= __('User profile') ?></h1>
	        <h3><span class="glyphicon glyphicon-user one" style="width:50px;"></span> Login: <?= $user->Login ?></h3>
	        <h3><span class="glyphicon glyphicon-envelope" style="width:50px;"></span> Email: <?= $user->Email ?> </h3>
	        <h3><span class="glyphicon glyphicon-hand-right" style="width:50px;"></span> Name:  <?= $user->Name ?></h3>
	        <h3><span class="glyphicon glyphicon-hand-right" style="width:50px;"></span> Surname: <?= $user->Surname ?></h3>
	        <h3><span class="glyphicon glyphicon-phone" style="width:50px;"></span> Phonenumber: <?= $user->Phonenumber ?></h3>
					<h3><span class="glyphicon glyphicon-copyright-mark" style="width:50px;"></span> Country: <?= $user->Country ?></h3>
					<h3><span class="glyphicon glyphicon-heart" style="width:50px;"></span> City: <?= $user->City ?></h3>
					<h3><span class="glyphicon glyphicon-home" style="width:50px;"></span> Adress: <?= $user->Adress ?></h3>

		<?php endforeach;?>
    <div class="span2">
      <div class="btn-group">
          <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
              Action
              <span class="icon-cog icon-white"></span><span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
              <li><a href="/user/edit"><span class="icon-wrench"></span>Edit your profile</a></li>
          </ul>
  		</div>
  	</div>
	</div>
</div>
