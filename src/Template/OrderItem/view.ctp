<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\OrderItem $orderItem
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order Item'), ['action' => 'edit', $orderItem->idOrder_item]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order Item'), ['action' => 'delete', $orderItem->idOrder_item], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->idOrder_item)]) ?> </li>
        <li><?= $this->Html->link(__('List Order Item'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order Item'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orderItem view large-9 medium-8 columns content">
    <h3><?= h($orderItem->idOrder_item) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdProduct') ?></th>
            <td><?= h($orderItem->idProduct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOrder Item') ?></th>
            <td><?= $this->Number->format($orderItem->idOrder_item) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Orders IdOrder') ?></th>
            <td><?= $this->Number->format($orderItem->orders_idOrder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($orderItem->quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($orderItem->price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sub Total') ?></th>
            <td><?= $this->Number->format($orderItem->sub_total) ?></td>
        </tr>
    </table>
</div>
