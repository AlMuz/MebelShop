<?php $this->assign('title', 'My orders - '.$maintitle);?>

<div class="orders index large-9 medium-8 columns content">
  <h3><?= __('My orders') ?></h3>
  <div id="order-table">
    <table class="col-md-12 table-bordered table-striped table-condensed cf">
    	<thead class="cf">
    		<tr>
    			<th>Order ID</th>
    			<th>Status</th>
    			<th>Order item count</th>
    			<th>Shipping</th>
    			<th>Total</th>
    			<th>Order Type</th>
          <th>Created</th>
    			<th></th>
    		</tr>
    	</thead>
    	<tbody>
        <?php foreach ($orders as $order): ?>
    		<tr>
    			<td data-title="Order ID"><?= $order->idOrder ?></td>
    			<td data-title="Status">
            <?php if($order->Status == 0): ?>
              <p>Ordered</p>
            <?php elseif ($order->Status == 1):?>
              <p>Sended</p>
            <?php else: ?>
              <p>Delivered</p>
            <?php endif; ?>
          </td>
    			<td data-title="Order item count" ><?= $order->Order_item_count ?></td>
    			<td data-title="Shipping" ><?= $order->Shipping ?></td>
    			<td data-title="Total" ><?= $this->Number->currency($order->Total, $currency,['locale' => 'it_IT'])?></td>
    			<td data-title="Order Type" ><?= $order->Order_Type ?></td>
    			<td data-title="Created"><?= $order->Created ?></td>
          <td>
            <?= $this->Html->link(__('View'), ['action' => 'view', $order->idOrder]) ?>
          </td>
    		</tr>
      <?php endforeach; ?>
    	</tbody>
    </table>
  </div>
  <div class="paginator">
      <ul class="pagination">
          <?= $this->Paginator->first('<< ' . __('first')) ?>
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
          <?= $this->Paginator->last(__('last') . ' >>') ?>
      </ul>
      <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
  </div>
</div>

<style media="screen">
  p{
    margin: 0;
  }
</style>
