<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\OrderItem[]|\Cake\Collection\CollectionInterface $orderItem
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order Item'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Orders'), ['controller' => 'Orders', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Order'), ['controller' => 'Orders', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="orderItem index large-9 medium-8 columns content">
    <h3><?= __('Order Item') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idOrder_item') ?></th>
                <th scope="col"><?= $this->Paginator->sort('orders_idOrder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('idProduct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col"><?= $this->Paginator->sort('price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_total') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orderItem as $orderItem): ?>
            <tr>
                <td><?= $this->Number->format($orderItem->idOrder_item) ?></td>
                <td><?= $this->Number->format($orderItem->orders_idOrder) ?></td>
                <td><?= h($orderItem->idProduct) ?></td>
                <td><?= $this->Number->format($orderItem->quantity) ?></td>
                <td><?= $this->Number->format($orderItem->price) ?></td>
                <td><?= $this->Number->format($orderItem->sub_total) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $orderItem->idOrder_item]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderItem->idOrder_item]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderItem->idOrder_item], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->idOrder_item)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
