<?php $this->assign('title', 'Shopping cart - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb" style="margin-bottom: 10px">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
      <li>
        <?= $this->Html->link('Cart','/cart');?>
      </li>
			<li class="active">
        <?= 'Checkout';?>
			</li>
		</ol>
	</div>
</div>
<h1>Shipping information</h1>
<div class="">
  <?php foreach ($user as $user):?>
    <div class="col-md-6">
      <h3>
        <label>Name:</label>  <?= $user->Name ?>
      </h3>
      <h3>
        <label>Surname:</label> <?= $user->Surname ?>
      </h3>
      <h3>
        <label>Phonenumber:</label> <?= $user->Phonenumber ?>
      </h3>
    </div>
    <div class="col-md-6">
      <h3>
        <label>Country:</label> <?= $user->Country ?>
      </h3>
      <h3>
        <label>City:</label> <?= $user->City ?>
      </h3>
      <h3>
        <label>Adress:</label> <?= $user->Adress ?>
      </h3>
    </div>
  <?php endforeach;?>
  <br>
  <div class="">
    <p style="font-size: 16px;">Is it correct information? if not:</p>&nbsp;
    <a href="/user/edit">Edit your profile</a>
    <br>
    <a href="/cart/payment">Next</a>
  </div>

</div>
