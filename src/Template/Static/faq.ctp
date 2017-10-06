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
  <a href="#registration" data-toggle="collapse">Registration</a>
  <div id="registration" class="collapse">
    <a href="#registration1" data-toggle="collapse" style="padding-left:10px;">sub main 1</a>
    <div id="registration1" class="collapse" style="padding-left:20px;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </br>
    <a href="#registration2" data-toggle="collapse" style="padding-left:10px;">sub main 2</a>
    <div id="registration2" class="collapse" style="padding-left:20px;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </div>
  <br>
  <!--2 block  - payment -->
  <a href="#payment" data-toggle="collapse">Payment</a>
  <div id="payment" class="collapse">
    <a href="#payment1" data-toggle="collapse" style="padding-left:10px;">sub main 1</a>
    <div id="payment1" class="collapse" style="padding-left:20px;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </br>
    <a href="#payment2" data-toggle="collapse" style="padding-left:10px;">sub main 2</a>
    <div id="payment2" class="collapse" style="padding-left:20px;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </div>
  <br>
  <!--3 block  - shipping -->
  <a href="#shipping" data-toggle="collapse">Shipping</a>
  <div id="shipping" class="collapse">
    <a href="#shipping1" data-toggle="collapse" style="padding-left:10px;">sub main 1</a>
    <div id="shipping1" class="collapse" style="padding-left:20px;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </br>
    <a href="#shipping2" data-toggle="collapse" style="padding-left:10px;">sub main 2</a>
    <div id="shipping2" class="collapse" style="padding-left:20px;">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
    </div>
  </div>
</div>
