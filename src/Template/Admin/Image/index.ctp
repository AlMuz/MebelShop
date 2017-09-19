<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Image[]|\Cake\Collection\CollectionInterface $image
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Image'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="image index large-9 medium-8 columns content">
    <h3><?= __('Image') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idImage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Image') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Product_idProduct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($image as $image): ?>
            <tr>
                <td><?= $this->Number->format($image->idImage) ?></td>
                <td><?= h($image->Image) ?></td>
                <td><?= $this->Number->format($image->Product_idProduct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $image->idImage]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $image->idImage]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $image->idImage], ['confirm' => __('Are you sure you want to delete # {0}?', $image->idImage)]) ?>
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
