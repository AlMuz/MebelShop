<?php $this->assign('title', 'FAQ - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li class="active">
        <?= 'FAQ' ?>
			</li>
		</ol>
	</div>
</div>

<div class="container">
  <h1>Frequently asked questions (FAQ)</h1>
  <!--1 block   about registration-->
  <a href="#registration" data-toggle="collapse">How to buy</a>
  <div id="registration" class="collapse">
    <a href="#registration1" data-toggle="collapse" style="padding-left:10px;">Register</a>
    <div id="registration1" class="collapse" style="padding-left:20px;">
			<p>Register on register page, need to write all information in input field</p>
    </div>
  </br>
    <a href="#registration2" data-toggle="collapse" style="padding-left:10px;">Sign in</a>
    <div id="registration2" class="collapse" style="padding-left:20px;">
      <p>Next step to sign in.</p>
    </div>
  </div>
  <br>
  <!--2 block  - payment -->
  <a href="#payment" data-toggle="collapse">Payment</a>
  <div id="payment" class="collapse">
    <a href="#payment1" data-toggle="collapse" style="padding-left:10px;">Card</a>
    <div id="payment1" class="collapse" style="padding-left:20px;">
    	<p>User can pay with cards.</p>
    </div>
  </div>
  <br>
  <!--3 block  - shipping -->
  <a href="#shipping" data-toggle="collapse">Shipping</a>
  <div id="shipping" class="collapse">
    <a href="#shipping1" data-toggle="collapse" style="padding-left:10px;">Information</a>
    <div id="shipping1" class="collapse" style="padding-left:20px;">
			<p>Shipping i</p>
    </div>

  </div>
</div>
