<?php $this->assign('title', 'Shopping cart - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li class="active">
        <?= 'Cart';?>
			</li>
		</ol>
	</div>
</div>
<div class="col-md-12 margin-bottom">
  <h1>Shopping Cart</h1>
  <?php if(empty($shop['OrderItem'])) : ?>
    <h2 style="padding-left:10px">Shopping Cart is empty</h2>
  <?php else: ?>
    <?= $this->Form->create(NULL, ['id'=>'quantitycheck','url' => ['controller' => 'cart', 'action' => 'cartupdate']]); ?>
		<p class="forstar"><sup class="star">*</sup> Already with VAT (PVN) 21%</p>
    <hr>
    <div class="row">
      <div class="col col-sm-5 hidden-xs">ITEM</div>
      <div class="col col-sm-2 hidden-xs">PRICE</div>
      <div class="col col-sm-2 hidden-xs">QUANTITY</div>
      <div class="col col-sm-1 hidden-xs">TOTAL</div>
      <div class="col col-sm-1 hidden-xs">ACTION</div>
      <br>
    </div>
		<br>

		<!-- for quantity, every quantity input will go after previous tabindex  -->
		<?php $tabindex = 1; ?>

    <?php foreach ($shop['OrderItem'] as $key => $item): ?>
      <div class="row" id="row-<?= $key; ?>">
        <div class="col col-sm-5">
					<label class="hidden-sm hidden-md hidden-lg">Item Name:</label><br>
          <strong>
            <?= $this->Html->link($item['name'], ['controller' => 'product', 'action' => 'view', $item['product_id']]); ?>
          </strong>
        </div>
        <div class="col col-sm-2">
					<label class="hidden-sm hidden-md hidden-lg">Price:</label>
          <?= $this->Number->currency($item['price'], $currency,['locale' => 'it_IT']); ?>
        </div>
        <div class="col col-sm-2">
					<label class="hidden-sm hidden-md hidden-lg">Quantity:</label>
				 	<?= $this->Form->input('quantity-' . $key,
					['class' => 'form-control input-small', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['product_id'], 'value' => $item['quantity'],'pattern' => '\d*','title' => 'It must be positive number or zero ']); ?>
        </div>
        <div class="col col-sm-1">
					<label class="hidden-sm hidden-md hidden-lg">Total:</label>
          <?= $this->Number->currency($item['total'], $currency,['locale' => 'it_IT']); ?>
        </div>
        <div class="col col-sm-1">
					<label class="hidden-sm hidden-md hidden-lg">Action</label>
          <?= $this->Html->link('Delete', ['controller' => 'cart', 'action' => 'remove', $key],['confirm' => __('Are you sure you want to delete this product from cart?')]); ?>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="pull-right" style="float:right">
				<?= $this->Form->button('Update cart', ['class' => 'btn btn-sm btn-default', 'escape' => false]);?>
        <?= $this->Html->link('Clear Shopping Cart', ['controller' => 'Cart', 'action' => 'clear'], ['class' => 'btn btn-sm btn-danger', 'escape' => false,'confirm' => __('Are you sure you want to clear all your cart?' )]); ?>
        <?= $this->Form->end(); ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="pull-right">
        Order Total: <span id="total"><b><?= $this->Number->currency($shop['Order']['total'], $currency,['locale' => 'it_IT']); ?></b></span> <sup class="star">*</sup>
        <br>
			  Total weight: <b><span id="weight"><?= ($shop['Order']['weight']); ?> KG</b></span>
				<br>
				<br>
				<?= $this->Form->create(NULL, ['url' => ['controller' => 'cart', 'action' => 'checkout']]); ?>
					<?= $this->Form->button('Checkout', ['class' => 'btn btn-md btn-success', 'escape' => false]);?>
				<?= $this->Form->end(); ?>
				<br>
      </div>
    </div>
  <?php endif; ?>
</div>


<script src="/js/validation.js"></script>
