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
        <li><?= $this->Html->link(__('List Order'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="order view large-9 medium-8 columns content">
    <h3><?= h($order->idOrder) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($order->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Surname') ?></th>
            <td><?= h($order->Surname) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('City') ?></th>
            <td><?= h($order->City) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Adress') ?></th>
            <td><?= h($order->Adress) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdOrder') ?></th>
            <td><?= $this->Number->format($order->idOrder) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('PhoneNumber') ?></th>
            <td><?= $this->Number->format($order->PhoneNumber) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cart IdCart') ?></th>
            <td><?= $this->Number->format($order->Cart_idCart) ?></td>
        </tr>
    </table>
</div>
