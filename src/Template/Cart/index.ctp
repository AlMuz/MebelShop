<?php $this->assign('title', 'Shopping cart - '.$maintitle);?>

<div class="row">
	<div class="col-lg-12">
		<ol class="breadcrumb" style="margin-bottom: 10px">
			<li>
				<?= $this->Html->link('Home','/');?>
			</li>
			<li class="active">
        <?= 'Cart';?>
			</li>
		</ol>
	</div>
</div>
<div class="col-md-12" style="margin-bottom: 20px">
  <h1>Shopping Cart</h1>
	<hr>
  <?php if(empty($shop['OrderItem'])) : ?>
    <h2>Shopping Cart is empty</h2>
  <?php else: ?>
    <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'cart', 'action' => 'cartupdate'))); ?>
    <hr>
    <div class="row">
        <div class="col col-sm-7">ITEM</div>
        <div class="col col-sm-1">PRICE</div>
        <div class="col col-sm-1">QUANTITY</div>
        <div class="col col-sm-1">TOTAL</div>
        <div class="col col-sm-1">ACTION</div>
        <br>
    </div>
		<br>
		<?php $tabindex = 1; ?>

    <?php foreach ($shop['OrderItem'] as $key => $item): ?>
      <div class="row" id="row-<?php echo $key; ?>">
        <div class="col col-sm-7">
            <strong>
              <?php echo $this->Html->link($item['name'], array('controller' => 'product', 'action' => 'view', $item['product_id'])); ?>
            </strong>
        </div>
        <div class="col col-sm-1">
          <?php echo $this->Number->currency($item['price'], $currency); ?>
        </div>
        <div class="col col-sm-1">
					<!-- <?php
					echo $this->Form->control('quantity',['class' => 'form-control','label' => false, 'placeholder'=> $item['quantity'],'data-id' => $item['product_id']]);
					 ?> -->
					 <?php echo $this->Form->input('quantity-' . $key, array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['product_id'], 'value' => $item['quantity'])); ?>

          <!-- <?php echo $item['quantity'] ?> -->
        </div>
        <div class="col col-sm-1">
          <?php echo $this->Number->currency($item['total'], $currency); ?>
        </div>
        <div class="col col-sm-1">
          <?php echo $this->Html->link('Delete', array('controller' => 'cart', 'action' => 'remove', $key)); ?>
        </div>
      </div>
      <hr>
    <?php endforeach; ?>
    <!-- <hr> -->
    <div class="row">
      <div class="col-sm-12">
        <div class="pull-right" style="float:right">
        <?php echo $this->Html->link('Clear Shopping Cart', array('controller' => 'Cart', 'action' => 'clear'), array('class' => 'btn btn-sm btn-danger', 'escape' => false)); ?>
        &nbsp; &nbsp;
        <?php echo $this->Form->button('Update', array('class' => 'btn btn-sm btn-default', 'escape' => false));?>
        <?php echo $this->Form->end(); ?>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class=" pull-right">
          Order Total: <span class="red" id="total"><?php echo $this->Number->currency($shop['Order']['total'], $currency); ?></span>
          <br />
					<br />

          <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
          <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" />
          <?php echo $this->Form->end(); ?>
      </div>
    </div>
  <?php endif; ?>
</div>
