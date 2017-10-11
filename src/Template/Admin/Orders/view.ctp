<div class="orders view large-9 medium-8 columns content">
  <?= $this->Html->link(__('Edit'), ['action' => 'edit',$order->idOrder], ['class' => 'btn btn-success pull-right']) ?>

  <h3>Order ID: <?= ($order->idOrder) ?></h3>
  <div class="orders">
    <table style="width:70%">
      <tr>
        <th scope="row"><?= __('Name and surname ') ?></th>
        <td>
          <?= $order->user->Name. ' '.$order->user->Surname ?>
        </td>
      </tr>
      <tr>
        <th scope="row"><?= __('Country city') ?></th>
        <td>
          <?= $order->user->Country. ' '.$order->user->City?>
        </td>
      </tr>
      <tr>
        <th scope="row"><?= __('Adress') ?></th>
        <td>
          <?= $order->user->Adress?>
        </td>
      </tr>
      <tr>
          <th scope="row"><?= __('Status') ?></th>
          <td>
            <?php if($order->Status == 0): ?>
              <p>Ordered</p>
            <?php elseif ($order->Status == 1):?>
              <p>Sended</p>
            <?php else: ?>
              <p>Delivered</p>
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
          <td><?= $this->Number->format($order->Shipping) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Total price') ?></th>
          <td><?= $this->Number->currency($order->Total, $currency,['locale' => 'it_IT'])?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Order Type') ?></th>
          <td><?= ($order->Order_Type) ?></td>
      </tr>
      <tr>
          <th scope="row"><?= __('Created') ?></th>
          <td><?= h($order->Created) ?></td>
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
          			<td data-title="Product ID"><?= $orderItem->Product_idProduct ?></td>
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
