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
        <li><?= $this->Html->link(__('List Product'), ['controller' => 'Product', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['controller' => 'Product', 'action' => 'add']) ?> </li>
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
            <th scope="row"><?= __('User IdUser') ?></th>
            <td><?= $this->Number->format($cart->User_IdUser) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= $this->Number->format($cart->Status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($cart->Date) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Product') ?></h4>
        <?php if (!empty($cart->product)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('IdProduct') ?></th>
                <th scope="col"><?= __('Category IdCategory') ?></th>
                <th scope="col"><?= __('Name') ?></th>
                <th scope="col"><?= __('Price') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('Interest') ?></th>
                <th scope="col"><?= __('Size') ?></th>
                <th scope="col"><?= __('Material') ?></th>
                <th scope="col"><?= __('MainImage') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($cart->product as $product): ?>
            <tr>
                <td><?= h($product->idProduct) ?></td>
                <td><?= h($product->Category_idCategory) ?></td>
                <td><?= h($product->Name) ?></td>
                <td><?= h($product->Price) ?></td>
                <td><?= h($product->Description) ?></td>
                <td><?= h($product->Interest) ?></td>
                <td><?= h($product->Size) ?></td>
                <td><?= h($product->Material) ?></td>
                <td><?= h($product->MainImage) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Product', 'action' => 'view', $product->idProduct]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Product', 'action' => 'edit', $product->idProduct]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Product', 'action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
