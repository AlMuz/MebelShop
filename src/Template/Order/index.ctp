<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Order[]|\Cake\Collection\CollectionInterface $order
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="order index large-9 medium-8 columns content">
    <h3><?= __('Order') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idOrder') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Surname') ?></th>
                <th scope="col"><?= $this->Paginator->sort('City') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Adress') ?></th>
                <th scope="col"><?= $this->Paginator->sort('PhoneNumber') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Cart_idCart') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($order as $order): ?>
            <tr>
                <td><?= $this->Number->format($order->idOrder) ?></td>
                <td><?= h($order->Name) ?></td>
                <td><?= h($order->Surname) ?></td>
                <td><?= h($order->City) ?></td>
                <td><?= h($order->Adress) ?></td>
                <td><?= $this->Number->format($order->PhoneNumber) ?></td>
                <td><?= $this->Number->format($order->Cart_idCart) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $order->idOrder]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $order->idOrder]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->idOrder], ['confirm' => __('Are you sure you want to delete # {0}?', $order->idOrder)]) ?>
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
