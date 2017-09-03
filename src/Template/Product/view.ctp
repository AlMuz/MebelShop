<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product $product
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Product'), ['action' => 'edit', $product->idProduct]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Product'), ['action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct)]) ?> </li>
        <li><?= $this->Html->link(__('List Product'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="product view large-9 medium-8 columns content">
    <h3><?= h($product->idProduct) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($product->Name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MiniDescription') ?></th>
            <td><?= h($product->MiniDescription) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('MainImage') ?></th>
            <td><?= h($product->MainImage) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdProduct') ?></th>
            <td><?= $this->Number->format($product->idProduct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Price') ?></th>
            <td><?= $this->Number->format($product->Price) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Category IdCategory') ?></th>
            <td><?= $this->Number->format($product->Category_idCategory) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($product->Description)); ?>
    </div>
</div>
