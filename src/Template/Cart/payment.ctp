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
<?= $this->Form->create('Order',['id'=>'paymentform']); ?>

<h1>Place Your Order</h1>
<p class="forstar"><sup class="star">*</sup> Already with VAT (PVN) 21%</p>

<?php foreach ($user as $user):?>
  <div class="row">
    <div class="col col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title"><b>Customer Info</b></h3>
          </div>
          <div class="panel-body">
            Customer: <?= $user->Name ?> <?= $user->Surname ?><br>
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
  <div class="col col-sm-7 hidden-xs">ITEM</div>
  <!-- <div class="col col-sm-2 hidden-xs">WEIGHT</div> -->
  <div class="col col-sm-2 hidden-xs">PRICE</div>
  <div class="col col-sm-2 hidden-xs">QUANTITY</div>
  <div class="col col-sm-1 hidden-xs">TOTAL</div>
  <br>
</div>
<br>

<?php foreach ($shop['OrderItem'] as  $item): ?>
  <div class="row">
    <div class="col col-sm-7">
      <label class="hidden-sm hidden-md hidden-lg">Item Name:</label>
        <?= $item['name'] ?>
    </div>
    <!-- <div class="col col-sm-2">
      <label class="hidden-sm hidden-md hidden-lg">Weight:</label>
      <?= $item['weight'] ?> KG
    </div> -->
    <div class="col col-sm-2">
      <label class="hidden-sm hidden-md hidden-lg">Price:</label>
      <?= $this->Number->currency($item['price'], $currency,['locale' => 'it_IT']); ?>
    </div>

    <div class="col col-sm-2">
      <label class="hidden-sm hidden-md hidden-lg">Quantity:</label>
      <?= $item['quantity']; ?>
    </div>

    <div class="col col-sm-1">
      <label class="hidden-sm hidden-md hidden-lg">Total:</label>
      <?= $this->Number->currency($item['total'], $currency,['locale' => 'it_IT']); ?>
    </div>
  </div>
  <hr>
<?php endforeach; ?>

<div class="row">
  <div class="col col-sm-9">Products: <?= $shop['Order']['order_item_count']; ?></div>
  <div class="col col-sm-1 align-right" >Items: <?= $shop['Order']['quantity']; ?></div>
  <div class="col col-sm-2 align-right" >Total<br><strong><?= $this->Number->currency($shop['Order']['total'], $currency,['locale' => 'it_IT']); ?></strong><sup class="star"> *</sup></div>
</div>

<hr>
<div class="row">
	<div class="col col-sm-4">
		<strong>Shipping method</strong>
		<br>
		<?= $this->Form->select('Shipping',[1=>'Free shippment',0=>'Take from our office'], ['class' => 'form-control']) ?>
	</div>
</div>
<br>
<?php if($shop['Order']['order_type'] == 'Creditcard') : ?>
	<div class="row">
    <div class="col col-sm-4">
      <strong>Credit or debit card</strong>
      <br>
      <?= $this->Form->input('creditcard_number', [
				'label' => false,
				'class' => 'form-control',
				'id'=>'creditcard_number',
				'type' => 'number',
				'maxLength' => 16,
				'autocomplete' => 'off'
			]); ?>
    </div>
    <div class="col col-sm-2">
      <strong>CSC</strong>
      <br>
      <?= $this->Form->input('creditcard_code', [
				'type'=>'password',
				'label' => false,
				'class' => 'form-control',
				'maxLength' => 4,
				'id'=>'creditcard_code'
			]); ?>
			<?php $this->Form->hidden($user->Email); ?>
		</div>
		<div class="col col-sm-1">
			<span class="glyphicon glyphicon-info-sign payment-icon" data-toggle="popover" data-container="body" data-html="true" data-title="Card Security Code"
				data-content="<div class='text-center'>The 3 or 4 digit code on back of the card..<img src='/img/cards/card.png'></div>"
				data-trigger="hover">
		 </span>
		</div>
	</div>
	<br>
	<div class="row">
    <div class="col col-sm-3">
      <?= $this->Form->input('creditcard_month', [
          'label' => 'Expiration Month',
          'class' => 'form-control',
          'options' => $months
      ]); ?>
    </div>
    <div class="col col-sm-3">
      <?= $this->Form->input('creditcard_year', [
          'label' => 'Expiration Year',
          'class' => 'form-control',
          'options' => $years
      ]);?>
    </div>
	</div>
<?php endif; ?>
<br>
<?= $this->Form->button('Place your order', ['class' => 'btn btn-sm btn-success', 'ecape' => false]); ?>
<?= $this->Form->end(); ?>

<script src="/js/validation.js"></script>
<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();
});
</script>
