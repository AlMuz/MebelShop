<?php $this->assign('title', $order->idOrder.' ID order information - '.$maintitle);?>

<div class="orders view large-9 medium-8 columns content">
  <h3>Order ID: <?= ($order->idOrder) ?></h3>
  <div class="orders">
    <table style="width:70%">
      <tr>
          <th scope="row"><?= __('Status') ?></th>
          <td>
            <?php if($order->Status == 0): ?>
              Ordered
            <?php elseif ($order->Status == 1):?>
              Sended
            <?php else: ?>
              Delivered
            <?php endif; ?>
          </td>
      </tr>
      <tr>
          <th scope="row"><?= __('Weight') ?></th>
          <td><?= $this->Number->format($order->Weight) ?> KG</td>
      </tr>
      <tr>
          <th scope="row"><?= __('Order Item Count') ?></th>
          <td><?= $this->Number->format($order->Order_item_count) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Shipping') ?></th>
          <td><?= h($order->Shipping) ? __('Free shipping') : __('Take away') ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Total price') ?></th>
          <td><?= $this->Number->currency($order->Total, $currency,['locale' => 'it_IT'])?></td>
      </tr>
      <!-- <tr>
          <th scope="row"><?= __('Order Type') ?></th>
          <td><?= ($order->Order_Type) ?></td>
      </tr> -->
      <tr>
          <th scope="row"><?= __('Created') ?></th>
          <td><?=date("Y-m-d H:i:s", strtotime($order->Created)) ?></td>
      </tr>
    </table>
  </div>
  <div class="related">
      <h4><?= __('Related Order Item') ?></h4>
      <?php if (!empty($order->order_item)): ?>
        <div id="order-table">
          <table class="col-md-12 table-bordered table-striped table-condensed cf">
          	<thead class="cf">
          		<tr>
          			<th>Product ID</th>
          			<th>Quantity</th>
          			<th>Price</th>
          			<th>Sub Total</th>
                <th></th>
          		</tr>
          	</thead>
          	<tbody>
              <?php foreach ($order->order_item as $orderItem): ?>
          		<tr>
          			<td data-title="Product ID"><?=$this->Html->link(($orderItem->Product_idProduct),
                    ['controller'=>'product','action'=>'view', $orderItem->Product_idProduct])  ?>
                </td>
          			<td data-title="Quantity"><?= $orderItem->quantity ?></td>
          			<td data-title="Price" ><?= $this->Number->currency($orderItem->price, $currency,['locale' => 'it_IT'])?></td>
          			<td data-title="Sub Total" ><?= $this->Number->currency($orderItem->sub_total, $currency,['locale' => 'it_IT'])?> </td>
                <td>
                   <?= $this->Html->link(__('View'), ['controller' => 'OrderItem', 'action' => 'view', $orderItem->idOrder_item]) ?>
                 </td>
          		</tr>
            <?php endforeach; ?>
          	</tbody>
          </table>
        </div>
      <?php endif; ?>
  </div>
</div>


<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
.orders th{
  width: 140px;
}
.orders td{

}
@media (max-width: 767px) {
  .orders table{
    width: 100%!important;
  }
}
</style>
