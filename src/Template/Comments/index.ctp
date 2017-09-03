<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Comment[]|\Cake\Collection\CollectionInterface $comments
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="comments index large-9 medium-8 columns content">
    <h3><?= __('Comments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('idComments') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Login') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Moderation') ?></th>
                <th scope="col"><?= $this->Paginator->sort('Product_idProduct') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($comments as $comment): ?>
            <tr>
                <td><?= $this->Number->format($comment->idComments) ?></td>
                <td><?= h($comment->Login) ?></td>
                <td><?= h($comment->Date) ?></td>
                <td><?= $this->Number->format($comment->Moderation) ?></td>
                <td><?= $this->Number->format($comment->Product_idProduct) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $comment->idComments]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $comment->idComments]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $comment->idComments], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->idComments)]) ?>
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
