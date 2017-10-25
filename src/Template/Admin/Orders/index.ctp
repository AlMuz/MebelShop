<div class="orders index large-9 medium-8 columns content">
    <h3 class="page-header"><?= __('Orders') ?></h3>

    <table class="table table-responsive table-condensed table-striped">
      <thead>
        <tr>
          <th scope="col"><?= $this->Paginator->sort('idOrder') ?></th>
          <th scope="col"><?= $this->Paginator->sort('User_IdUser') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Weight') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Order_item_count') ?></th>
          <th scope="col"><?= ('Shipping') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Total') ?></th>
          <th scope="col"><?= ('Order Type') ?></th>
          <th scope="col"><?= $this->Paginator->sort('Created') ?></th>
          <th scope="col" class="actions"><?= __('Actions') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?= $this->Number->format($order->idOrder) ?></td>
            <td><?= $order->has('user') ? $this->Html->link($order->user->idUser, ['controller' => 'User', 'action' => 'view', $order->user->idUser]) : '' ?></td>
            <td>
              <?php if($order->Status == 0): ?>
                <p>Ordered</p>
              <?php elseif ($order->Status == 1):?>
                <p>Sended</p>
              <?php else: ?>
                <p>Delivered</p>
              <?php endif; ?>
            </td>
            <td><?= ($order->Weight) ?> KG</td>
            <td><?= $this->Number->format($order->Order_item_count) ?></td>
            <td><?= h($order->Shipping) ? __('Free shipping') : __('Take away') ?></td>
            <td><?= $this->Number->currency($order->Total, $currency ,['locale' => 'it_IT'])?></td>
            <td><?= ($order->Order_Type) ?></td>
            <td><?= date("Y-m-d H:i:s", strtotime($order->Created)) ?></td>
            <td class="actions">
              <?= $this->Html->link(__('<i class="glyphicon glyphicon-eye-open"></i>'), ['action' => 'view',$order->idOrder], ['class' => 'btn btn-xs btn-primary', 'escapeTitle' => false]) ?>
              <?= $this->Html->link(__('<i class="glyphicon glyphicon-edit"></i>'), ['action' => 'edit', $order->idOrder], ['class' => 'btn btn-xs btn-warning', 'escapeTitle' => false]) ?>
              <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->idOrder], ['confirm' => __('Are you sure you want to delete # {0}?', $order->idOrder),'class' => 'btn btn-xs btn-danger', 'escapeTitle' => false]) ?>
            </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?= $this->element('paginator') ?>
</div>
