<?php $this->assign('title', 'Carts - '.$maintitle);?>


<h1>Shopping Cart</h1>

<?php if(empty($shop['OrderItem'])) : ?>


Shopping Cart is empty

<?php else: ?>

<?php echo $this->Form->create(NULL, array('url' => array('controller' => 'cart', 'action' => 'cartupdate'))); ?>

<hr>

<div class="row">
  <div class="col col-sm-1">PHOTO</div>
    <div class="col col-sm-7">ITEM</div>
    <div class="col col-sm-1">PRICE</div>
    <div class="col col-sm-1">QUANTITY</div>
    <div class="col col-sm-1">TOTAL</div>
    <div class="col col-sm-1">REMOVE</div>
</div>

<?php $tabindex = 1; ?>
<?php foreach ($shop['OrderItem'] as $key => $item): ?>
    <!-- <?php debug($key) ?>
    <?php debug($item) ?> -->

    <div class="col col-sm-1">
      
    </div>

    <div class="row" id="row-<?php echo $key; ?>">
        <div class="col col-sm-7">
            <strong><?php echo $this->Html->link($item['name'], array('controller' => 'product', 'action' => 'view', $item['product_id'])); ?></strong>
        </div>
        <div class="col col-sm-1" id="price-<?php echo $key; ?>"><?php echo $item['price']; ?></div>
        <div class="col col-sm-1">
          <!-- <?php echo $this->Form->input('quantity-' . $item, array('div' => false, 'class' => 'numeric form-control input-small', 'label' => false, 'size' => 2, 'maxlength' => 2, 'tabindex' => $tabindex++, 'data-id' => $item['idProduct'], 'data-mods' => $mods, 'value' => $item['quantity'])); ?> -->
          <?php echo $item['quantity'] ?>
        </div>
        <div class="col col-sm-1" id="total_<?php echo $key; ?>"><?php echo $item['total']; ?></div>
        <div class="col col-sm-1"><?php echo $this->Html->link('Delete', array('controller' => 'cart', 'action' => 'remove', $key)); ?></div>
        <!-- <span class="glyphicon glyphicon-trash"></span> -->
    </div>
    <hr>
<?php endforeach; ?>

<hr>

<div class="row">
    <div class="col col-sm-12">
        <div class="pull-right">
        <?php echo $this->Html->link('Clear Shopping Cart', array('controller' => 'Cart', 'action' => 'clear'), array('class' => 'btn btn-sm btn-danger', 'escape' => false)); ?>
        &nbsp; &nbsp;
        <?php echo $this->Form->button('Update', array('class' => 'btn btn-sm btn-default', 'escape' => false));?>
        <?php echo $this->Form->end(); ?>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col col-sm-12 pull-right tr">

        Order Total: <span class="red" id="total">$<?php echo $shop['Order']['total']; ?></span>
        <br />
        <br />

        <?php echo $this->Form->create(NULL, array('url' => array('controller' => 'shop', 'action' => 'step1'))); ?>
        <input type='image' name='submit' src='https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif' border='0' align='top' alt='Check out with PayPal' class="sbumit" />
        <?php echo $this->Form->end(); ?>

    </div>
</div>

<br />
<br />

<?php endif; ?>
