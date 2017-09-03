<?php
/**
  * @var \App\View\AppView $this
  * @var \App\Model\Entity\Comment $comment
  */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Comment'), ['action' => 'edit', $comment->idComments]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Comment'), ['action' => 'delete', $comment->idComments], ['confirm' => __('Are you sure you want to delete # {0}?', $comment->idComments)]) ?> </li>
        <li><?= $this->Html->link(__('List Comments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Comment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="comments view large-9 medium-8 columns content">
    <h3><?= h($comment->idComments) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Login') ?></th>
            <td><?= h($comment->Login) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('IdComments') ?></th>
            <td><?= $this->Number->format($comment->idComments) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Moderation') ?></th>
            <td><?= $this->Number->format($comment->Moderation) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Product IdProduct') ?></th>
            <td><?= $this->Number->format($comment->Product_idProduct) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($comment->Date) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Comment') ?></h4>
        <?= $this->Text->autoParagraph(h($comment->Comment)); ?>
    </div>
</div>
