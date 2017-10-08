<?php $this->assign('title', 'Payment - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
      <li>
        <?= $this->Html->link('Cart','/cart');?>
      </li>
      <li>
        <?= $this->Html->link('Checkout','/cart/checkout');?>
      </li>
			<li class="active">
        <?= 'Payment';?>
			</li>
		</ol>
	</div>
</div>

<h1>Place Your Order</h1>
<?php foreach ($user as $user):?>
  <div class="row">
    <div class="col col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><b>Customer Info</b></h3>
          </div>
          <div class="panel-body">
            <?= $user->Name ?> <?= $user->Surname ?><br>
            Email: <?= $user->Email ?><br>
            Phone: <?= $user->Phonenumber ?>
          </div>
        </div>
      </div>
      <div class="col col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><b>Shipping Address</b></h3>
          </div>
          <div class="panel-body">
            Address: <?= $user->Adress ?> <br>
            City: <?= $user->City ?> <br>
            Country: <?= $user->Country ?><br>
          </div>
        </div>
      </div>
  </div>
<?php endforeach;?>
<div class="row">
  <div class="col col-sm-5 hidden-xs">ITEM</div>
  <div class="col col-sm-2 hidden-xs">WEIGHT</div>
  <div class="col col-sm-2 hidden-xs">PRICE</div>
  <div class="col col-sm-2 hidden-xs">QUANTITY</div>
  <div class="col col-sm-1 hidden-xs">TOTAL</div>
  <br>
</div>
<br>

<?php foreach ($shop['OrderItem'] as  $item): ?>
  <div class="row">
    <div class="col col-sm-5">
      <label class="hidden-sm hidden-md hidden-lg">Item Name:</label>
        <?= $item['name'] ?>
    </div>
    <div class="col col-sm-2">
      <label class="hidden-sm hidden-md hidden-lg">Weight:</label>
      <?= $item['weight'] ?> KG
    </div>
    <div class="col col-sm-2">
      <label class="hidden-sm hidden-md hidden-lg">Price:</label>
      <?= $this->Number->currency($item['price'], $currency); ?>
    </div>

    <div class="col col-sm-2">
      <label class="hidden-sm hidden-md hidden-lg">Quantity:</label>
      <?= $item['quantity']; ?>
    </div>

    <div class="col col-sm-1">
      <label class="hidden-sm hidden-md hidden-lg">Total:</label>
      <?= $this->Number->currency($item['total'], $currency); ?>
    </div>
  </div>
  <hr>
<?php endforeach; ?>

<div class="row">
  <div class="col col-sm-10">Products: <?= $shop['Order']['order_item_count']; ?></div>
  <div class="col col-sm-1" style="text-align: right;">Items: <?= $shop['Order']['quantity']; ?></div>
  <div class="col col-sm-1" style="text-align: right;">Total<br /><strong><?= $this->Number->currency($item['total'], $currency);?></strong></div>
</div>

<hr>

<?= $this->Form->create('Order'); ?>

<?php if($shop['Order']['order_type'] == 'creditcard') : ?>

<div class="row">
    <div class="col col-sm-4">

        <strong>Credit or debit card</strong>

        <br />

        <?= $this->Form->input('creditcard_number', array('label' => false, 'class' => 'form-control ccinput', 'type' => 'tel', 'maxLength' => 16, 'autocomplete' => 'off')); ?>

    </div>
    <div class="col col-sm-2">

        <strong>Card Security Code</strong>

        <br />

        <?= $this->Form->input('creditcard_code', array('label' => false, 'class' => 'form-control', 'type' => 'tel', 'maxLength' => 4)); ?>

    </div>
</div>

<br />

<div class="row">
    <div class="col col-sm-3">
        <?= $this->Form->input('creditcard_month', array(
            'label' => 'Expiration Month',
            'class' => 'form-control',
            'options' => array(
                '01' => '01 - January',
                '02' => '02 - February',
                '03' => '03 - March',
                '04' => '04 - April',
                '05' => '05 - May',
                '06' => '06 - June',
                '07' => '07 - July',
                '08' => '08 - August',
                '09' => '09 - September',
                '10' => '10 - October',
                '11' => '11 - November',
                '12' => '12 - December'
            )
        )); ?>
    </div>
    <div class="col col-sm-3">
        <?= $this->Form->input('creditcard_year', array(
            'label' => 'Expiration Year',
            'class' => 'form-control',
            'options' => array_combine(range(date('y'), date('y') + 10), range(date('Y'), date('Y') + 10))
        ));?>
    </div>
</div>

<br />
<br />

<?php endif; ?>

<?= $this->Form->button('<i class="fa fa-check"></i> &nbsp; Place your order', array('class' => 'btn btn-sm btn-success', 'ecape' => false)); ?>

<?= $this->Form->end(); ?>
<br>

<?= $this->Html->link('Clear Order Type', array('controller' => 'Cart', 'action' => 'clearOrderType'), array('class' => 'btn btn-sm btn-danger', 'escape' => false,'confirm' => __('Are you sure you want to clear all your cart?' ))); ?>
