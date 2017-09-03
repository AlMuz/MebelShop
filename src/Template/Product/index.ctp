<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Product[]|\Cake\Collection\CollectionInterface $product
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Product'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="product index large-9 medium-8 columns content">
    <h3><?= __('Product') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idProduct') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Price') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MiniDescription') ?></th>
                <th scope="col"><?= $this->Paginator->sort('MainImage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Category_idCategory') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($product as $product): ?>
            <tr>
                <td><?= $this->Number->format($product->idProduct) ?></td>
                <td><?= h($product->Name) ?></td>
                <td><?= $this->Number->format($product->Price) ?></td>
                <td><?= h($product->MiniDescription) ?></td>
                <td><?= h($product->MainImage) ?></td>
                <td><?= $this->Number->format($product->Category_idCategory) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $product->idProduct]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $product->idProduct]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $product->idProduct], ['confirm' => __('Are you sure you want to delete # {0}?', $product->idProduct)]) ?>
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
