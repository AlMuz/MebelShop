<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Order $order
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->idOrder]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->idOrder], ['confirm' => __('Are you sure you want to delete # {0}?', $order->idOrder)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List User'), ['controller' => 'User', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'User', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Order Item'), ['controller' => 'OrderItem', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Item'), ['controller' => 'OrderItem', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->idOrder) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $order->has('user') ? $this->Html->link($order->user->idUser, ['controller' => 'User', 'action' => 'view', $order->user->idUser]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOrder') ?></th>
            <td><?= $this->Number->format($order->idOrder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($order->Status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Weight') ?></th>
            <td><?= $this->Number->format($order->Weight) ?></td>
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
            <th scope="row"><?= __('Total') ?></th>
            <td><?= $this->Number->format($order->Total) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Order Type') ?></th>
            <td><?= $this->Number->format($order->Order_Type) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($order->Created) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Order Item') ?></h4>
        <?php if (!empty($order->order_item)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('IdOrder Item') ?></th>
                <th scope="col"><?= __('Orders IdOrder') ?></th>
                <th scope="col"><?= __('IdProduct') ?></th>
                <th scope="col"><?= __('Quantity') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Sub Total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->order_item as $orderItem): ?>
            <tr>
                <td><?= h($orderItem->idOrder_item) ?></td>
                <td><?= h($orderItem->orders_idOrder) ?></td>
                <td><?= h($orderItem->idProduct) ?></td>
                <td><?= h($orderItem->quantity) ?></td>
                <td><?= h($orderItem->price) ?></td>
                <td><?= h($orderItem->sub_total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'OrderItem', 'action' => 'view', $orderItem->idOrder_item]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OrderItem', 'action' => 'edit', $orderItem->idOrder_item]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'OrderItem', 'action' => 'delete', $orderItem->idOrder_item], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->idOrder_item)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
