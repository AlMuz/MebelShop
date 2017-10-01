<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Cart[]|\Cake\Collection\CollectionInterface $cart
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Cart'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="cart index large-9 medium-8 columns content">
    <h3><?= __('Cart') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idCart') ?></th>
                <th scope="col"><?= $this->Paginator->sort('User_IdUser') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Status') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cart as $cart): ?>
            <tr>
                <td><?= $this->Number->format($cart->idCart) ?></td>
                <td><?= $this->Number->format($cart->User_IdUser) ?></td>
                <td><?= $this->Number->format($cart->Status) ?></td>
                <td><?= h($cart->Date) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $cart->idCart]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cart->idCart]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cart->idCart], ['confirm' => __('Are you sure you want to delete # {0}?', $cart->idCart)]) ?>
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
