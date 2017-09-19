<?php $this->assign('title', $this->request->session()->read('Auth.User.Login').' Profile - '.$maintitle);?>

<div class="container-fluid well span6">
	<div class="row-fluid">
        <div class="span8">
          <h1 style="margin-top: 0;"><?= __('User profile') ?></h1>
            <h3><span class="glyphicon glyphicon-user one" style="width:50px;"></span> Login: <?= $this->request->session()->read('Auth.User.Login');?></h3>
            <h3><span class="glyphicon glyphicon-envelope" style="width:50px;"></span> Email: <?= $this->request->session()->read('Auth.User.Email');?> </h3>
            <h3><span class="glyphicon glyphicon-hand-right" style="width:50px;"></span> Name:  <?= $this->request->session()->read('Auth.User.Name');?></h3>
            <h3><span class="glyphicon glyphicon-hand-right" style="width:50px;"></span> Surname: <?= $this->request->session()->read('Auth.User.Surname');?></h3>
            <h3><span class="glyphicon glyphicon-phone" style="width:50px;"></span> Phonenumber: <?= $this->request->session()->read('Auth.User.Phonenumber');?></h3>
        </div>
        <div class="span2">
            <!-- <div class="btn-group">
                <a class="btn dropdown-toggle btn-info" data-toggle="dropdown" href="#">
                    Action
                    <span class="icon-cog icon-white"></span><span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="#"><span class="icon-wrench"></span> Modify</a></li>
                    <li><a href="#"><span class="icon-trash"></span> Delete</a></li>
                </ul> -->
            </div>
        </div>
    </div>
</div>
