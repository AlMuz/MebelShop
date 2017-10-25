<?php $this->assign('title', 'Profile - '.$maintitle);?>
<div class="container-fluid well">
	<div class="row-fluid">
		<?php foreach ($user as $user):?>
      <h1 style="margin-top: 0;"><?= __('User profile') ?></h1>
      <h3><span class="glyphicon glyphicon-user one width50"></span> Login: <?= $user->Login ?></h3>
      <h3><span class="glyphicon glyphicon-envelope width50"></span> Email: <?= $user->Email ?> </h3>
      <h3><span class="glyphicon glyphicon-hand-right width50"></span> Name:  <?= $user->Name ?></h3>
      <h3><span class="glyphicon glyphicon-hand-right width50"></span> Surname: <?= $user->Surname ?></h3>
      <h3><span class="glyphicon glyphicon-phone width50"></span> Phonenumber: <?= $user->Phonenumber ?></h3>
			<h3><span class="glyphicon glyphicon-copyright-mark width50"></span> Country: <?= $user->Country ?></h3>
			<h3><span class="glyphicon glyphicon-heart width50" style="color:black"></span> City: <?= $user->City ?></h3>
			<h3><span class="glyphicon glyphicon-home width50"></span> Adress: <?= $user->Adress ?></h3>
		<?php endforeach;?>
    <div>
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
