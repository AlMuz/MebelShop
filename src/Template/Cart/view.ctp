<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Cart $cart
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Cart'), ['action' => 'edit', $cart->idCart]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Cart'), ['action' => 'delete', $cart->idCart], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->idCart)]) ?> </li>
        <li><?= $this->Html->link(__('List Cart'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="cart view large-9 medium-8 columns content">
    <h3><?= h($cart->idCart) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('IdCart') ?></th>
            <td><?= $this->Number->format($cart->idCart) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('FullPrice') ?></th>
            <td><?= $this->Number->format($cart->FullPrice) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($cart->Quantity) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product IdProduct') ?></th>
            <td><?= $this->Number->format($cart->Product_idProduct) ?></td>
        </tr>
    </table>
</div>
